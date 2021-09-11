<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->paginate(10);

        return view('contact.index', compact('contacts'));
    }

    public function import()
    {
        return view('contact.import');
    }
}
