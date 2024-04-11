<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('livros')->insert([
                'titulo' => $faker->titulo,
                'editora' => $faker->editora,
                'genero_id' => $faker->genero_id,
                'ano_lancamento' => $faker->ano_lancamento,
                'estado' => $faker->estado,
            ]);
        }
    }
}
