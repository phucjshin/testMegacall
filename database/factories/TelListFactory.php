<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TelList::class, function (Faker $faker) {
    return [
        'no' => 1,
    	'module' => 'outbound',
    	'type' => 1,
    	'quantity' => 10,
    	'company_id' => 1,
        'name' => $faker->name,
        'columns' => [],
        'del_flag' => 'N'
    ];
});
