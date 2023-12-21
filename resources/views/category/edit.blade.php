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
              <form class="row g-3"  method="POST" action="{{ route('category.update', $data['category']->category_id) }}">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="txtCategoryName" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="txtCategoryName" name="txtCategoryName" value="{{ session()->has('txtCategoryName') ? Session::get('txtCategoryName') : $data['category']->category_name;  }}">              
                </div>

                <div class="col-12">
                  <label for="txtCategoryCode" class="form-label">Category Code</label>
                  <input type="text" class="form-control" id="txtCategoryCode" name="txtCategoryCode" value="{{ session()->has('txtCategoryCode') ? Session::get('txtCategoryCode') : $data['category']->category_code;  }}">              
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