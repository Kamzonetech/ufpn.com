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
    ];

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
