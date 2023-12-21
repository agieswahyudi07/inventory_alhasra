@extends('layout/menu')
@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
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
            <p></p>
            <a href="{{ route('kantor_yayasan.create') }}">
              <button type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i></button>
            </a>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Item ID</th>
                  <th scope="col">Item Name</th>
                  {{-- <th scope="col">Item Code</th> --}}
                  <th scope="col">Item Price</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Room</th>
                  <th scope="col">Category</th>
                  <th scope="col">Purchase Date</th>
                  <th scope="col">Notes</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)

                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <th scope="row">{{ $item->item_id < 10 ? "0".$item->item_id : $item->item_id }}</th>
                  <td>{{ $item->item_name }}</td>
                  {{-- <td></td>   --}}
                  <td>{{ $item->item_price }}</td>
                  <td>{{ $item->institution_name }}</td>
                  <td>{{ $item->room_name }}</td>
                  <td>{{ $item->category_name }}</td>
                  <td>{{ $item->purchase_date }}</td>
                  <td>{{ $item->notes }}</td>
                  <td>
                    <a href="{{ route('kantor_yayasan.edit',$item->item_id) }}">
                      <button type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></button>
                    </a>
                  <form style="display: inline" method="POST" action="{{ route('kantor_yayasan.destroy',$item->item_id) }}">
                      @csrf
                      @method('delete')
                            <button type="submit" class="btn btn-danger mb-3">
                              <i class="bi bi-trash"></i>
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

@endsection