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
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $data['title'] }}</h5>
              @include('message/errors')
              <!-- Vertical Form -->
              <form class="row g-3"  method="POST" action="{{ route('room.update', $data['room']->room_id) }}">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="txtRoomName" class="form-label">Room Name</label>
                  <input type="text" class="form-control" id="txtRoomName" name="txtRoomName" value="{{ session()->has('txtRoomName') ? Session::get('txtRoomName') : $data['room']->room_name;  }}">              

                </div>
            
                <div class="col-12" style="display: none">
                  <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Institution</label>
                      <div class="col-sm-10">
  
                          <select class="form-select" aria-label="Default select example" id="selInstitution" name="selInstitution">
                          @if (session()->has('txtInstitution'))
                            <option value="{{ Session::get('selInstitution') }}">{{ Session::get('txtInstitution') }}</option>
                            @foreach ($data['institutions'] as $institution)
                              <option value="{{ $institution->institution_id }}" {{ $data['room']->institution_id == $institution->institution_id ? 'selected' : '' }}>
                                  {{ $institution->institution_name }}
                              </option>
                            @endforeach
                          @else
                            @foreach ($data['institutions'] as $institution)
                              <option value="{{ $institution->institution_id }}" {{ $data['room']->institution_id == $institution->institution_id ? 'selected' : '' }}>
                                  {{ $institution->institution_name }}
                              </option>
                           @endforeach
  
                          @endif                          
                          </select>
                      </div>
                      </div>
                  </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->
        
            </div>
          </div>
        
    </section>
  
  </main><!-- End #main -->

  <script>
    $(document).ready(function() {
        // Fungsi untuk membuat input uppercase ketika diketikkan
        $('input[type="text"]').on('input', function() {
            $(this).val(function(_, val) {
                return val.toUpperCase();
            });
        });
    });
</script>

@endsection