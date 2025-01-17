<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = "product_colors";

    protected $fillable = [
        'product_id',
        'color_id',
        'quantity'
    ];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id','id');
    }
}
