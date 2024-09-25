@extends('admin/menu')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add {{ $data['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['title'] }} Form</h5>
                    @include('message/errors')
                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="{{ route('admin.class.store') }}" id="formClass"
                        name="formClass">
                        @csrf
                        <div class="col-12">
                            <label for="txtClassName" class="form-label">{{ $data['title'] }} Name</label>
                            <input type="text" class="form-control" id="txtClassName" name="txtClassName"
                                value="{{ Session::get('txtClassName') }}">
                            <div class="invalid-feedback"></div>

                        </div>


                        <div class="col-12">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Institution Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="selInstitution"
                                        name="selInstitution">
                                        @if (session()->has('txtInstitution'))
                                            <option value="{{ Session::get('selInstitution') }}">
                                                {{ Session::get('txtInstitution') }}</option>
                                            @foreach ($data['institutions'] as $institution)
                                                <option value="{{ $institution->institution_id }}">
                                                    {{ $institution->institution_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($data['institutions'] as $institution)
                                                <option value="{{ $institution->institution_id }}">
                                                    {{ $institution->institution_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Floor Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="selFloor"
                                        name="selFloor">
                                        @if (session()->has('txtFloor'))
                                            <option value="{{ Session::get('selFloor') }}">{{ Session::get('txtFloor') }}
                                            </option>
                                            @foreach ($data['floor'] as $floor)
                                                <option value="{{ $floor['floor_id'] }}">{{ $floor['floor_name'] }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($data['floor'] as $floor)
                                                <option value="{{ $floor['floor_id'] }}">{{ $floor['floor_name'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submitClass"
                                name="submitClass">Submit</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>

        </section>

    </main><!-- End #main -->

    <script>
        $(document).ready(function() {
            // Fungsi untuk membuat input uppercase ketika diketikkan
            $('input[type="text"]').on('input', function() {
                $(this).val(function(_, val) {
                    return val.toUpperCase();
                });
            });


            $('#formClass').validate({
                rules: {
                    txtClassName: {
                        required: true,
                    },
                    selInstitution: {
                        required: true,
                    },
                    selFloor: {
                        required: true,
                    },
                },
                messages: {
                    txtClassName: {
                        required: "Please enter class name.",
                    },
                    selInstitution: {
                        required: "Please choose institution.",
                    },
                    selFloor: {
                        required: "Please choose floor.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    element.next('.invalid-feedback').html(error.html());
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                },
                submitHandler: function(form) {
                    $('#submitClass').prop('disabled', true).val('Processing...');
                    form.submit();
                }
            });

        });
    </script>

@endsection
