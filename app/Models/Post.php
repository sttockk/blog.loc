<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class Post extends Model
{
    use Sluggable;

    use HasFactory;


    const IS_STANDARD = 0;
    const IS_FEATURED = 1;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'content', 'description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();

        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    public function setCategory($id)
    {
        if ($id == null) { return; }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) { return;}
        $this->tags()->sync($ids);
    }

    public function removeImage()
    {
        if ($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null)
        {
            return $this->setDraft();
        }
        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = Post::IS_FEATURED;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = Post::IS_STANDARD;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if($value == null)
        {
            return $this->setStandart();
        }
        return $this->setFeatured();
    }
    public function getCategoryTitle()
    {
        return $this->category != null ? $this->category->title : 'Нет категории';
    }

    public function getTagsTitles()
    {
        if (!$this->tags->isEmpty())
        {
            return implode(', ', $this->tags->pluck('title')->all());
        }
        return 'Нет тегов';
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return asset('/no-image/no-image.png');
        }
        return asset("/uploads/{$this->image}");
    }

    public function getDate()
    {
        if ($this->created_at != null)
        {
            return Date::parse($this->created_at)->format('j F Y г.');
        }

        return 'Нет даты';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function remove()
    {
        $this->removeImage();
        $this->tags()->sync([]);
        $this->delete();
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public function hasTag()
    {
        return $this->tag != null ? true : false;
    }

    public function getViews()
    {
        return $this->views != null ? $this->views : '0';
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views', 'desc')->take(3)->get();
    }

    public static function getRecentPosts()
    {
        return self::orderBy('created_at', 'desc')->limit(3)->get();
    }

    public static function getFeaturedPosts()
    {
        return self::where('is_featured', 1)->take(3)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }

    public function increaseViews()
    {
        $views = $this->getViews();
        $views += 1;
        $this->views = $views;
        $this->save();
    }

    public function scopeLike($query, $s)
    {
        return $query->where('title', 'LIKE', "%{$s}%");
    }
}
