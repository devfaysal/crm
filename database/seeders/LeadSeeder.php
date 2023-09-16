<?php
namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Status;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_BD');
        $status_count = Status::count();

        $divisions = Division::pluck('name');
        $districts = District::pluck('name');
        $upazilas = Upazila::pluck('name');
        foreach(range(1,50) as $lead){
            $lead_data['user_created_id'] = 1;
            $lead_data['user_assigned_id'] = 1;
            $lead_data['name'] = $faker->name;
            $lead_data['phone'] = $faker->PhoneNumber;
            $lead_data['email'] = $faker->email;
            $lead_data['source'] = $this->get_random_element(['Facebook', 'Techplatoon', 'Daraz']);
            $lead_data['description'] = $faker->sentence;
            $lead_data['company'] = $faker->company;
            $lead_data['division'] = $faker->randomElement($divisions);
            $lead_data['district'] = $faker->randomElement($districts);
            $lead_data['upazila'] = $faker->randomElement($upazilas);
            $lead_data['status_id'] = rand(1, $status_count);

            Lead::create($lead_data);
        }

    }

    public function get_random_element( array $array )
        {
            $range = count($array) - 1;
            $random_index = rand( 0, $range );
            return $array[ $random_index ];
        }
}
