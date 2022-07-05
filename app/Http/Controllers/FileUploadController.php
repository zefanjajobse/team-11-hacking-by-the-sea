<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
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

        $path = $request->file('file')->store('public/files');


        $save = new File;

        $save->name = $name;
        $save->path = $path;

        return redirect('file-upload')->with('status', 'File Has been uploaded successfully');

    }
}
