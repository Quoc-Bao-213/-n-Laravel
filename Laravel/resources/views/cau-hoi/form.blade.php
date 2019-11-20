@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($cauHoi)) Cập Nhật @else Thêm @endif Câu Hỏi</h4>
                @if(isset($cauHoi))
                <form action="{{ route('cau-hoi.xu-ly-cap-nhat', ['id' => $cauHoi->id]) }}" method="POST">
                @else
                <form action="{{ route('cau-hoi.xu-ly-them-moi') }}" method="POST">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="noi_dung">Nội dung</label>
                        <input type="text" class="form-control" id="noi_dung" name="noi_dung" @if(isset($cauHoi)) value="{{ $cauHoi->noi_dung }}" @endif>
                        <span class="text-danger">{{ $errors->first('noi_dung') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="linh_vuc">Lĩnh vực</label>
                        <select class="custom-select" id="linh_vuc" name="linh_vuc">
                            <option>Chọn lĩnh vực</option>
                            @foreach($listLinhVuc as $linhVuc)
                                <option @if(isset($linhVuc)) selected @endif value="{{ $linhVuc->id }}">{{ $linhVuc->ten_linh_vuc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_a">Phương án A</label>
                        <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_a }}" @endif>
                        <span class="text-danger">{{ $errors->first('phuong_an_a') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_b">Phương án B</label>
                        <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_b }}" @endif>
                        <span class="text-danger">{{ $errors->first('phuong_an_b') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_c">Phương án C</label>
                        <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_c }}" @endif>
                        <span class="text-danger">{{ $errors->first('phuong_an_c') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="phuong_an_d">Phương án D</label>
                        <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_d }}" @endif>
                        <span class="text-danger">{{ $errors->first('phuong_an_d') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="dap_an">Đáp án</label>
                        <input type="text" class="form-control" id="dap_an" name="dap_an" @if(isset($cauHoi)) value="{{ $cauHoi->dap_an }}" @endif>
                        <span class="text-danger">{{ $errors->first('dap_an') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($cauHoi)) Cập Nhật @else Thêm @endif</button>
                    <button type="button" class="btn btn-warning" onclick="window.history.back();">Hủy</button>

                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection