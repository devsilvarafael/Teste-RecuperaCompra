<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id_user' => 2,
            'name' => 'Disparos Automáticos',
            'description' => 'Crie campanhas de disparos automáticos de mensagens para seus clientes e melhore a taxa de conversão das suas vendas.'
        ]);

        Category::create([
            'id_user' => 2,
            'name' => 'Teste',
            'description' => 'Teste'
        ]);

        Category::create([
            'id_user' => 1,
            'name' => 'Teste 2',
            'description' => 'Teste 2'
        ]);
    }
}
