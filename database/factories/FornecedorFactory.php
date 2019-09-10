<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Entities\Fornecedor;
use Faker\Generator as Faker;

$factory->define(Fornecedor::class, function (Faker $faker) {
	return [
		'nome' => $faker->company,
		'email' => $faker->companyEmail,
		'cnpj' => $faker->randomNumber(9),
		'active' => $faker->randomElement([0, 1])
	];
});
