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
                        <h3 class="text-themecolor m-b-0 m-t-0">Generate</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Generate</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                {{-- SELECT2 TEMPLATE --}}
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/menugenerate/templateselected">
                            @csrf 
                            @method('POST')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pilih Template</h4>
                                    <h6 class="card-subtitle"> Pilih template yang akan digenerate</h6>
                                    <select name="template_id" class="select2" style="width: 100%">
                                        <option value="">- Pilih Template -</option>
                                        @foreach($templateAll as $data)
                                            <option @if(isset($template->template_id) && $template->template_id == $data->template_id) selected @endif value="{{$data->template_id}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Pilih Template Ini</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- KONTEN --}}
                @if(isset($template->template_id))
                <form action="/template/submit" method="POST">
                    @csrf 
                    @method('POST')
    
                        {{-- TABEL --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="margin-bottom: -2em">{{$template->nama}}</h4>
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
                                                    @foreach($selectedTable as $col)
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox checkbox-success">
                                                                <input class="colcheckbox filled-in" name="col[{{$loop->iteration - 1}}]" value="{{$col['0']}}" id="col{{$loop->iteration - 1}}" type="checkbox">
                                                                <label for="col{{$loop->iteration - 1}}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$col['1']}}</td>
                                                        <td>
                                                            
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
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
        // });
        
        $(".select2").select2();
    </script>

</body>

</html>
