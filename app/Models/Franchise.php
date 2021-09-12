<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    protected $table = 'franchises';
    protected $fillable = ['name'];
    public $timestamps = false;

    public static function getFranchise($num){

        if(preg_match('/^3[47][0-9]{5,}$/', $num)){
            $id = 1; //American Express
        }
        elseif (preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/', $num)){
            $id = 2; //Diners CLub
        }
        elseif (preg_match('/^6(?:011|5[0-9]{2})[0-9]{3,}$/', $num)){
            $id = 3; //Discovery
        }
        elseif (preg_match('/^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/', $num)){
            $id = 4; //JCB
        }
        elseif (preg_match('/^5[1-5]/', $num)){
            $id = 5; //MasterCard
        }
        elseif (preg_match('/^4[0-9]{6,}$/', $num)){
            $id = 6; //Visa
        }else{
            return 1;
        }

        return $id;
    }
}
