<?php

namespace Database\Factories;

use App\Models\StoredKey;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StoredKeyFactory extends Factory
{
    protected $model = StoredKey::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => 'this_is_my_simple_key'
        ];
    }
}
