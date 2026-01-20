<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title','slug','client','date','description', 'photo',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $baseSlug = Str::slug($service->title);
            $service->slug = self::generateUniqueSlug($baseSlug);
        });

        static::updating(function ($service) {
            if ($service->isDirty('title')) { // Only update slug if the title is changed
                $baseSlug = Str::slug($service->title);
                $service->slug = self::generateUniqueSlug($baseSlug, $service->id);
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
}
