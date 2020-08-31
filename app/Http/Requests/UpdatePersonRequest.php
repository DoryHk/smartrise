<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *  Prepare the data for validation.
     */
    function prepareForValidation()
    {
        $this->merge([
            'updated_by'=> '1'
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => ["required", "string", "min:4", "max:255", "regex:/^([^0-9]*)$/"],
            "last_name" => ["required", "string", "min:4", "max:255", "regex:/^([^0-9]*)$/"],
            "email" => ["required", "email", "min:11", "max:255"],
            "phone_number" => ["required", "regex:/^([0-9\s\-\+\(\)]*)$/", "min:10"],
            "date_of_birth" => ["required"],
            "preferred_contact_method" => ["required"],
            "gender" => ["required"],
            "created_by" => ["nullable"],
            "updated_by" => ["nullable"],
        ];
    }
}
