<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            'code' => 'required|unique:vouchers,code',
            'name' => 'required|string',
            'valid_from' => 'sometimes|date_format:Y-m-d',
            'valid_to' => 'sometimes|date_format:Y-m-d',
            'discount' => 'required|numeric|between:0,100',
        ];
    }
}
