<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['name','email','date','table_number','time','guests_number','time','status'];
    use HasFactory;
}
