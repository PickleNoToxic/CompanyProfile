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
                                        @if ($data->testimonials_background)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="testimonials_label">Testimonials Background</label>
                                                    <img src="{{ asset('storage/' . $data->testimonials_background) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->vision_mission_background)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="vision_mission_label">Vision Mission Background</label>
                                                    <img src="{{ asset('storage/' . $data->vision_mission_background) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->mission_photo)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mission_label">Mission Photo</label>
                                                    <img src="{{ asset('storage/' . $data->mission_photo) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->projects_icon)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mission_label">Projects Icon</label>
                                                    <img src="{{ asset('storage/' . $data->projects_icon) }}"
                                                        class="img-fluid mb-3 col-sm-5 d-block">
                                                </div>
                                            </div>
                                        @endif
                                        @if ($data->satisfied_customers_icon)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mission_label">Satisfied Customers Icon</label>
                                                    <img src="{{ asset('storage/' . $data->satisfied_customers_icon) }}"
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
                                        <input id="header_title_input" type="hidden" name="header_title" value="{{ old('header_title', $data->title) }}">
                                        <trix-editor input="header_title_input"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input id="description_input" type="hidden" name="description" value="{{ old('description', $data->description) }}">
                                        <trix-editor input="description_input"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="vision_mission_title">Vision Mission Title</label>
                                        <input type="text"
                                            class="form-control @error('vision_mission_title') is-invalid @enderror"
                                            id="vision_mission_title" name="vision_mission_title" placeholder="vision_mission_title"
                                            value="{{ old('vision_mission_title', $data->vision_mission_title) }}">
                                        @error('vision_mission_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mission_title">Mission Title</label>
                                                <input type="text"
                                                    class="form-control @error('mission_title') is-invalid @enderror"
                                                    id="mission_title" name="mission_title" placeholder="mission_title"
                                                    value="{{ old('mission_title', $data->mission_title) }}">
                                                @error('mission_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="value_title">Value Title</label>
                                                <input type="text"
                                                    class="form-control @error('value_title') is-invalid @enderror"
                                                    id="value_title" name="value_title" placeholder="Contact Us Title"
                                                    value="{{ old('value_title', $data->value_title) }}">
                                                @error('value_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mission_description">Mission Description</label>
                                        <input id="mission_description_input" type="hidden" name="mission_description" value="{{ old('mission_description', $data->mission_description) }}">
                                        <trix-editor input="mission_description_input"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="works_title">Works Title</label>
                                        <input type="text"
                                            class="form-control @error('works_title') is-invalid @enderror"
                                            id="works_title" name="works_title" placeholder="Works Title"
                                            value="{{ old('works_title', $data->works_title) }}">
                                        @error('works_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="works_description">Work Description</label>
                                        <input id="works_description_input" type="hidden" name="works_description" value="{{ old('works_description', $data->works_description) }}">
                                        <trix-editor input="works_description_input"></trix-editor>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_projects">Number of Projects</label>
                                                <input type="number" min="0"
                                                    class="form-control @error('number_of_projects') is-invalid @enderror"
                                                    id="number_of_projects" name="number_of_projects" placeholder="Number of Projects" type="number"
                                                    value="{{ old('number_of_projects', $data->number_of_projects) }}">
                                                @error('number_of_projects')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_satisfied_customers">Number of Satisfied Customers</label>
                                                <input type="number" min="0"
                                                    class="form-control @error('number_of_satisfied_customers') is-invalid @enderror"
                                                    id="number_of_satisfied_customers" name="number_of_satisfied_customers" placeholder="Number of Satisfied Customers"
                                                    value="{{ old('number_of_satisfied_customers', $data->number_of_satisfied_customers) }}">
                                                @error('number_of_satisfied_customers')
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
                                                <label for="projects_icon_label">Projects Icon (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="projects_icon" name="projects_icon" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="projects_icon">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('projects_icon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="satisfied_customers_icon_label">Satisfied Customers Icon (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="satisfied_customers_icon" name="satisfied_customers_icon" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="satisfied_customers_icon">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('satisfied_customers_icon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                    </div>
                                    <div class="form-group">
                                        <label for="mission_photo_label">Mission Photo (2460x952)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="mission_photo" name="mission_photo" accept='.png,.jpg,.jpeg'>
                                                <label class="custom-file-label" for="mission_photo">Choose File</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('mission_photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vision_mission_background_label">Vision Mission Background (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="vision_mission_background" name="vision_mission_background" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="vision_mission_background">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('vision_mission_background')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="testimonial_label">Testimonial Background (2460x952)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="testimonials_background" name="testimonials_background" accept='.png,.jpg,.jpeg'>
                                                        <label class="custom-file-label" for="testimonials_background">Choose File</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                @error('testimonials_background')
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
        document.querySelector('#mission_photo').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="mission_photo"]').textContent = fileName;
        });

        document.querySelector('#company_icon').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="company_icon"]').textContent = fileName;
        });

        document.querySelector('#testimonials_background').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="testimonials_background"]').textContent = fileName;
        });

        document.querySelector('#hero_background').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="hero_background"]').textContent = fileName;
        });

        document.querySelector('#vision_mission_background').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="vision_mission_background"]').textContent = fileName;
        });

        document.querySelector('#satisfied_customers_icon').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="satisfied_customers_icon"]').textContent = fileName;
        });

        document.querySelector('#projects_icon').addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Choose File';
            document.querySelector('label[for="projects_icon"]').textContent = fileName;
        });

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush