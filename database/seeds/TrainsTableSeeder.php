<?php

use App\Train;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creo un'istanza di Generetor tramite la 
        // Factory per poter impostare la lingua italiana
        $faker = Faker::create('it_IT');

        for ($i = 0; $i < 100; $i++) {
            $newTrain = new Train();
            
            $newTrain->company = $this->witchCompany();
            $newTrain->departure_station = $faker->city();
            $newTrain->arrival_station = $faker->city();
            $newTrain->departure_time = $faker->dateTimeThisMonth();
            $newTrain->arrival_time = $faker->dateTimeThisMonth();
            $newTrain->number = $faker->randomNumber(3);
            $newTrain->carriages = $faker->numberBetween(3, 12);
            $newTrain->in_time = $faker->optional($weight = .4, $default = true)->boolean();
            $newTrain->is_cancelled = $faker->optional($weight = .2, $default = false)->boolean();
    
            $newTrain->save();
        }
    }

    private function witchCompany() {
        $companies = ['Trenitalia', 'Italo', 'Trenord'];
        return $companies[rand() % count($companies)];
    }
}
