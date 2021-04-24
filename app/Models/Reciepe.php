<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciepe extends Model
{
    protected $table="receipes";
    use HasFactory;


    protected $fillable=['name','ingrediens','description','image','category_id'];

function category()
{

    return $this->belongsToMany(Category::class);
}

function orders()
{
    return $this->belongsToMany(Order::class);
}

}

