<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Xác định các quy tắc xác thực.
     */
    public function rules(): array
    {
        $studentId = $this->route('student'); // Lấy ID của sinh viên từ route

        return [
            'name' => 'required',
            'gender' => 'required',
            'tel' => 'required|unique:students,tel,' . $studentId . ',id', // Ngoại trừ số điện thoại của sinh viên hiện tại
            'address' => 'required',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'tel.required' => 'Số điện thoại là bắt buộc.',
            'tel.unique' => 'Số điện thoại này đã được sử dụng.',
            'address.required' => 'Địa chỉ là bắt buộc.',
        ];
    }
}
