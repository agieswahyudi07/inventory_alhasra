@extends('layout/menu')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Item</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                    @foreach ($data['title'] as $title)
                        <li class="breadcrumb-item active">{{ $title->room_name }}</li>
                    @endforeach
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <!-- Total Item Card -->
                        <div class="col-xxl-4 col-md-6 ">
                            <div class="card info-card revenue-card border border-success">

                                <div class="card-body">
                                    <h5 class="card-title">Item <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-chair"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data['total_item'] }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Item</span> <span
                                                class="text-muted small pt-2 ps-1"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Total Item Card -->
                        <!-- Total Price -->
                        <div class="col-xxl-4 col-md-6 ">
                            <div class="card info-card revenue-card border border-success">

                                <div class="card-body">
                                    <h5 class="card-title">Price <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-chair"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data['total_price'] }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Rupiah</span> <span
                                                class="text-muted small pt-2 ps-1"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Total Price -->
                        <!-- Furniture Card -->
                        <div class="col-xxl-4 col-md-6 ">
                            <div class="card info-card revenue-card border border-success">

                                <div class="card-body">
                                    <h5 class="card-title">Item <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-chair"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>-</h6>
                                            <span class="text-success small pt-1 fw-bold">FURNITURE</span> <span
                                                class="text-muted small pt-2 ps-1"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Furniture Card -->
                    </div>


                    <div class="card">
                        <div class="card-body">
                            @foreach ($data['title'] as $title)
                                <h5 class="card-title">{{ $title->room_name }}</h5>
                            @endforeach
                            @include('message/errors')
                            <p></p>
                            <p></p>

                            @foreach ($data['items'] as $item)
                                <a href="{{ route('item.room.export', ['room_id' => $item->room_id]) }}">
                            @endforeach
                            <button type="button" class="btn btn-success mb-3">
                                <i class="ri ri-file-excel-2-line"></i> Excel Export
                            </button>
                            </a>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
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
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['items'] as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_brand }}</td>
                                            <td>{{ $item->item_type }}</td>
                                            <td>{{ 'Rp ' . number_format($item->item_price, 0, ',', '.') }}</td>
                                            <td>{{ $item->institution_name }}</td>
                                            <td>{{ $item->room_name }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->purchase_date }}</td>
                                            {{-- <td>
                    <a href="{{ route('item.edit',$item->item_id) }}">
                      <button type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></button>
                    </a>
                  <form style="display: inline" method="POST" action="{{ route('item.destroy',$item->item_id) }}">
                      @csrf
                      @method('delete')
                      <button type="button" class="btn btn-xs btn-danger mb-3 btn-flat show-alert-delete-box">
                        <i class="bi bi-trash"></i>
                    </button>
                    </form>
                  </td> --}}
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
