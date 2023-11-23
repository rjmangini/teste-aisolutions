<?php

namespace Tests\Feature;

use App\Helpers\FileHandler;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{

    public function test_content_size(): void
    {
        $filename = storage_path("data/2023-03-28.json");
        $documents = FileHandler::getJsonDocuments($filename);

        $isValid = true;
        foreach ($documents as $document) {
            if ($isValid)
                $isValid = FileHandler::checkContentSize($document['conteúdo']);
        }
        $this->assertTrue($isValid);
    }

}
