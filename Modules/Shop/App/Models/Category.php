<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UuidTrait;

class Category extends Model
{
    use HasFactory, UuidTrait;


    protected $table = 'shop_categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Shop\Database\Factories\CategoryFactory::new();
    }

    public function children()
    {
        return $this->hasMany('\Modules\Shop\Models\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('\Modules\Shop\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('\Modules\Shop\Models\Product','shop_categories_products','category_id','product_id'
);

    }
}