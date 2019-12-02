@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Cập Nhật Cấu Hình App</h4>
                <form action="{{ route('cau-hinh-app.xu-ly-cap-nhat', ['id' => $cauHinhApp->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="co_hoi_sai">Cơ Hội Sai</label>
                        <input type="text" class="form-control" id="co_hoi_sai" name="co_hoi_sai" value="{{ $cauHinhApp->co_hoi_sai }}">
                        <!-- <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span> -->
                    </div>
                    <div class="form-group">
                        <label for="thoi_gian_tra_loi">Thời Gian Trả Lời</label>
                        <input type="text" class="form-control" id="thoi_gian_tra_loi" name="thoi_gian_tra_loi" value="{{ $cauHinhApp->thoi_gian_tra_loi }}">
                        <!-- <span class="text-danger">{{ $errors->first('ten_linh_vuc') }}</span> -->
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                    <a class="btn btn-warning" href="{{ route('linh-vuc.danh-sach') }}">Hủy</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection