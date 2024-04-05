<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

  protected $fillable = [
      'kode',
      'name',
      'price',
      'stock',
  ];

  public function brand()
  {
      return $this->belongsTo(Brand::class);
  }

  public function category()
  {
      return $this->belongsTo(Category::class);
  }
}

class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}