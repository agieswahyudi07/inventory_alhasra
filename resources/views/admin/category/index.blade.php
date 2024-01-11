@extends('admin/menu')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $data['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data['title'] }}</h5>
                            @include('message/errors')
                            <p></p>
                            <a href="{{ route('admin.category.create') }}">
                                <button type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add
                                    Category</button>
                            </a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Code</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['categories'] as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_code }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->category_id) }}">
                                                    <button type="button" class="btn btn-primary mb-3"><i
                                                            class="bi bi-pencil-square"></i> Edit</button></a>
                                                <form style="display: inline" method="POST"
                                                    action="{{ route('admin.category.destroy', $category->category_id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-xs btn-danger mb-3 btn-flat show-alert-delete-box">
                                                        <i class="bi bi-trash"> Delete</i>
                                                    </button>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script>
        $(document).ready(function() {
            $('.show-alert-delete-box').on('click', function() {
                var form = $(this).closest("form");

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this item!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
