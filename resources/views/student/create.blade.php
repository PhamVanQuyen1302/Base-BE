@extends('layouts.master')

@section('content')
    <div class="card my-5">
        <h4 class="card-header">Thêm mới bài viết</h4>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tiêu đề">
                </div>
                @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tel</label>
                    <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
                </div>
                @error('tel')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" id="">
                        <option value="" selected>Chon gioi tinh</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                @error('gender')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Nhập tiêu đề">
                </div>
                @error('address')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
