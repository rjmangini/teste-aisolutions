<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

Class FileHandler
{
    // usei o 1024 para forçar o erro
    const CONTENT_MAX_SIZE = 2048; //1024;

    static public function getJsonDocuments(string $filename): array
    {
        $content = File::json($filename);

        return $content['documentos'];
    }

    static public function checkContentSize(string $content): bool
    {
        return (self::CONTENT_MAX_SIZE > strlen($content));
    }

    static public function checkTitleContain(string $title, array $keys)
    {
        $length = count($keys);
        
        // equivalendo tamanho dos arrays
        $titles = [];
        $titles = array_pad($titles, $length, $title);

        $check = array_map('str_contains', $titles, $keys);

        return array_search(true, $check, true);
    }

}
