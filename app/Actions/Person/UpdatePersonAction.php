<?php

namespace App\Actions\Person;


use App\Models\Person;
use Illuminate\Support\Facades\Log;

class UpdatePersonAction
{
    /**
     * Update an existing person.
     *
     * @param Person $person
     * @param array $data
     *
     * @return Person
     */
    public static function execute(Person $person, array $data): ?Person
    {
        try {
            if (!$person->update($data)) {
                throw new \Exception("Could not update person.");
            }
            return $person;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}