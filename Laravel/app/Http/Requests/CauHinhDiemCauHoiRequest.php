<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHinhDiemCauHoiRequest extends FormRequest
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
            'thu_tu' => 'required|numeric',
            'diem' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'thu_tu.required' => 'Vui lòng nhập thứ tự',
            'diem.required' => 'Vui lòng nhập điểm',

            'thu_tu.numeric' => 'Thứ tự chỉ được nhập số',
            'diem.numeric' => 'Điểm chỉ được nhập số'
        ];
    }
}
