@extends('admin/menu')
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
                    <form class="row g-3" method="POST" action="{{ route('admin.item.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="txtItemName" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemName" name="txtItemName"
                                    value="{{ Session::get('txtItemName') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemBrand" class="col-sm-2 col-form-label">Item Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemBrand" name="txtItemBrand"
                                    value="{{ Session::get('txtItemBrand') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemType" class="col-sm-2 col-form-label">Item Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemType" name="txtItemType"
                                    value="{{ Session::get('txtItemType') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemPrice" class="col-sm-2 col-form-label">Item Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemPrice" name="txtItemPrice"
                                    value="{{ Session::get('txtItemPrice') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Institution</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="selInstitution"
                                    name="selInstitution">
                                    @if (session()->has('txtInstitution'))
                                        <option value="{{ Session::get('selInstitution') }}">
                                            {{ Session::get('txtInstitution') }}</option>
                                    @else
                                        <option value="" selected disabled>Select Institution</option>
                                    @endif
                                    @foreach ($data['institutions'] as $institution)
                                        <option value="{{ $institution->institution_id }}">
                                            {{ $institution->institution_code . '-' . $institution->institution_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Room</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="selRoom"
                                    name="selRoom" disabled>
                                    @if (session()->has('txtRoom'))
                                        <option value="{{ Session::get('selRoom') }}">
                                            {{ Session::get('txtRoom') }}
                                        </option>
                                    @else
                                        <option value="" selected disabled>Select Room</option>
                                    @endif
                                    <!-- Pilihan Room akan diisi melalui JavaScript -->
                                </select>
                            </div>
                        </div>


                        {{-- <div class="col-12">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Institution</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="selInstitution" name="selInstitution">
                            @if (session()->has('txtInstitution'))
                              <option value="{{ Session::get('selInstitution') }}">{{ Session::get('txtInstitution') }}</option>
                                @foreach ($data[0] as $institution)
                                <option value="{{ $institution->institution_id }}">{{ $institution->institution_name }}</option>
                                @endforeach
                            @else
                              <option selected>Open this select menu</option>
                                @foreach ($data[0] as $institution)
                                <option value="{{ $institution->institution_id }}">{{ $institution->institution_name }}</option>
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
                            @if (session()->has('txtRoom'))
                              <option value="{{ Session::get('selRoom') }}">{{ Session::get('txtRoom') }}</option>
                                @foreach ($data[1] as $room)
                                <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                                @endforeach
                            @else
                              <option selected>Open this select menu</option>
                                @foreach ($data[1] as $room)
                                <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                                @endforeach
                            @endif                          
                            </select>
                        </div>
                        </div>
                    </div> --}}

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="selCategory"
                                    name="selCategory">
                                    @if (session()->has('txtCategory'))
                                        <option value="{{ Session::get('selCategory') }}">
                                            {{ Session::get('txtCategory') }}</option>
                                        @foreach ($data['category'] as $category)
                                            <option value="{{ $category->category_id }}">
                                                {{ $category->category_code . '-' . $category->category_name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option selected>Open this select menu</option>
                                        @foreach ($data['category'] as $category)
                                            <option value="{{ $category->category_id }}">
                                                {{ $category->category_code . '-' . $category->category_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtSerialNumber" class="col-sm-2 col-form-label">Serial Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSerialNumber" name="txtSerialNumber"
                                    value="{{ Session::get('txtSerialNumber') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtPurchaseDate" class="col-sm-2 col-form-label">Purchase Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="txtPurchaseDate" name="txtPurchaseDate"
                                    value="{{ Session::get('txtPurchaseDate') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtNotes" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea" id="txtNotes" name="txtNotes">{{ Session::get('txtNotes') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="center">
                                <label for="txtItemQty" class="col-sm-2 col-form-label">Quantity</label>
                                <p>
                                </p>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number" data-type="minus"
                                            data-field="txtItemQty">
                                            <span class="glyphicon glyphicon-minus"><i class="bi bi-dash"></i></span>
                                        </button>
                                    </span>
                                    <input style="text-align: center" type="text" name="txtItemQty"
                                        class="form-control input-number"
                                        value="{{ Session()->has('txtItemQty') ? Session::get('txtItemQty') : 1 }}"
                                        min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" data-type="plus"
                                            data-field="txtItemQty">
                                            <span class="glyphicon glyphicon-plus"><i class="bi bi-plus"></i></span>
                                        </button>
                                    </span>
                                </div>
                                <p></p>
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
            // Fungsi untuk mengisi pilihan Room berdasarkan Institution yang dipilih
            function populateRooms(institutionId) {
                $.ajax({
                    url: '/admin/api/rooms/' +
                        institutionId, // Ganti URL dengan endpoint yang sesuai untuk mendapatkan data Room berdasarkan Institution
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        var rooms = response.data;
                        var selRoom = $("#selRoom");

                        // Kosongkan pilihan Room sebelum mengisinya kembali
                        selRoom.empty();

                        // Tambahkan pilihan Room berdasarkan data yang sesuai dengan Institution

                        for (var i = 0; i < rooms.length; i++) {
                            var optionText = rooms[i].room_code + " - " + rooms[i].room_name;
                            selRoom.append(new Option(optionText, rooms[i].room_id));
                        }
                        // for (var i = 0; i < rooms.length; i++) {
                        //     selRoom.append(new Option(rooms[i].room_name, rooms[i].room_id));
                        // }

                        // Aktifkan pilihan Room setelah berhasil diisi
                        selRoom.prop("disabled", false);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }

            // Panggil fungsi populateRooms saat pilihan Institution berubah
            $("#selInstitution").on("change", function() {
                var selectedInstitutionId = $(this).val();
                populateRooms(selectedInstitutionId);
            });

            // Inisialisasi pilihan Room berdasarkan pilihan Institution yang dipilih pertama kali
            var initialInstitutionId = $("#selInstitution").val();
            populateRooms(initialInstitutionId);

            // Fungsi untuk membuat input uppercase ketika diketikkan
            $('input[type="text"]').on('input', function() {
                $(this).val(function(_, val) {
                    return val.toUpperCase();
                });
            });

            // Fungsi untuk format angka menjadi format uang
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function updatePriceInput(input) {
                let value = input.value.replace(/[^\d.]/g, '');
                value = value.replace(/(\..*)\./g, '$1');

                let number = parseFloat(value);

                if (!isNaN(number)) {
                    let formattedNumber = formatNumber(number);
                    input.value = formattedNumber;
                } else {
                    input.value = '';
                }
            }

            // Panggil fungsi updatePriceInput saat input harga diisi
            $('#txtItemPrice').on('input', function() {
                updatePriceInput(this);
            });

            // fitur quantity

            $('.btn-number').click(function(e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });
            $('.input-number').focusin(function() {
                $(this).data('oldValue', $(this).val());
            });
            $('.input-number').change(function() {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function(e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });

        });
    </script>

@endsection
