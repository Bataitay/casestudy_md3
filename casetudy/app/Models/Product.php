<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // protected $primaryKey = 'config_id';
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function config()
    {
        return $this->hasOne(Config::class, 'id', 'config_id');
    }
}
