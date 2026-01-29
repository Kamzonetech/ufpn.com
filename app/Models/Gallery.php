<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'image_path',
        'thumbnail_path',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset($this->image_path) : null;
    }

    // Accessor for thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail_path
            ? asset($this->thumbnail_path)
            : $this->image_url;
    }

    // Delete image files when model is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($gallery) {
            // Delete main image
            if ($gallery->image_path && file_exists(public_path($gallery->image_path))) {
                @unlink(public_path($gallery->image_path));
            }

            // Delete thumbnail
            if ($gallery->thumbnail_path && file_exists(public_path($gallery->thumbnail_path))) {
                @unlink(public_path($gallery->thumbnail_path));
            }
        });
    }
}
