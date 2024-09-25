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
                            ROOM DETAILS
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center">{{ $data['room']->room_code }}</h5>

                                <p class="card-text text-left">
                                    <strong>Room Name :</strong> {{ $data['room']->room_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Institution ID :</strong>
                                    {{ $data['room']->institution->institution_name }}<br>
                                </p>
                                <p class="card-text text-left">
                                    <strong>Type :</strong>
                                    {{ $data['room']->type->room_type_name }}<br>
                                </p>
                                <a href="{{ route('admin.room') }}" class="btn btn-primary">Back</a>
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
