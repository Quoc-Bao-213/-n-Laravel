@extends('layout')

@section('main-content')
@if(session('cap-nhat'))
        <script type="text/javascript">Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '{{session('cap-nhat')}}',
  showConfirmButton: false,
  timer: 2500
})</script>
    @endif
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($nguoiChoi)) Cập Nhật @else Thêm @endif Người Chơi</h4>
                @if(isset($nguoiChoi))
                <form action="{{ route('nguoi-choi.xu-ly-cap-nhat', ['id' => $nguoiChoi->id]) }}" method="POST">
                @else
                <form action="{{ route('nguoi-choi.xu-ly-them-moi') }}" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" @if(isset($nguoiChoi)) disabled value="{{ $nguoiChoi->ten_dang_nhap }}" @endif>
                        <span class="text-danger">{{ $errors->first('ten_dang_nhap') }}</span>
                    </div>
                    @if(isset($nguoiChoi))
                    <div class="form-group">
                        <label for="xac_nhan_mat_khau_cu">Nhập lại mật khẩu cũ</label>
                        <input type="password" class="form-control" id="xac_nhan_mat_khau_cu" name="xac_nhan_mat_khau_cu">
                    </div>
                    <div class="form-group">
                        <label for="mat_khau">Mật khẩu mới</label> 
                        <input type="password" class="form-control" id="mat_khau" name="mat_khau">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" class="form-control" id="mat_khau" name="mat_khau">
                        <span class="text-danger">{{ $errors->first('mat_khau') }}</span>
                    </div>  
                    <div class="form-group">
                        <label for="xac_nhan_mat_khau">Xác nhận lại mật khẩu</label>
                        <input type="password" class="form-control" id="xac_nhan_mat_khau" name="xac_nhan_mat_khau">
                        <span class="text-danger">{{ $errors->first('xac_nhan_mat_khau') }}</span>
                    </div>  
                    @endif
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" @if(isset($nguoiChoi)) disabled value="{{ $nguoiChoi->email }}" @endif>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <!-- START -->
                    @if(!isset($nguoiChoi))
                    <div class="form-group">
                        <label for="hinh_dai_dien">Hình đại diện</label><br />
                        <input type="file" id="hinh_dai_dien" name="hinh_dai_dien">
                        <br><span class="text-danger">{{ $errors->first('hinh_dai_dien') }}</span>
                    </div>
                    @endif
                    <!-- END -->
                    <div class="form-group">
                        <label for="diem_cao_nhat">Điểm cao nhất</label>
                        <input type="text" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->diem_cao_nhat }}" @endif>
                        <span class="text-danger">{{ $errors->first('diem_cao_nhat') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="credit">Credit</label>
                        <input type="text" class="form-control" id="credit" name="credit" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->credit }}" @endif>
                        <span class="text-danger">{{ $errors->first('credit') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($nguoiChoi)) Cập Nhật @else Thêm @endif</button>
                    <a class="btn btn-warning" href="{{ route('nguoi-choi.danh-sach') }}">Hủy</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection