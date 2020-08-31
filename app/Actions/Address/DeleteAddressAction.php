<?php

namespace App\Actions\Address;


use App\Models\Address;
use Illuminate\Support\Facades\Log;

class DeleteAddressAction
{
    /**
     * Update an existing address.
     *
     * @param Address $address
     *
     * @return Address
     */
    public static function execute(Address $address): ?Address
    {
        try {
            if (!$address->delete()) {
                throw new \Exception("Could not delete address.");
            }
            return $address;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}