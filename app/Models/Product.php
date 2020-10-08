<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'image_id',
    ];


    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this
        ->addMediaCollection('products')->singleFile()
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(300)
                ->height(300);


                $this->addMediaConversion('square')
                ->width(412)
                ->height(412);
        }


    );
    }

}