<?php

namespace Database\Factories;

use App\Models\Ville;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Etudiant::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $villes = Ville::all()->pluck('id')->toArray();

        return [
            'id' => $this->faker->unique()->numberBetween(1, User::count()),
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'phone' => $this->faker->numerify('###-###-####'),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->date(),
            'ville_id' => Arr::random($villes)
        ];
    }
}
