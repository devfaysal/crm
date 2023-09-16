<?php
namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Order Confirmed' => '#6EBF6E',
            'Did Not Pickup Call' => '#E9E916',
            'Not Interested' => '#F24A4A',
            'Call Later' => '#FF8000',
            'Completed' => '#FF80FF',
        ];

        foreach($statuses as $status => $color){
            Status::create([
                'name' => $status,
                'color' => $color
            ]);
        }
    }
}
