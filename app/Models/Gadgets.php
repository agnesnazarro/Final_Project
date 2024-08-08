<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadgets extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'gadget_name', 
        'category',
        'description',
        'quantity',
        'purchase_date',
    ];
}
