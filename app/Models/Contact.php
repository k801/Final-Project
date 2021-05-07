<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contacts";
    use HasFactory;

    protected $fillable = [
    'name', 'mail', 'message','user_id'
    ];
        function user()
        {
            return $this->belongsTo(User::class);
        }
}

