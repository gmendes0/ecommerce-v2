<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Entities\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
	return [
		'nome' => $faker->word,
		'valor' => $faker->randomFloat(2, 100, 10000),
		'descricao' => $faker->text(500),
		'active' => $faker->numberBetween(0, 1),
		'fornecedor_id' => function(){
			return factory(App\Entities\Fornecedor::class)->create()->id;
		}
	];
});
