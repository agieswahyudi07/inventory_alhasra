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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            ITEM DETAILS
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center">{{ $data['item']->item_code }}</h5>

                                <p class="card-text text-left">
                                    <strong>Item Name:</strong> {{ $data['item']->item_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Brand:</strong> {{ $data['item']->item_brand }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Type:</strong> {{ $data['item']->item_type }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Price:</strong> {{ 'Rp ' . number_format($data['item']->item_price, 0, ',', '.') }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Quantity:</strong> {{ $data['item']->item_qty }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Purchase Date:</strong> {{ $data['item']->purchase_date }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Category:</strong> {{ $data['item']->category->category_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Institution ID:</strong>
                                    {{ $data['item']->institution->institution_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Room:</strong> {{ $data['item']->room->room_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Serial Number:</strong> {{ $data['item']->serial_number }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Notes:</strong> {{ $data['item']->notes }}
                                </p>
                                <a href="{{ route('admin.item') }}" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">

                        </div>

                        <div class="card-footer text-muted">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
