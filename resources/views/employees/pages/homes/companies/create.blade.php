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
                            <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Companies</a></li>
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
                    <!-- bottom column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $menu }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form
                                action="{{ route("companies.store") }}"
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Name" required
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="url">Url</label>
                                                <input type="text"
                                                    class="form-control @error('url') is-invalid @enderror"
                                                    id="url" name="url" placeholder="Url"
                                                    value="{{ old('url') }}">
                                                @error('url')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input id="x" type="hidden" name="description">
                                        <trix-editor input="x"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">Status</label>
                                        <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active" required>
                                            <option value="">Choose a status</option>
                                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Photo (250x250)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="photo" name="photo" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="photo">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('photo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo_description">Photo Description (250x250)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="photo_description" name="photo_description" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="photo_description">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('photo_description')
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
                                    <a href={{ route("companies.index") }} class="btn btn-danger">Back</a>
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
        document.querySelector('#photo').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || 'Choose File';
            const label = e.target.nextElementSibling;
            label.textContent = fileName;
        });

        document.querySelector('#photo_description').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || 'Choose File';
            const label = e.target.nextElementSibling;
            label.textContent = fileName;
        });
        
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endpush