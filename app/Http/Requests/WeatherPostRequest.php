<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class WeatherPostRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'zipcode' => 'required|numeric|min:10000|max:99999'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'zipcode.required' => 'Zipcode is required',
            'zipcode.numeric'  => 'Zipcode must be numeric',
            'zipcode.min'      => 'Zipcode must 5 digits',
            'zipcode.max'      => 'Zipcode must 5 digits'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                $validator->errors(), 418
            ));

    }

}
