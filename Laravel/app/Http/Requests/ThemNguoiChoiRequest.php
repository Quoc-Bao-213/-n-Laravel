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
            'mat_khau' => 'required|min:8',
            'xac_nhan_mat_khau' => 'required|same:mat_khau',
            'email' => 'required|email',
            'hinh_dai_dien' => 'required|image',
            'diem_cao_nhat' => 'required|numeric',
            'credit' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'ten_dang_nhap.required' => 'Vui lòng nhập tên đăng nhập',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'xac_nhan_mat_khau.required' => 'Vui lòng nhập lại mật khẩu',
            'xac_nhan_mat_khau_cu.required' => 'vui lòng nhập lại mật khẩu cũ',
            'email.required' => 'Vui lòng nhập email',
            'hinh_dai_dien.required' => 'Vui lòng chọn hình đại diện',
            'diem_cao_nhat.required' => 'Vui lòng nhập điểm',
            'credit.required' => 'Vui lòng nhập số credit',

            'mat_khau.min' => 'Mật khẩu phải từ 8 kí tự trở lên',

            'xac_nhan_mat_khau.same' => 'Không trùng khớp với mật khẩu',

            'email.email' => 'Email phải đúng định dạng',

            'hinh_dai_dien.image' => 'Hình ảnh phải đúng định dạng',

            'diem_cao_nhat.numeric' => 'Chỉ được nhập số',
            'credit.numeric' => 'Chỉ được nhập số'
        ];
    }
}
