@extends('employees.layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $menu }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/secretgate/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $menu }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Datas</h3>
                                <a href="{{ route("benefits.create") }}" class="btn btn-success float-right">Add New</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Title</th>
                                            <th>Benefit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->created_at->format('d-M-Y H:i') }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{!! $data->description !!}</td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <a href="{{ route("benefits.show", $data) }}" class="btn btn-primary mx-1" id="detail"> Detail</a>
                                                        <a href="{{ route('benefits.destroy', $data) }}" class="btn btn-danger mx-1" data-confirm-delete="true">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Time</th>
                                            <th>Title</th>
                                            <th>Benefit</th>
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
@endsection
