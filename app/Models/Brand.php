<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];
    protected $attributes = ['kode' => 'DEFAULT_VALUE_HERE'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

