@extends('layouts.master')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách Sinh Viên</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('student.create') }}" class="btn btn-success">Thêm sinh viên</a>
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Tìm kiếm">
                            <button class="btn btn-secondary">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <a
                                    href="?search={{ request('search') }}&sort_by=id&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">
                                    #
                                    @if (request('sort_by') == 'id')
                                        <i class="fa fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a
                                    href="?search={{ request('search') }}&sort_by=name&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">
                                    Name
                                    @if (request('sort_by') == 'name')
                                        <i class="fa fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Image</th>
                            <th>
                                <a
                                    href="?search={{ request('search') }}&sort_by=gender&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">
                                    Gender
                                    @if (request('sort_by') == 'gender')
                                        <i class="fa fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a
                                    href="?search={{ request('search') }}&sort_by=address&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">
                                    Address
                                    @if (request('sort_by') == 'address')
                                        <i class="fa fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a
                                    href="?search={{ request('search') }}&sort_by=tel&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">
                                    Tel
                                    @if (request('sort_by') == 'tel')
                                        <i class="fa fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" width="50px" alt="Image">
                                </td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->tel }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('student.destroy', $item->id) }}"
                                        onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
