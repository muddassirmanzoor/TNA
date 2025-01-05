<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function index()
    {
        $documentDirectory = public_path('/assets/documents/'); //  documents are stored in public/assets/documents directory

        $documents = [];

        // Get all files in the directory
        $files = File::files($documentDirectory);

        foreach ($files as $file) {
            $documents[] = [
                'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                'path' => $file->getFilename() // You can adjust this according to your file structure
            ];
        }
        //dd($documents);
        return view('documents.index', compact('documents'));
    }
}
