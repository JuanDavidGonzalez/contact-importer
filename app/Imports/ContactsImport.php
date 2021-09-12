<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Franchise;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, SkipsOnError, WithHeadingRow, WithValidation
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        $franchise_id = Franchise::getFranchise($row['credit_card_number']);

        return new Contact([
            'name' => $row['name'],
            'birthday' => $row['birthday'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'credit_card_number' =>  Hash::make($row['credit_card_number']),
            'email' => $row['email'],
            'user_id' => Auth::id(),
            'franchise_id' => $franchise_id,
            'code' => substr($row['credit_card_number'], -4)
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'regex:/^[a-zA-Z0-9\-]+$/',
            'birthday' => 'date',
            'address' => 'string|max:255',
            'credit_card_number' => 'numeric',
            'email' => Rule::unique('contacts', 'email' )->where('user_id', Auth::id())
        ];

    }


}
