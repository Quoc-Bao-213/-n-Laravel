<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHinhTroGiupRequest extends FormRequest
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
            'loai_tro_giup' => 'required|numeric',
            'thu_tu' => 'required|numeric',
            'credit' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'loai_tro_giup.required' => 'Loại trợ giúp không được bỏ trống',
            'thu_tu.required' => 'Thứ tự không được bỏ trống',
            'credit.required' => 'Credit Không được bỏ trống',

            'loai_tro_giup.numeric' => 'Loại trợ giúp chỉ được nhập số',
            'thu_tu.numeric' => 'Thứ tự chỉ được nhập số',
            'credit.numeric' => 'Credit chỉ được nhập số'
        ];
    }
}
