@extends('layout')

@section('main-content')
    @if(session('cap-nhat'))
        <script type="text/javascript">Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('cap-nhat')}}',
  showConfirmButton: false,
  timer: 1500
})</script>
    @endif
<!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin CSM</a></li>
                                    <li class="breadcrumb-item active">Khôi phục</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Khôi Phục Trạng Thái</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Danh Sách Gói Credit</h4>
               
                <table id="goi-credit-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Gói</th>
                            <th>Số Credit</th>
                            <th>Số Tiền</th>
                            <th>Khôi Phục</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>   
                    <tbody>
                    	<!-- show data	 -->
                    	@foreach($listGoiCredit as $goiCredit)
                        <tr>
                            <td>{{ $goiCredit->id }}</td>
                            <td>{{ $goiCredit->ten_goi }}</td>
                            <td>{{ $goiCredit->credit }}</td>
                            <td>{{ $goiCredit->so_tien }}</td>
                            <td><a href="{{ route('khoi-phuc.khoiPhuc', ['id' => $goiCredit->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-grease-pencil"></i></a></td>
                            <td><a href="{{ route('goi-credit.xoa', ['id' => $goiCredit->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="header-title">Danh Sách Câu Hỏi</h4>
                <!-- table cau hoi -->
                <table id="linh-vuc-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Lĩnh vực</th>
                            <th>Phương án A</th>
                            <th>Phương án B</th>
                            <th>Phương án C</th>
                            <th>Phương án D</th>
                            <th>Đáp án</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        
                    </tbody>
                </table>
                <h4 class="header-title">Danh Sách Lĩnh Vực</h4>
                <!-- table linh vuc -->
                <table id="linh-vuc-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Lĩnh Vực</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        
                    </tbody>
                </table>
                <h4 class="header-title">Danh Sách Lượt Chơi</h4>
                <!-- table luot choi -->
                <table id="luot-choi-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Người Chơi</th>
                            <th>Số Câu</th>
                            <th>Điểm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        
                    </tbody>
                </table>
                <h4 class="header-title">Danh Sách Người Chơi</h4>
                <!-- table nguoi choi -->
                <table id="nguoi-choi-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Hình đại diện</th>
                            <th>Điểm cao nhất</th>
                            <th>Credit</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        
                    </tbody>
                </table>


            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection

@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection

@section('js')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#goi-credit-table").DataTable({
            language:{
                paginate:{
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback:function(){
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
    });
</script>
@endsection