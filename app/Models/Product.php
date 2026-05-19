<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'price',
        'image',
        'detail',
        'company',
        'status',
        'sale',
        'user_id',
        'id_category',
        'id_brand'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    /**
     * Get all product images as array
     *
     * @return array
     */
    public function getImagesAttribute()
    {
        if (is_string($this->attributes['image'])) {
            return json_decode($this->attributes['image'], true) ?? [];
        }
        return $this->attributes['image'] ?? [];
    }

    /**
     * Get the first product image
     *
     * @return string
     */
    public function getFirstImageAttribute()
    {
        $images = $this->images;
        return $images[0] ?? 'default.png';
    }

    /**
     * Get product image URL by index
     *
     * @param int $index
     * @return string
     */
    public function getImageUrl($index = 0)
    {
        $images = $this->images;
        $imageName = $images[$index] ?? 'default.png';
        return asset('frontend/uploads/products/' . $imageName);
    }

    /**
     * Get all product image URLs
     *
     * @return array
     */
    public function getImageUrlsAttribute()
    {
        return array_map(function($image) {
            return asset('frontend/uploads/products/' . $image);
        }, $this->images);
    }

    /**
     * Get brand name
     *
     * @return string
     */
    public function getBrandNameAttribute()
    {
        return $this->brand->name ?? 'N/A';
    }

    /**
     * Get category name
     *
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'N/A';
    }
}
