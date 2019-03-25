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
                @if(!isset($datasource->datasource_id))
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/createtemplate/datasourceselected">
                            @csrf 
                            @method('POST')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pilih Datasource</h4>
                                    <h6 class="card-subtitle"> Pilih datasource yang digunakan untuk template</h6>
                                    <select name="datasource_id" class="select2" style="width: 100%">
                                        <option value="">- Pilih Datasource -</option>
                                        @foreach($datasourceAll as $data)
                                            <option @if(isset($datasource->datasource_id) && $datasource->datasource_id == $data->datasource_id) selected @endif value="{{$data->datasource_id}}">{{$data->name}} ({{$data->table_name}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Pilih Datasource Ini</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                @if(isset($datasource->datasource_id))
                <div class="row">
                    <div class="col-8">
                        <form action="/createtemplate/submit" method="post">
                            @csrf 
                            @method('POST')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Template</h4>
                                    <h6 class="card-subtitle"> Buat konten template</h6>
                                        <input type="hidden" name="datasource_id" value="{{$datasource->datasource_id}}">
                                        <input name="nama" placeholder="Masukan Nama Template" type="text" class="form-control form-control-line" style="margin-bottom: 2d%;">

                                        <textarea id="mymce" name="konten"></textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Simpan Template Ini</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$datasource->name}} ({{$datasource->table_name}}) </h4>
                                <div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th>Field Name</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datasourceDetail as $data)
                                                <tr>
                                                    <td>[[{{$data->field_name}}]]</td>
                                                    <td>{{$data->option}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>

    <script>
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
        // });
        
        $(".select2").select2();
    </script>

</body>

</html>
