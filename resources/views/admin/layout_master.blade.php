<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="shortcut icon" href="{{ asset("plugin/frontend/img/logo.png") }}" type="image/x-icon">
        <link href="{{asset("plugin/admin/css/styles.css")}}" rel="stylesheet" />
        <link href="{{asset("plugin/admin/css/main.css")}}" rel="stylesheet" />
        <link href="{{asset("plugin/admin/css/AdminLTE.min.css")}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset("plugin/dropzone/dropzone.css")}}">
        <link rel="stylesheet" href="{{asset("plugin/dropzone/basic.css")}}">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        @include('admin.include.header')
        <div id="layoutSidenav">
            @include('admin.include.sidebar')
            <div id="layoutSidenav_content">
                @if (count($errors) > 0)
                    <div class="box-body">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Lỗi</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                @endif

                <!-- Flash message -->
                @if( \Illuminate\Support\Facades\Session::has('success_message'))
                    <div class="box-body">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thành công</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                @endif

                @if( \Illuminate\Support\Facades\Session::has('error_message'))
                    <div class="box-body">
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Lỗi</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                @endif
                {{--<!-- end flash message -->--}}
                <main>
                    <div class="container-fluid">
                        @yield('main-header')
                        @yield('main-content')
                    </div>
                </main>
                @include('admin.include.footer')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset("plugin/admin/js/scripts.js")}}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
        {{-- <script src="{{asset("plugin/admin/assets/demo/chart-area-demo.js")}}"></script> --}}
        {{-- <script src="{{asset("plugin/admin/assets/demo/chart-bar-demo.js")}}"></script> --}}
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset("plugin/admin/assets/demo/datatables-demo.js")}}"></script>
        <script src="{{asset("plugin/dropzone/dropzone.js")}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js" integrity="sha512-VpQwrlvKqJHKtIvpL8Zv6819FkTJyE1DoVNH0L2RLn8hUPjRjkS/bCYurZs0DX9Ybwu9oHRHdBZR9fESaq8Z8A==" crossorigin="anonymous"></script>
        @yield('main-script')
    </body>
</html>
