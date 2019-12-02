@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($troGiup)) Cập Nhật @else Thêm @endif Điểm Trợ Giúp</h4>
                @if(isset($troGiup))
                <form action="{{ route('cau-hinh-tro-giup.xu-ly-cap-nhat', ['id' => $troGiup->id]) }}" method="POST">
                @else
                <form action="{{ route('cau-hinh-tro-giup.xu-ly-them-moi') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="loai_tro_giup">Loại Trợ Giúp</label>
                        <input type="text" class="form-control" id="loai_tro_giup" name="loai_tro_giup" @if(isset($troGiup)) value="{{ $troGiup->loai_tro_giup }}" @endif>
                        <!-- <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span> -->
                    </div>
                    <div class="form-group">
                        <label for="thu_tu">Thứ Tự</label>
                        <input type="text" class="form-control" id="thu_tu" name="thu_tu" @if(isset($troGiup)) value="{{ $troGiup->thu_tu }}" @endif>
                        <!-- <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span> -->
                    </div>
                    <div class="form-group">
                        <label for="credit">Credit</label>
                        <input type="text" class="form-control" id="credit" name="credit" @if(isset($troGiup)) value="{{ $troGiup->credit }}" @endif>
                        <!-- <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span> -->
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($troGiup)) Cập Nhật @else Thêm @endif</button>
                    <a class="btn btn-warning" href="{{ route('cau-hinh-tro-giup.danh-sach') }}">Hủy</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection