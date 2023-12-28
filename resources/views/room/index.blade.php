@extends('layout/menu')
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
                            <a href="{{ route('office.create') }}">
                                <button type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add
                                    Office</i></button>
                            </a>

                            <a href="{{ route('class.create') }}">
                                <button type="button" class="btn btn-warning mb-3"><i class="bi bi-plus-circle"></i> Add
                                    Class</i></button>
                            </a>

                            <a href="{{ route('facilities.create') }}">
                                <button type="button" class="btn btn-danger mb-3"><i class="bi bi-plus-circle"></i> Add
                                    Facilities</i></button>
                            </a>

                            <a href="{{ route('room.export') }}">
                                <button type="button" class="btn btn-primary mb-3">
                                    <i class="ri ri-file-excel-2-line"></i> Export Excel
                                </button>
                            </a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
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
                                                {{-- @if ($room->room_type_id === 1)
                    <a href="{{ route('office.edit', $room->room_id) }}" > <button type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></button></a>
                    @elseif ($room->room_type_id === 2)
                    <a href="{{ route('class.edit', $room->room_id) }}" > <button type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></button></a>
                    @elseif ($room->room_type_id === 3)
                    <a href="{{ route('facilities.edit', $room->room_id) }}" > <button type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></button></a>
                    @endif --}}
                                                <a href="{{ route('room.edit', $room->room_id) }}">
                                                    <a href="{{ route('room.edit', $room->room_id) }}"> <button
                                                            type="button" class="btn btn-primary mb-3"><i
                                                                class="bi bi-pencil-square"></i> Edit</button></a>
                                                </a>
                                                <form style="display: inline" method="POST"
                                                    action="{{ route('room.destroy', $room->room_id) }}">
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
