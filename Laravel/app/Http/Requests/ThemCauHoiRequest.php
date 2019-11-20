<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemCauHoiRequest extends FormRequest
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
            'noi_dung' => 'required',
            'phuong_an_a' => 'required',
            'phuong_an_b' => 'required',
            'phuong_an_c' => 'required',
            'phuong_an_d' => 'required',
            'dap_an' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'noi_dung.required' => 'Vui lòng nhập nội dung',
            'phuong_an_a.required' => 'Vui lòng nhập phương án A',
            'phuong_an_b.required' => 'Vui lòng nhập phương án B',
            'phuong_an_c.required' => 'Vui lòng nhập phương án C',
            'phuong_an_d.required' => 'Vui lòng nhập phương án D',
            'dap_an.required' => 'Vui lòng nhập đáp án đúng'     
        ];
    }
}
