@extends('employees.layouts.main')

@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush

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
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Dashboard</a></li>
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
                    <!-- top column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Value Thumbnail</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        @if ($data->value_photo1)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="value_photo1">Image 1</label>
                                                    <img src="{{ asset('storage/' . $data->value_photo1) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->value_photo2)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="value_photo2">Image 2</label>
                                                    <img src="{{ asset('storage/' . $data->value_photo2) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->value_photo3)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="value_photo3">Image 3</label>
                                                    <img src="{{ asset('storage/' . $data->value_photo3) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (top) -->

                    <!-- bottom column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Update Value Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form
                                action="{{ route("master.update", $data) }}"
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="value_title">Value Title</label>
                                        <input type="text"
                                            class="form-control @error('value_title') is-invalid @enderror"
                                            id="value_title" name="value_title" placeholder="Value Title"
                                            value="{{ old('value_title', $data->value_title) }}">
                                        @error('value_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="value_description">Value Description</label>
                                        <input id="x" type="hidden" name="value_description" value="{{ old('value_description', $data->value_description) }}">
                                        <trix-editor input="x"></trix-editor>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="value_photo1_label">Value Thumbnail 1 (600x600)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="value_photo1" name="value_photo1" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="value_photo1">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('value_photo1')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="value_photo2_label">Value Thumbnail 2 (600x600)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="value_photo2" name="value_photo2" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="value_photo2">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('value_photo2')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="value_photo3_label">Value Thumbnail 3 (600x600)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="value_photo3" name="value_photo3" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="value_photo3">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('value_photo3')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (bottom) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('addon-script')
    <script src="/secretgate/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        document.querySelector('#value_photo1').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="value_photo1"]').textContent = fileName;
        });

        document.querySelector('#value_photo2').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="value_photo2"]').textContent = fileName;
        });

        document.querySelector('#value_photo3').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="value_photo3"]').textContent = fileName;
        });

        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endpush