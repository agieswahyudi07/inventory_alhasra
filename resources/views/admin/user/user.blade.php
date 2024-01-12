@extends('admin/menu')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data {{ $data['title'] }}</h1>
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
                            <h5 class="card-title">Datatables</h5>
                            @include('message/errors')
                            <a href="{{ route('admin.user.create') }}">
                                <button type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i>
                                    Register
                                </button>
                            </a>

                            <a href="{{ route('admin.user.export') }}">
                                <button type="button" class="btn btn-primary mb-3"><i class="ri ri-file-excel-2-line">
                                    </i> Export Excel
                                </button>
                            </a>


                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['users'] as $index => $user)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            @if ($user->id == 1)
                                                <td>

                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}">
                                                        <button type="button" class="btn btn-primary mb-3"><i
                                                                class="bi bi-pencil-square"></i> Edit</button>
                                                    </a>
                                                    <form style="display: inline" method="POST"
                                                        action="{{ route('admin.user.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button"
                                                            class="btn btn-xs btn-danger mb-3 btn-flat show-alert-delete-box">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif

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
