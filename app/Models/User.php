<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    const IS_ADMIN = 1;
    const IS_NORMAL = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Post::class);
    }

    public static function add($fields)
    {
        $user = new static();
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function generatePassword($password)
    {
        if ($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function getImage()
    {
        if ($this->thumbnail == null)
        {
            return asset('/no-image/no-image.png');
        }
        return asset('/uploads/' . $this->thumbnail);
    }

    public function uploadThumbnail($image)
    {
        if ($image == null) { return; }
        $this->removeThumbnail();
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $filename);
        $this->thumbnail = $filename;
        $this->save();
    }

    public function remove()
    {
        $this->removeThumbnail();
        $this->delete();
    }

    public function removeThumbnail()
    {
        if ($this->thumbnail != null)
        {
            Storage::delete('uploads/' . $this->thumbnail);
        }
    }
    public function makeAdmin()
    {
        $this->is_admin = User::IS_ADMIN;
        $this->save();
    }

    public function makeNormal()
    {
        $this->is_admin = User::IS_NORMAL;
        $this->save();
    }

    public function toggleAdmin()
    {
        if($this->is_admin == User::IS_ADMIN)
        {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }

    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan()
    {
        if($this->status == User::IS_BANNED)
        {
            return $this->unban();
        }
        return $this->ban();

    }
}
