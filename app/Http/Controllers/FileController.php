<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return FileResource::collection($files);
    }

    public function upload(FileRequest $request)
    {
        $input = $request->validated();
        $file = $input['file'];
        $name = $file->getClientOriginalName();
        $path = $file->store('files', 'public');

        $file = File::query()->create([
            'name' => $name,
            'path' => $path,
        ]);

        return new FileResource($file);
    }

    public function download(File $file)
    {
        return Storage::disk('public')
            ->download($file->path);
    }

    public function delete(File $file)
    {
        Storage::disk('public')->delete($file->path);
        $file->delete();
    }
}
