<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OfferClaim;
use Faker\Generator as Faker;

$factory->define(OfferClaim::class, function (Faker $faker) {
    return [
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'email' => $this->faker->safeEmail,
        'address1' => $this->faker->address,
        'address2' => $this->faker->address,
        'postal_code' => $this->faker->postcode,
        'city' => $this->faker->city,
        'vat_no' => $this->faker->postcode,
        'invoice' => json_encode([$this->faker->word]),
        'account_owner' => $this->faker->name,
        'iban' => $this->faker->iban,
        'status' => 'pending',
        'bank' => $this->faker->name,
        'is_dell_partner' => 1,
        'permission_to_contact' => 1,
        'privacy_policy' => 1,
        'terms_condition' => 1,
    ];
});
