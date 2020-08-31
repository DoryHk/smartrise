<?php

namespace App\Actions\Address;

use App\Models\Address;
use Illuminate\Support\Facades\Log;

class CreateAddressAction
{
    /**
     * Create a new address and persist it to the DB.
     *
     * @param array $data
     *
     * @return Address
     */
    public static function execute(array $data): ?Address
    {
        try {
            return Address::create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}