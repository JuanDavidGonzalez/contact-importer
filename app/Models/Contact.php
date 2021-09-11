<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'phone', 'address', 'credit_card_number', 'email', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
