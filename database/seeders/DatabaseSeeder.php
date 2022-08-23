<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      // $this->call(ProductSeeder::class);
	  	\App\Models\Product::create([ 
		    //'id' => 1, !!ошибку уникальности выдаёт при первой вставки из приложения
            'article' => 'zpavt1',
            'name' => 'запчасть 1',   
            'status' => 'available',
			'data' => '[{"key":"size","value":"XL"},{"key":"color","value":"Чёрный"}]', 
			//'data' => '[{"color":"черный"}, {"size":"L"}]', - не показывал так
			//'data' => '{"color":"черный", "size":"L"}',
			]);
      	\App\Models\Product::create([ 
 		   // 'id' => 2, !!ошибку уникальности выдаёт при первой вставки из приложения
            'article' => 'zpavt12',
            'name' => 'запчасть 2',   
            'status' => 'unavailable',
			'data' => '[{"key":"size","value":"L"},{"key":"color","value":"Серый"}]',
            // 'data' => '{"color":"серый", "size":"XL"}',			
			]);
		\App\Models\Product::create([ 
            'article' => 'zpavt13',
            'name' => 'деталь',   
            'status' => 'unavailable',
			'data' => '[{"key":"size","value":"Sm"},{"key":"color","value":"Зелёный"}]',		
			]);	
    }
}
