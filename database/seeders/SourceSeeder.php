<?php
namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = ['Facebook', 'Techplatoon', 'Daraz'];

        foreach($sources as $source){
            Source::create([
                'name' => $source
            ]);
        }
    }
}
