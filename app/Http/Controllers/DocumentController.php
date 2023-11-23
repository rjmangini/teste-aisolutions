<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFile;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function prepareQueue()
    {
        $filename = storage_path("data/2023-03-28.json");
        $documents = Document::all();
        $queue = \App\Helpers\FileHandler::getJsonDocuments($filename);

        foreach ($queue as $document) {
            dispatch(new ProcessFile($document));
        }

        return view('teste', [
            'documents' => $documents,
            'queue' => $queue,
            'filename' => $filename,
        ]);
    }

    public function dispatchQueue()
    {
        $filename = storage_path("data/2023-03-28.json");
        $queue = Artisan::call('queue:work --stop-when-empty', []);
        $documents = Document::all();


        return view('teste', [
            'documents' => $documents,
            'queue' => [],
            'filename' => $filename,
        ]);
    }
}
