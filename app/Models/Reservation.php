<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table="reservations";
    protected $fillable=
    ['name','email','guests_number','attendance_date','attendance_time'];
    use HasFactory;
}
