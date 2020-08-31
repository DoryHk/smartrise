<?php

namespace App\Actions\Address;


use App\Models\Address;
use Illuminate\Support\Facades\Log;

class UpdateAddressAction
{
    /**
     * Update an existing address.
     *
     * @param Address $address
     * @param array $data
     *
     * @return Address
     */
    public static function execute(Address $address, array $data): ?Address
    {
        try {
            if (!$address->update($data)) {
                throw new \Exception("Could not update address.");
            }
            return $address;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}