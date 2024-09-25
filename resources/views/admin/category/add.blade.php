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
                    <h5 class="card-title">Vertical Form</h5>
                    @include('message/errors')
                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="{{ route('admin.category.store') }}" id="formCategory"
                        name="formCategory">
                        @csrf
                        <div class="col-12">
                            <label for="txtCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="txtCategoryName" name="txtCategoryName"
                                value="{{ Session::get('txtCategoryName') }}">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-12">
                            <label for="txtCategoryCode" class="form-label">Category Code</label>
                            <input type="text" class="form-control" id="txtCategoryCode" name="txtCategoryCode"
                                value="{{ Session::get('txtCategoryCode') }}">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submitCategory"
                                name="submitCategory">Submit</button>
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

            $('#formCategory').validate({
                rules: {
                    txtCategoryName: {
                        required: true,
                    },
                    txtCategoryCode: {
                        required: true,
                    },
                },
                messages: {
                    txtCategoryName: {
                        required: "Please enter category name.",
                    },
                    txtCategoryCode: {
                        required: "Please enter category code.",
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
                    $('#submitCategory').prop('disabled', true).val('Processing...');
                    form.submit();
                }
            });
        });
    </script>
@endsection
