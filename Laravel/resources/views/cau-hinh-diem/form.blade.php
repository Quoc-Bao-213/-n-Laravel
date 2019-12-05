@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($diemCauHoi)) Cập Nhật @else Thêm @endif Điểm Câu Hỏi</h4>
                @if(isset($diemCauHoi))
                <form action="{{ route('cau-hinh-diem.xu-ly-cap-nhat', ['id' => $diemCauHoi->id]) }}" method="POST">
                @else
                <form action="{{ route('cau-hinh-diem.xu-ly-them-moi') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="thu_tu">Thứ Tự</label>
                        <input type="text" class="form-control" id="thu_tu" name="thu_tu" @if(isset($diemCauHoi)) value="{{ $diemCauHoi->thu_tu }}" @endif>
                        <span class="text-danger">{{ $errors->first('thu_tu') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="diem">Điểm</label>
                        <input type="text" class="form-control" id="diem" name="diem" @if(isset($diemCauHoi)) value="{{ $diemCauHoi->diem }}" @endif>
                        <span class="text-danger">{{ $errors->first('diem') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($diemCauHoi)) Cập Nhật @else Thêm @endif</button>
                    <a class="btn btn-warning" href="{{ route('cau-hinh-diem.danh-sach') }}">Hủy</a>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection