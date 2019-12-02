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
                                    <li class="breadcrumb-item active">Cấu Hình Trợ Giúp</li>
                                </ol>
                            </div>
                            <h3 class="page-title">Cấu Hình Trợ Giúp</h3>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Danh Sách Trợ Giúp</h4>
                <a href="{{ route('cau-hinh-tro-giup.them-moi') }}" class="btn btn-primary waves-effect waves-light">Thêm mới</a><br/><br/>
                    <table id="cau-hinh-tro-giup-table" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Loại Trợ Giúp</th>
                                <th>Thứ tự</th>
                                <th>Credit</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>   
                        <tbody>
                            @foreach($listTroGiup as $troGiup)
                            <tr>
                                <td>{{ $troGiup->id }}</td>
                                <td>{{ $troGiup->loai_tro_giup }}</td>
                                <td>{{ $troGiup->thu_tu }}</td>
                                <td>{{ $troGiup->credit }}</td>
                                <td><a href="{{ route('cau-hinh-tro-giup.cap-nhat', ['id' => $troGiup->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-grease-pencil"></i></a></td>
                                <td><a href="{{ route('cau-hinh-tro-giup.xoa', ['id' => $troGiup->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a></td>
                            </tr>
                            @endforeach
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
        $("#cau-hinh-tro-giup-table").DataTable({
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