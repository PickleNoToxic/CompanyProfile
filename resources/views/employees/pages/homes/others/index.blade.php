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
                                <h3 class="card-title">Images</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        @if ($data->order)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="order_label">Orders Thumbnail</label>
                                                    <img src="{{ asset('storage/' . $data->order) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                    <a href="/secretgate/remove-others" class="mt-3 btn btn-danger self-center">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->statistik_photo)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="stats_label">Statistik Background</label>
                                                    <img src="{{ asset('storage/' . $data->statistik_photo) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->testimonial_photo)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="testimonial_label">Testimonial Background</label>
                                                    <img src="{{ asset('storage/' . $data->testimonial_photo) }}"
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
                                <h3 class="card-title">Update Others Section</h3>
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
                                        <label for="statistik_title">Statistik Title</label>
                                        <input type="text"
                                            class="form-control @error('statistik_title') is-invalid @enderror"
                                            id="statistik_title" name="statistik_title" placeholder="Statistik Title"
                                            value="{{ old('statistik_title', $data->statistik_title) }}">
                                        @error('statistik_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="benefit_title">Benefit Title</label>
                                        <input type="text"
                                            class="form-control @error('benefit_title') is-invalid @enderror"
                                            id="benefit_title" name="benefit_title" placeholder="Benefit Title"
                                            value="{{ old('benefit_title', $data->benefit_title) }}">
                                        @error('benefit_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="program_title">Program Title</label>
                                                <input type="text"
                                                    class="form-control @error('program_title') is-invalid @enderror"
                                                    id="program_title" name="program_title" placeholder="Program Title"
                                                    value="{{ old('program_title', $data->program_title) }}">
                                                @error('program_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="testimonial_title">Testimonial Title</label>
                                                <input type="text"
                                                    class="form-control @error('testimonial_title') is-invalid @enderror"
                                                    id="testimonial_title" name="testimonial_title" placeholder="Testimonial Title"
                                                    value="{{ old('testimonial_title', $data->testimonial_title) }}">
                                                @error('testimonial_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gallery_title">Gallery Title</label>
                                                <input type="text"
                                                    class="form-control @error('gallery_title') is-invalid @enderror"
                                                    id="gallery_title" name="gallery_title" placeholder="Gallery Title"
                                                    value="{{ old('gallery_title', $data->gallery_title) }}">
                                                @error('gallery_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="statistik_label">Statistik Background (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="statistik_photo" name="statistik_photo" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="statistik_photo">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('statistik_photo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="testimonial_label">Testimonial Background (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="testimonial_photo" name="testimonial_photo" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="testimonial_photo">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('testimonial_photo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="order_label">Orders Thumbnail (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="order" name="order" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="order">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('order')
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

        document.querySelector('#statistik_photo').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="statistik_photo"]').textContent = fileName;
        });

        document.querySelector('#testimonial_photo').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="testimonial_photo"]').textContent = fileName;
        });

        document.querySelector('#order').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="order"]').textContent = fileName;
        });

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush