<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'name' => $row[0],
            'birthday' => $row[1],
            'phone' => $row[2],
            'address' => $row[3],
            'credit_card_number' => $row[4],
            'email' => $row[5],
            'user_id' => Auth::id()
        ]);
    }
}
