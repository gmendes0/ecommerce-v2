<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\Entities\Produto::class, 50)->create();
	}
}
