@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($linhVuc)) Cập Nhật @else Thêm @endif Lĩnh Vực</h4>
                @if(isset($linhVuc))
                <form action="{{ route('linh-vuc.xu-ly-cap-nhat', ['id' => $linhVuc->id]) }}" method="POST">
                @else
                <form action="{{ route('linh-vuc.xu-ly-them-moi') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="ten_linh_vuc">Tên</label>
                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" @if(isset($linhVuc)) value="{{ $linhVuc->ten_linh_vuc }}" @endif>
                        <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($linhVuc)) Cập Nhật @else Thêm @endif</button>
                    <a class="btn btn-warning" href="{{ route('linh-vuc.danh-sach') }}">Hủy</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection