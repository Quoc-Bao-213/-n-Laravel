@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($luotChoi)) Cập Nhật @else Thêm @endif Lượt Chơi</h4>
                @if(isset($luotChoi))
                <form action="{{ route('luot-choi.xu-ly-cap-nhat', ['id' => $luotChoi->id]) }}" method="POST">
                @else
                <form action="{{ route('luot-choi.xu-ly-them-moi') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="nguoi_choi">Tên người chơi</label>
                        <select class="custom-select" id="nguoi_choi" name="nguoi_choi">
                            <option>Chọn người chơi</option>
                            @foreach($listNguoiChoi as $nguoiChoi)
                                <option @if(isset($nguoiChoi)) selected @endif value="{{ $nguoiChoi->id }}">{{ $nguoiChoi->ten_dang_nhap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="so_cau">Câu hỏi</label>
                        <input type="text" class="form-control" id="so_cau" name="so_cau" @if(isset($luotChoi)) value="{{ $luotChoi->so_cau }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="diem">Điểm Số</label>
                        <input type="text" class="form-control" id="diem" name="diem" @if(isset($luotChoi)) value="{{ $luotChoi->diem }}" @endif>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($luotChoi)) Cập Nhật @else Thêm @endif</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection