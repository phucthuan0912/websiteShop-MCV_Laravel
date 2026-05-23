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
       
        if (isset($this->attributes['image'])) {
            $imageData = $this->attributes['image'];
            
    
            if (is_string($imageData)) {
                $decoded = json_decode($imageData, true);
                return is_array($decoded) ? $decoded : [];
            }
            
        
            if (is_array($imageData)) {
                return $imageData;
            }
        }
        
        return [];
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
