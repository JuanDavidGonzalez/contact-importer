<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
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

    public function importedFiles()
    {
        $files = [];
        return view('contact.importedFiles', compact('files'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'contactFile' => 'required|file'
        ]);

        $file = $request->file('contactFile');
        $import = new ContactsImport();
        $import->import($file);

        return redirect()->route('contact.importedFiles')->withStatus('File imported successfully!');
    }
}
