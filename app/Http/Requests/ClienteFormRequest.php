<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;


class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'tipo_persona'=>'required|max:50',
            'nombre'=> 'Required |max:256',
            'tipo_documento'=>'max:50',
            'numero_documento'=>'max:50',
            'ireccion'=>'max:250',
            'telefonoo'=>'max:10',
            'email'=>'max:50',
        ];
    }
}
