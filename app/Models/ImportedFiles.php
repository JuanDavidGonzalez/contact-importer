<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedFiles extends Model
{
    use HasFactory;

    protected  $fillable = ['file_name', 'state', 'user_id'];

    public function getStatusAttribute()
    {
        if($this->state == 1){
            $st = ['warning', 'Pending'];
        }elseif($this->state == 2){
            $st = ['danger', 'Failure'];
        }elseif($this->state == 3){
            $st = ['success', 'Success'];
        }else{
            $st = ['default', 'Unknown'];
        }

        return $st;
    }
}
