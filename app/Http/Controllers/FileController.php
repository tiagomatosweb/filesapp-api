<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(FileRequest $request)
    {
        $input = $request->validated();
        $file = $input['file'];
        $name = $file->getClientOriginalName();
        $path = $file->store('files', 'public');

        File::query()->create([
            'name' => $name,
            'path' => $path,
        ]);
    }

    public function download(File $file)
    {
        return Storage::disk('public')
            ->download($file->path);
    }
}
