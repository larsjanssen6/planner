<?php

use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Domain\Category::class, 10)->create();
        factory(App\Domain\Peleton::class, 10)->create();
        factory(App\Domain\Vehicle::class, 10)->create();
        factory(App\Domain\Group::class, 10)->create();
        factory(App\Domain\Education::class, 10)->create();
        factory(App\Domain\User::class, 10)->create();

        // edit first user
        $user = App\Domain\User::first();
        $user->name = 'Sander';
        $user->last_name = 'van Hooff';
        $user->email = 's.vanhooff@hotmail.com';
        $user->password = bcrypt('123');
        $user->save();
    }
}
