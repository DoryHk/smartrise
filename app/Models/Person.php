<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    /**
     * The types of "Preferred Contact Method".
     *
     * Email    => 1
     * Phone    => 2
     * SMS      => 3
     *
     * @var int
     */
    public const CONTACT_METHOD_EMAIL = 1;
    public const CONTACT_METHOD_PHONE = 2;
    public const CONTACT_METHOD_SMS = 3;

    /**
     * The fields that are guarded.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the addresses related to the Person.
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(
            Address::class,
            "person_id",
            "id"
        );
    }

    /**
     * Get the full name of the person.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Get preferred contact method of the person.
     *
     * @return string
     */
    public function getPreferredContactMethod(): string
    {
        $contactMethods = [
            1 => "Email",
            2 => "Phone",
            3 => "SMS",
        ];
        return $contactMethods[$this->preferred_contact_method];
    }

    /**
     * Get addresses.
     *
     * @return object
     */
    public function getAddresses(): object
    {
        return Address::all()->where('person_id',$this->id);
    }

}
