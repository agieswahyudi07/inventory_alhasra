@extends('layout/menu')
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
                            <a href="{{ route('item.create') }}">
                                <button type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add
                                    Item</button>
                            </a>

                            <a href="{{ route('item.export') }}">
                                <button type="button" class="btn btn-primary mb-3"><i
                                        class="ri ri-file-excel-2-line
                "></i> Export Excel</button>
                            </a>


                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Item Code</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Item Brand</th>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Institution</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Purchase Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['items'] as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_brand }}</td>
                                            <td>{{ $item->item_type }}</td>
                                            <td>{{ 'Rp ' . number_format($item->item_price, 0, ',', '.') }}</td>
                                            <td>{{ $item->institution_name }}</td>
                                            <td>{{ $item->room_name }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->purchase_date }}</td>
                                            <td>
                                                <a href="{{ route('item.edit', $item->item_id) }}">
                                                    <button type="button" class="btn btn-primary mb-3"><i
                                                            class="bi bi-pencil-square"></i> Edit</button>
                                                </a>

                                                <form style="display: inline" method="POST"
                                                    action="{{ route('item.destroy', $item->item_id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        class="btn btn-xs btn-danger mb-3 btn-flat show-alert-delete-box">
                                                        <i class="bi bi-trash"></i> Delete
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
