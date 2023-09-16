<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UpazilaSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(DivisionSeeder::class);

        User::create([
            'name' => 'Faysal Ahamed',
            'email' => 'devfaysal@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $this->call(SourceSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(LeadSeeder::class);
    }
}
