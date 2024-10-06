@extends('layouts.master')

@section('content')
    <div class="card my-5">
        <h4 class="card-header">Cập nhật thông tin bài viết</h4>
        <div class="card-body">
            <form action="{{ route('student.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $model->name }}"
                        placeholder="Nhập tiêu đề">
                </div>
                @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                @if ($model->image)
                    <img src="{{ Storage::url($model->image) }}" width="50px" alt="">
                @endif
                <div class="mb-3">
                    <label class="form-label">Tel</label>
                    <input type="text" name="tel" class="form-control" value="{{ $model->tel }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" id="">
                        <option value="Nam" {{ old('gender', $model->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gender', $model->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>


                @error('gender')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $model->address }}"
                        placeholder="Nhập tiêu đề">
                </div>
                @error('address')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
