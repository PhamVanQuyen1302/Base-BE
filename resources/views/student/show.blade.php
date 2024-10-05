@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chi Tiết Sinh Viên</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Hình ảnh đại diện -->
                <div class="col-md-4">
                    <img src="{{ Storage::url($data->image) }}" class="img-fluid rounded"  alt="Hình ảnh sinh viên">
                </div>

                <!-- Thông tin chi tiết -->
                <div class="col-md-8">
                    <h5 class="card-title">Tên: {{ $data->name }}</h5>
                    <p class="card-text"><strong>Giới tính:</strong> {{ $data->gender }}</p>
                    <p class="card-text"><strong>Ngày sinh:</strong> {{ $data->date_of_birth }}</p>
                    <p class="card-text"><strong>Địa chỉ:</strong> {{ $data->address }}</p>
                    <p class="card-text"><strong>Số điện thoại:</strong> {{ $data->tel }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <!-- Nút quay lại danh sách -->
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Quay lại danh sách</a>

                <!-- Nút chỉnh sửa và xóa -->
                <div>
                    <a href="{{ route('student.edit', $data->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                    <a href="{{ route('student.destroy', $data->id) }}"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        </div>
    </div>
@endsection
