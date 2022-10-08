<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'         => ['required', 'max:50'],
            'apellido'       => ['required', 'max:50'],
            'cuil'           => ['required', 'string', Rule::unique('clientes', 'cuil')->ignore($this->cliente), 'regex:/(^(20|2[3-7]|30|3[3-4])-(\d{8})-(\d)?$)/u'],
            'nacimiento'     => ['date_format:Y-m-d'],
            'domicilio'      => ['string', 'max:100'],
            'email'          => ['required', 'email'],
            'telefono'       => ['required'],
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Erorres de validación',

            'data'      => $validator->errors()

        ]));
    }
}
