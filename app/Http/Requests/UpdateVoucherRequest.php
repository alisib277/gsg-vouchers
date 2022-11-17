<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'sometimes|unique:vouchers,code',
            'name' => 'sometimes|string',
            'valid_from' => 'sometimes|date_format:Y-m-d',
            'valid_to' => 'sometimes|date_format:Y-m-d',
            'discount' => 'sometimes|numeric|between:0,100',
        ];
    }
}
