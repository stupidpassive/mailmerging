<!DOCTYPE html>
<html lang="en">

@include('components.head')
<link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<body class="fix-header card-no-border">

        @include('components.preloader')

    <div id="main-wrapper">

        @include('components.topbar')

        @include('components.aside')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Datasource</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Datasource</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                {{-- SELECT2 TABEL --}}
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/datasource/tableselected">
                            @csrf 
                            @method('POST')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pilih Tabel</h4>
                                    <h6 class="card-subtitle"> Pilih tabel yang akan digunakan sebagai datasource</h6>
                                    <select name="table_name" class="select2" style="width: 100%">
                                        <option value="">- Pilih Tabel -</option>
                                        @foreach($tables as $table)
                                            <option @if(isset($tableName) && $tableName == $table->Tables_in_db_kontrak) selected @endif value="{{$table->Tables_in_db_kontrak}}">{{$table->Tables_in_db_kontrak}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Pilih Tabel Ini</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($tableColumns))

                <form action="/datasource/submit" method="POST">
                @csrf 
                @method('POST')

                    {{-- NAMA DATASOURCE --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nama Datasource</h4>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input name="datasource_name" placeholder="Masukan Nama Datasource" type="text" class="form-control form-control-line"> 
                                        <input type="hidden" name="datasource_tablename" value="{{$tableName}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TABEL --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom: -2em">{{$tableName}}</h4>
                                    <div class="table-responsive m-t-40">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pilih</th>
                                                    <th>Nama Field</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tableColumns as $col)
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input class="colcheckbox filled-in" name="col[{{$loop->iteration - 1}}]" value="{{$col->Field}}" id="col{{$loop->iteration - 1}}" type="checkbox">
                                                            <label for="col{{$loop->iteration - 1}}"></label>
                                                        </div>
                                                    </td>
                                                    <td>{{$col->Field}}</td>
                                                    <td>
                                                        @if(
                                                            stripos($col->Type, 'int') !== false ||
                                                            stripos($col->Type, 'double') !== false ||
                                                            stripos($col->Type, 'float') !== false
                                                        )
                                                            <select name="format[{{$loop->iteration - 1}}]" class="select2" style="width: 100%">
                                                                <option value="0">Unformatted (xxxxxx)</option>
                                                                <option value="1">Default (xxx.xxx)</option>
                                                                <option value="2">Currency (Rp. xxx.xxx,00-)</option>
                                                                <option value="3">Currency (Rp. xxx.xxx)</option>
                                                                <option value="4">Currency + Terbilang (Rp. xxx.xxx,00-)</option>
                                                                <option value="5">Currency + Terbilang (Rp. xxx.xxx)</option>
                                                            </select>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Simpan Datasource Ini</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                @endif
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

                @include('components.sidebar')

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @include('components.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
    @include('components.mainscript')

    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        
        $(".select2").select2();
    </script>

</body>

</html>
