<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = ['name', 'birthday', 'phone', 'address', 'credit_card_number', 'email', 'user_id', 'franchise_id', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }


    public function getCardAttribute()
    {
        return "xxxx xxxx xxxx $this->code";
    }
}
