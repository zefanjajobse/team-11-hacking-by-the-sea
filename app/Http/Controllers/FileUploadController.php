<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class FileUploadController extends Controller
{
    private $fileName;

    public function index()
    {
        return view('file-upload.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required:pdf|max:2048',

        ]);

        $name = $request->file('file')->getFilename();
        $fileName = $name;
        $path = $request->file('file')->store('files', ['disk' => 'public']);


        $save = new File;

        $save->name = $name;
        $save->path = $path;
        $parser = new Parser();

        $pdf = $parser->parseFile(storage_path('app/public/') . $path);
        $text = $pdf->getText();

       dd($text);

        return redirect('file-upload')->with('status', 'File Has been uploaded successfully');

    }
}

