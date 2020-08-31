<?php

use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();

        factory(Person::class, 20)
            ->create([
                "created_by" => $user->id,
                "updated_by" => $user->id,
            ])
            ->each(function ($person) use ($user) {
                $person->addresses()
                    ->saveMany(
                        factory(Address::class, 2)
                            ->make([
                                "created_by" => $user->id,
                                "updated_by" => $user->id
                            ])
                    );
            });
    }
}
