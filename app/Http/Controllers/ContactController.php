<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
use App\Models\Contact;
use App\Models\ImportedFiles;
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
        $files =  ImportedFiles::where('user_id', Auth::id())->orderBy('id','desc')->paginate(10);

        return view('contact.importedFiles', compact('files'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'contactFile' => 'required|file|mimetypes:text/csv,text/plain'
        ]);

        $file = $request->file('contactFile');
        $file_ext = $file->getClientOriginalExtension();
        $file_name= uniqid().'.'.$file_ext; ;
        $path = $file->storeAs('import', $file_name);

        $importedFile = ImportedFiles::create([
            'file_name' => $file->getClientOriginalName(),
            'user_id' => Auth::id()
        ]);

        $import = new ContactsImport($importedFile);
        $import->import($path);

        return redirect()->route('contact.importedFiles')->withStatus('Import in queue, the file status will be update after import finished.');
    }
}
