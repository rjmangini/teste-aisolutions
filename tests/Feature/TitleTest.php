<?php

namespace Tests\Feature;

use App\Helpers\FileHandler;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TitleTest extends TestCase
{
    protected array $year = [
        'janeiro',
        'fevereiro',
        'março',
        'abril',
        'maio',
        'junho',
        'julho',
        'agosto',
        'setembro',
        'outubro',
        'novembro',
        'dezembro',
    ];
    protected array $semestre = [
        'semestre',
    ];

    public function test_title_categorie(): void
    {
        $filename = storage_path("data/2023-03-28.json");
        $documents = FileHandler::getJsonDocuments($filename);

        foreach ($documents as $document) {
            if ($document['categoria'] === 'Remessa') {
                $allowed = $this->semestre;
            }
            if ($document['categoria'] === 'Remessa Parcial') {
                $allowed = $this->year;
            }
            $isValid = FileHandler::checkTitleContain($document['titulo'], $allowed);
            
            $this->assertTrue($isValid !== false);
        }
    }
}
