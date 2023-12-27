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

        <div class="card">
          <div class="card-body">
            @foreach ($data['title'] as $title)
                
            <h5 class="card-title">{{ $title->room_name }}</h5>
            
            @endforeach
            @include('message/errors')
            <p></p>
            <p></p>

            @foreach ($data['items'] as $item)
              <a href="{{ route('item_room.export', ['room_id' => $item->room_id]) }}">
            @endforeach
                <button type="button" class="btn btn-success mb-3">Excel Export</button>
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
  $(document).ready(function () {
    $('.show-alert-delete-box').on('click', function () {
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