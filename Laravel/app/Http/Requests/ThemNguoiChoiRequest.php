<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemNguoiChoiRequest extends FormRequest
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
            'ten_dang_nhap' => 'required',
            'mat_khau' => 'required',
            'email' => 'required',
            'hinh_dai_dien' => 'required',
            'diem_cao_nhat' => 'required',
            'credit' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ten_dang_nhap.required' => 'Vui lòng nhập tên đăng nhập',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'email.required' => 'Vui lòng nhập email',
            'hinh_dai_dien.required' => 'Vui lòng chọn hình đại diện',
            'diem_cao_nhat.required' => 'Vui lòng nhập điểm',
            'credit.required' => 'Vui lòng nhập số credit',
        ];
    }
}
