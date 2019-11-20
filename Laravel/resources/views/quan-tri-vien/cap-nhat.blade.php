@extends('layout')
@section('main-content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Đổi mật khẩu</h4>
                @if($errors->any())
                <div class="alert alert-danger" sty>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="font-weight: bold;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('quan-tri-vien.xu-ly-cap-nhat', ['id' => $quanTriVien->id]) }}" method="POST">

                    @csrf
                    <div class="form-group">
                                <label for="ten_dang_nhap">Tên đăng nhập:</label>
                                <input type="text" disabled class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" @if(isset($quanTriVien)) value="{{ $quanTriVien->ten_dang_nhap }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="mat_khau_hien_tai">Mật khẩu hiện tại:</label>
                            <input type="password" class="form-control" id="mat_khau_hien_tai" name="mat_khau_hien_tai">
                        </div>
                        <div class="form-group">
                            <label for="mat_khau_moi">Mật khẩu Mới:</label>
                            <input type="password" class="form-control" id="mat_khau_moi" name="mat_khau_moi">
                        </div>
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                    <button type="button" class="btn btn-warning" onclick="window.history.back();">Hủy</button>
                    </div>
                
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection