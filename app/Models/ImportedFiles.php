<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedFiles extends Model
{
    use HasFactory;

    protected  $fillable = ['file_name', 'state', 'user_id'];

    const PENDING = 1;
    const FAILURE = 2;
    const SUCCESS = 3;

    public function getStatusAttribute()
    {
        if($this->state == self::PENDING){
            $st = ['warning', 'Pending'];
        }elseif($this->state == self::FAILURE){
            $st = ['danger', 'Failure'];
        }elseif($this->state == self::SUCCESS){
            $st = ['success', 'Success'];
        }else{
            $st = ['default', 'Unknown'];
        }

        return $st;
    }
}
