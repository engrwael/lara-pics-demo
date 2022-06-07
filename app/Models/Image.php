<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function makeDirectory()
    {
        $subFolder = 'images/' . date('Y-m-d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public static function getDimensions($image)
    {
        [$width, $hieght] = getimagesize(Storage::path($image));
        return $width . 'x' . $hieght;
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function permaLink()
    {
        return route('image.show', $this->slug);
    }

    public function getUniqueSlug()
    {
        $slug = str($this->title)->slug();
        $slugCount = static::where('slug', $slug)->count();

        if ($slugCount > 0) {
            return $slug . uniqid("-", true);
        }

        return $slug;
    }

    protected static function booted()
    {
        static::creating(function ($image) {
            $image->slug = $image->getUniqueSlug();
            $image->is_published = true;
        });

        static::updating(function ($image) {
            if (!$image->slug) {
                $image->slug = $image->getUniqueSlug();
                $image->is_published = true;
            }
        });

        static::deleted(function ($image) {
            Storage::delete($image->file);
            session()->flash('del', 'تم حذف المسار بالكامل');
        });
    }
}