<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('password'),
            'phone' => '011112313',
            'whatsapp' => '131321313'
        ])->assign('admin');
    }
}
