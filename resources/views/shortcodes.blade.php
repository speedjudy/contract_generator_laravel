<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$name}}</title>
    @include('layout.head')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.nav', ['status' => $name])
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{$name}}</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="shortcode_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>ShortCodes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="shortcodes_tbody">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>ShortCodes</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <div class="modal fade" id="modal-shortcodes-add">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Add ShortCode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form class="form-horizontal shortcodes-form" action="shortcodes/add_shortcode" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="flag" value="save" />
                        <input type="hidden" name="shortcode_id" value="" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="shortcodeName" class="col-sm-2 col-form-label">ShortCodeName</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="shortcodeName" id="shortcodeName" placeholder="Shortcode name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shortcode" class="col-sm-2 col-form-label">ShortCode</label>
                                <div class="col-sm-8" style="display: flex;">
                                <input type="text" class="form-control" name="shortcode" id="shortcode" placeholder="ShortCode" required>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary create-shortcode-button">Create ShortCode</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        

        <!-- /.content-wrapper -->
        <!-- @include('layout.footer') -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script src="../assets/js/shortcodes.js?<?php echo time(); ?>"></script>
</body>

</html>