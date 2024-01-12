@extends('user/menu')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $data['title'] }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
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

                            <a href="{{ route('user.room.export') }}">
                                <button type="button" class="btn btn-primary mb-3">
                                    <i class="ri ri-file-excel-2-line"></i> Export Excel
                                </button>
                            </a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Room Name</th>
                                        <th scope="col">Room Code</th>
                                        <th scope="col">Institution</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['rooms'] as $room)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $room->room_name }}</td>
                                            <td>{{ $room->room_code }}</td>
                                            <td>{{ $room->institution_name }}</td>
                                            <td>
                                                <a href="{{ route('user.room.show', $room->room_id) }}">
                                                    <button type="button" class="btn btn-info mb-3"><i
                                                            class="bi bi-eye"></i> Show</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <div class="card">

                                <div class="card-body ">
                                    <h5 class="card-title">Room Layout</h5>
                                    <div class="bg-image hover-zoom">
                                        <img src="{{ asset('assets/img/layout_ruangan.png') }}"
                                            class="card-img-top img-fluid"alt="layout_ruangan">
                                    </div>
                                </div>

                            </div>
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
