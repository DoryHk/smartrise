<?php

namespace App\Actions\Person;

use App\Models\Person;
use Illuminate\Support\Facades\Log;

class CreatePersonAction
{
    /**
     * Create a new person and persist it to the DB.
     *
     * @param array $data
     *
     * @return Person
     */
    public static function execute(array $data): ?Person
    {
        try {
            return Person::create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}