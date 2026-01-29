<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProgramGalleryComponent extends Component
{
    use WithFileUploads;

    public $project_id;

    public $images = [];

    public $existingGalleries = [];

    public $titles = [];

    public $descriptions = [];

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'images.*' => 'required|image|max:5120', // 5MB max
    ];

    public function mount($programId = null)
    {
        $this->project_id = $programId;
        $this->loadExistingGalleries();
    }

    public function loadExistingGalleries()
    {
        if ($this->project_id) {
            $this->existingGalleries = Gallery::where('project_id', $this->project_id)
                ->orderBy('order')
                ->get();
        }
    }

    public function updatedProjectId()
    {
        $this->loadExistingGalleries();
    }

    public function save()
    {
        $this->validate();

        foreach ($this->images as $index => $image) {
            // Generate unique filename
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'_'.\Illuminate\Support\Str::slug($originalName).'.'.$extension;

            // Define directory path
            $directory = 'admin/assets/images/projects';
            $fullPath = public_path($directory);

            // Create directory if it doesn't exist
            if (! is_dir($fullPath)) {
                mkdir($fullPath, 0755, true);
            }

            // Get the temporary file path from Livewire
            $tempPath = $image->getRealPath();
            $destinationPath = $fullPath.'/'.$fileName;

            // Copy the file from temp location to destination
            if (file_exists($tempPath)) {
                if (copy($tempPath, $destinationPath)) {
                    $imagePath = $directory.'/'.$fileName;

                    // Create thumbnail - Pass the image object and filename
                    $thumbnailPath = $this->createThumbnail($image, $fileName);

                    // Get the last order number
                    $lastOrder = Gallery::where('project_id', $this->project_id)->max('order') ?? 0;

                    // Save to database
                    Gallery::create([
                        'project_id' => $this->project_id,
                        'title' => $this->titles[$index] ?? null,
                        'description' => $this->descriptions[$index] ?? null,
                        'image_path' => $imagePath,
                        'thumbnail_path' => $thumbnailPath,
                        'order' => $lastOrder + $index + 1,
                        'is_featured' => false,
                    ]);
                }
            }
        }

        $this->dispatch('feedback', feedback: 'Images uploaded successfully!');

        // Reset form
        $this->reset(['images', 'titles', 'descriptions']);
        $this->loadExistingGalleries();
    }

    protected function createThumbnail($image, $originalFileName)
    {
        $thumbnailName = 'thumb_'.$originalFileName;
        $directory = 'admin/assets/images/projects/thumbnails';
        $fullPath = public_path($directory);

        // Create thumbnails directory if it doesn't exist
        if (! is_dir($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        $thumbnailPath = $directory.'/'.$thumbnailName;
        $fullThumbnailPath = $fullPath.'/'.$thumbnailName;

        try {
            // Create ImageManager instance
            $manager = new ImageManager(new Driver);

            // Read the image from the temporary path
            $img = $manager->read($image->getRealPath());

            // Resize and fit to 300x300
            $img->scaleDown(300, 300);
            $img->cover(300, 300);

            // Encode and save based on format
            $extension = strtolower($image->getClientOriginalExtension());

            if ($extension === 'png') {
                $img->toPng()->save($fullThumbnailPath);
            } elseif ($extension === 'webp') {
                $img->toWebp()->save($fullThumbnailPath);
            } elseif ($extension === 'gif') {
                $img->toGif()->save($fullThumbnailPath);
            } else {
                $img->toJpeg(80)->save($fullThumbnailPath);
            }

            return $thumbnailPath;

        } catch (\Exception $e) {
            // Log error and return original image path as fallback
            \Log::error('Thumbnail creation error: '.$e->getMessage());

            return 'admin/assets/images/projects/'.$originalFileName;
        }
    }

    public function deleteImage($galleryId)
    {
        $gallery = Gallery::find($galleryId);

        if ($gallery && $gallery->project_id == $this->project_id) {
            // Delete image files from storage
            if (file_exists(public_path($gallery->image_path))) {
                @unlink(public_path($gallery->image_path));
            }

            if (file_exists(public_path($gallery->thumbnail_path))) {
                @unlink(public_path($gallery->thumbnail_path));
            }

            // Delete from database
            $gallery->delete();

            $this->loadExistingGalleries();

            $this->dispatch('feedback', feedback: 'Image deleted successfully!');
        }
    }

    public function setFeatured($galleryId)
    {
        // Remove featured from all images in this program
        Gallery::where('project_id', $this->project_id)
            ->update(['is_featured' => false]);

        // Set this image as featured
        Gallery::find($galleryId)->update(['is_featured' => true]);

        $this->loadExistingGalleries();

        $this->dispatch('feedback', feedback: 'Featured image updated!');
    }

    public function updateOrder($orderedIds)
    {
        foreach ($orderedIds as $index => $id) {
            Gallery::where('id', $id)->update(['order' => $index + 1]);
        }

        $this->loadExistingGalleries();
    }

    public function render()
    {
        $projects = Project::orderBy('title')->get();

        // Add thumbnail_url attribute to existing galleries for view
        foreach ($this->existingGalleries as $gallery) {
            $gallery->thumbnail_url = asset($gallery->thumbnail_path);
        }

        return view('livewire.admin.gallery.add-program-gallery-component', compact('projects'))
            ->layout('livewire.admin.layouts.app');
    }
}
