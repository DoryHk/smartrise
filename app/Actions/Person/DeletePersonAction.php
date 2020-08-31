<?php

namespace App\Actions\Person;


use App\Models\Person;
use Illuminate\Support\Facades\Log;

class DeletePersonAction
{
    /**
     * Update an existing person.
     *
     * @param Person $person
     *
     * @return Person
     */
    public static function execute(Person $person): ?Person
    {
        try {
            if (!$person->delete()) {
                throw new \Exception("Could not delete person.");
            }
            return $person;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}