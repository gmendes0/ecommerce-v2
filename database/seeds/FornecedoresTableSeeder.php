<?php

use Illuminate\Database\Seeder;

class FornecedoresTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\Entities\Fornecedor::class, 50)->create();
	}
}
