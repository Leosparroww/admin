<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'category_id', 'description', 'price', 'image', 'item_condition', 'item_type', 'phone', 'owner', 'publish'];
    use HasFactory;
}
