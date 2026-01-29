<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'user_id',
        'media_type',
    ];

    public function getMediaTypeAttribute($value)
    {
        if (!$value && $this->photo) {
            $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
            $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];
            return in_array(strtolower($extension), $videoExtensions) ? 'video' : 'image';
        }
        return $value;
    }

    // Helper method to check if it's a video
    public function getIsVideoAttribute()
    {
        return $this->media_type === 'video';
    }

    // Helper method to check if it's an image
    public function getIsImageAttribute()
    {
        return $this->media_type === 'image';
    }

    // Get media URL
    public function getMediaUrlAttribute()
    {
        if (!$this->photo) return null;
        return asset('admin/assets/images/news/' . $this->photo);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($newsUpdate) {
            $baseSlug = Str::slug($newsUpdate->title);
            $newsUpdate->slug = self::generateUniqueSlug($baseSlug);
        });

        static::updating(function ($newsUpdate) {
            if ($newsUpdate->isDirty('title')) {
                $baseSlug = Str::slug($newsUpdate->title);
                $newsUpdate->slug = self::generateUniqueSlug($baseSlug, $newsUpdate->id);
            }
        });
    }

    private static function generateUniqueSlug($baseSlug, $ignoreId = null)
    {
        $slug = $baseSlug;
        $count = 1;
        while (self::where('slug', $slug)->when($ignoreId, function ($query) use ($ignoreId) {
            return $query->where('id', '!=', $ignoreId);
        })->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }
        return $slug;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
