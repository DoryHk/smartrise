<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'updated_by'=> '1',
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
            'name' => ["required"],
            'floor' => ["required", "numeric",'gt:0'],
            'building' => ["required"],
            'street' => ["required"],
            'city' => ["required"],
            'region' => ["required"],
            'country' => ["required"],
            "created_by" => ["nullable"],
            "updated_by" => ["nullable"]
        ];
    }
}
