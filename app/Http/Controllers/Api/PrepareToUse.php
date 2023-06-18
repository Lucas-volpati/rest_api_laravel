<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoredKey;
use App\Models\Library;

class PrepareToUse extends Controller
{
    public function runPreparations() {
        Library::newFactory()->create();
        Library::newFactory()->create([
            'title' => 'O Poder do Hábito',
            'original_title' => 'The Power Of Habit',
            'publish_company' => 'Objetiva'
        ]);
        Library::newFactory()->create([
            'title' => 'O Milagre da Manhã',
            'original_title' => 'The Miracle Morning',
            'publish_company' => 'Best Seller'
        ]);
        StoredKey::newFactory()->create();

        echo json_encode(['success' => "Registers was created.", "status" => 1]);
    }


}
