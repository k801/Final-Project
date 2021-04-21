<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciepe extends Model
{
    protected $table="reciepes";
    use HasFactory;


    protected $fillable=['name','ingrediens','description','image','category_id'];

function category()
{

    return $this->belongsTo(Category::class);
}

}

