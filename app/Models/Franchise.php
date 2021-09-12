<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    protected $table = 'franchises';
    protected $fillable = ['name', 'pattern'];
    public $timestamps = false;

    static  $FRANCHISES = null;

    public static function getFranchise($num){

        if(!self::$FRANCHISES){
            self::$FRANCHISES = self::all();
        }

        foreach (self::$FRANCHISES as $franchise){
            if(preg_match("/$franchise->pattern/", $num)){
                return $franchise;
            }
        }
    }
}
