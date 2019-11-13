<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLuotChoiRequest extends FormRequest
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
            'so_cau' => 'required',
            'diem' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'so_cau.required' => 'Vui lòng nhập tên gói',
            // 'diem.required' => 'Vui lòng nhập số credit',
            // 'so_tien.required' => 'Vui lòng nhập số tiền',
        ];
    }
}
