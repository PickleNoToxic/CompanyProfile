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
                                <h3 class="card-title">Images</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        @if ($data->hero_background)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="hero_background_label">Hero Background</label>
                                                    <img src="{{ asset('storage/' . $data->hero_background) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                    <a href="/secretgate/remove-others" class="mt-3 btn btn-danger self-center">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->company_icon)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="stats_label">Company Icon</label>
                                                    <img src="{{ asset('storage/' . $data->company_icon) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->testimonial_background)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="testimonial_label">Testimonial Background</label>
                                                    <img src="{{ asset('storage/' . $data->testimonial_background) }}"
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
                                        <label for="header_title">Header Title</label>
                                        <input type="text"
                                            class="form-control @error('header_title') is-invalid @enderror"
                                            id="header_title" name="header_title" placeholder="Header Title"
                                            value="{{ old('header_title', $data->title) }}">
                                        @error('header_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input id="description_input" type="hidden" name="description" value="{{ old('description', $data->description) }}">
                                        <trix-editor input="description_input"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="motto">Motto</label>
                                        <input type="text"
                                            class="form-control @error('motto') is-invalid @enderror"
                                            id="motto" name="motto" placeholder="Motto"
                                            value="{{ old('motto', $data->motto) }}">
                                        @error('motto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companies_title">Companies Title</label>
                                                <input type="text"
                                                    class="form-control @error('companies_title') is-invalid @enderror"
                                                    id="companies_title" name="companies_title" placeholder="Companies Title"
                                                    value="{{ old('companies_title', $data->companies_title) }}">
                                                @error('companies_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="directors_title">Directors Title</label>
                                                <input type="text"
                                                    class="form-control @error('directors_title') is-invalid @enderror"
                                                    id="directors_title" name="directors_title" placeholder="Directors Title"
                                                    value="{{ old('directors_title', $data->directors_title) }}">
                                                @error('directors_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="testimonials_title">Testimonials Title</label>
                                                <input type="text"
                                                    class="form-control @error('testimonials_title') is-invalid @enderror"
                                                    id="testimonials_title" name="testimonials_title" placeholder="Testimonials Title"
                                                    value="{{ old('testimonials_title', $data->testimonials_title) }}">
                                                @error('testimonials_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_us_title">Contact Us Title</label>
                                                <input type="text"
                                                    class="form-control @error('contact_us_title') is-invalid @enderror"
                                                    id="contact_us_title" name="contact_us_title" placeholder="Contact Us Title"
                                                    value="{{ old('contact_us_title', $data->contact_us_title) }}">
                                                @error('contact_us_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonials_description">Testimonials Description</label>
                                        <input id="testimonial_description_input" type="hidden" name="testimonials_description" value="{{ old('testimonials_description', $data->testimonials_description) }}">
                                        <trix-editor input="testimonial_description_input"></trix-editor>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="statistik_label">Company Icon (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="company_icon" name="company_icon" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="company_icon">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('company_icon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hero_background_label">Hero Background (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="hero_background" name="hero_background" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="hero_background">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('hero_background')
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
                                                        <input type="file" class="custom-file-input" id="testimonial_background" name="testimonial_background" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="testimonial_background">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('testimonial_background')
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

        document.querySelector('#company_icon').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="company_icon"]').textContent = fileName;
        });

        document.querySelector('#testimonial_background').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="testimonial_background"]').textContent = fileName;
        });

        document.querySelector('#hero_background').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="hero_background"]').textContent = fileName;
        });

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush