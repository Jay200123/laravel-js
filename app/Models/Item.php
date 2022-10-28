<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'item';

    protected $primaryKey = 'item_id';

    protected $fillable = ['description','title', 'cost_price','sell_price', 'imagePath'];

}
