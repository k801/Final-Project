<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciepe extends Model
{
    protected $table="reciepes";
    use HasFactory;
    protected $fillable=['name','ingrediens','description','image','category_id'];


public function ordby()
{
    return $this->hasOne(Reciepe::class)->orderBy('price');
}

function category()
{

    return $this->belongsToMany(Category::class);
}

function orders()
{
    return $this->belongsToMany(Order::class);
}

}

