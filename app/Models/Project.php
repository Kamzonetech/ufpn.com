<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'client', 'date', 'description', 'photo', 'media_type',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class)->orderBy('order');
    }

    public function featuredImage()
    {
        return $this->hasOne(Gallery::class)->where('is_featured', true);
    }

    public function getMediaTypeAttribute($value)
    {
        if (! $value && $this->photo) {
            $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
            $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

            return in_array(strtolower($extension), $videoExtensions) ? 'video' : 'image';
        }

        return $value;
    }

    // helper method to get media URL
    public function getMediaUrlAttribute()
    {
        if (! $this->photo) {
            return null;
        }

        return asset('admin/assets/images/projects/'.$this->photo);
    }

    // helper method to check if it's a video
    public function getIsVideoAttribute()
    {
        return $this->media_type === 'video';
    }

    // helper method to check if it's an image
    public function getIsImageAttribute()
    {
        return $this->media_type === 'image';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $baseSlug = Str::slug($project->title);
            $project->slug = self::generateUniqueSlug($baseSlug);
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) { // Only update slug if the title is changed
                $baseSlug = Str::slug($project->title);
                $project->slug = self::generateUniqueSlug($baseSlug, $project->id);
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
            $slug = $baseSlug.'-'.$count;
            $count++;
        }

        return $slug;
    }
}
