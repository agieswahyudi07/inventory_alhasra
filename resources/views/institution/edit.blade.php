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
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vertical Form</h5>
              @include('message/errors')
              <!-- Vertical Form -->
              <form class="row g-3"  method="POST" action="{{ route('kantor_yayasan.update', $data[0]->item_id) }}">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="txtItemName" class="form-label">Item Name</label>
                  <input type="text" class="form-control" id="txtItemName" name="txtItemName" value="{{ session()->has('txtItemName') ? Session::get('txtItemName') : $data[0]->item_name;  }}">

                  {{-- @if (session()->has('txtItemName'))
                     <input type="text" class="form-control" id="txtItemName" name="txtItemName" value="{{ Session::get('txtItemName') }}">
                  @else
                     <input type="text" class="form-control" id="txtItemName" name="txtItemName" value="{{ $data[0]->item_name }}">
                  @endif --}}

                </div>
                <div class="col-12">
                  <label for="txtItemPrice" class="form-label">Item Price</label>
                  <input type="number" class="form-control" id="txtItemPrice" name="txtItemPrice" value="{{ session()->has('txtItemPrice') ? Session::get('txtItemPrice') : $data[0]->item_price;  }}">
                </div>


                <div class="col-12">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Division</label>
                    <div class="col-sm-10">

                        <select class="form-select" aria-label="Default select example" id="selDivision" name="selDivision">
                        @if (session()->has('txtDivision'))
                          <option value="{{ Session::get('selDivision') }}">{{ Session::get('txtDivision') }}</option>
                          @foreach ($data[1] as $division)
                            <option value="{{ $division->division_id }}" {{ $data[0]->division_id == $division->division_id ? 'selected' : '' }}>
                                {{ $division->division_name }}
                            </option>
                          @endforeach
                        @else
                          @foreach ($data[1] as $division)
                            <option value="{{ $division->division_id }}" {{ $data[0]->division_id == $division->division_id ? 'selected' : '' }}>
                                {{ $division->division_name }}
                            </option>
                         @endforeach

                        @endif                          
                        </select>
                    </div>
                    </div>
                </div>

                <div class="col-12">
                  <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Room</label>
                      <div class="col-sm-10">
  
                          <select class="form-select" aria-label="Default select example" id="selRoom" name="selRoom">
                          @if (session()->has('txtDivision'))
                            <option value="{{ Session::get('selRoom') }}">{{ Session::get('txtRoom') }}</option>
                            @foreach ($data[2] as $room)
                              <option value="{{ $room->room_id }}" {{ $data[0]->room_id == $room->room_id ? 'selected' : '' }}>
                                  {{ $room->room_name }}
                              </option>
                            @endforeach
                          @else
                            @foreach ($data[2] as $room)
                              <option value="{{ $room->room_id }}" {{ $data[0]->room_id == $room->room_id ? 'selected' : '' }}>
                                  {{ $room->room_name }}
                              </option>
                           @endforeach
  
                          @endif                          
                          </select>
                      </div>
                      </div>
                  </div>

                  <div class="col-12">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
    
                            <select class="form-select" aria-label="Default select example" id="selItemCategory" name="selItemCategory">
                            @if (session()->has('txtDivision'))
                              <option value="{{ Session::get('selItemCategory') }}">{{ Session::get('txtItemCategory') }}</option>
                              @foreach ($data[3] as $category)
                                <option value="{{ $category->item_category_id }}" {{ $data[0]->item_category_id == $category->item_category_id ? 'selected' : '' }}>
                                    {{ $category->item_category_name }}
                                </option>
                              @endforeach
                            @else
                              @foreach ($data[3] as $category)
                                <option value="{{ $category->item_category_id }}" {{ $data[0]->item_category_id == $category->item_category_id ? 'selected' : '' }}>
                                    {{ $category->item_category_name }}
                                </option>
                             @endforeach
    
                            @endif                          
                            </select>
                        </div>
                        </div>
                    </div>

                <div class="col-12">
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Purchase Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="txtPurchaseDate" name="txtPurchaseDate" value="{{ session()->has('txtPurchaseDate') ? Session::get('txtPurchaseDate') : $data[0]->purchase_date;  }}">
                        </div>
                      </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text">Notes</span>
                        <textarea class="form-control" aria-label="With textarea" id="txtNotes" name="txtNotes">{{ session()->has('txtNotes') ? Session::get('txtNotes') : $data[0]->notes; }}</textarea>
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

@endsection