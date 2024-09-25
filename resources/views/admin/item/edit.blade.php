@extends('admin/menu')
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
                    <form class="row g-3" method="POST" action="{{ route('admin.item.update', $data[0]->item_id) }}"
                        id="formItemEdit">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="txtItemName" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemName" name="txtItemName"
                                    value="{{ session()->has('txtItemName') ? Session::get('txtItemName') : $data[0]->item_name }}">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemBrand" class="col-sm-2 col-form-label">Item Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemBrand" name="txtItemBrand"
                                    value="{{ session()->has('txtItemBrand') ? Session::get('txtItemBrand') : $data[0]->item_brand }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemType" class="col-sm-2 col-form-label">Item Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtItemType" name="txtItemType"
                                    value="{{ session()->has('txtItemType') ? Session::get('txtItemType') : $data[0]->item_type }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtItemPrice" class="col-sm-2 col-form-label">Item Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="txtItemPrice" name="txtItemPrice"
                                    value="{{ session()->has('txtItemPrice') ? Session::get('txtItemPrice') : $data[0]->item_price }}">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtSerialNumber" class="col-sm-2 col-form-label">Serial Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtSerialNumber" name="txtSerialNumber"
                                    value="{{ session()->has('txtSerialNumber') ? Session::get('txtSerialNumber') : $data[0]->serial_number }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="txtNotes" class="col-sm-2 col-form-label">Notes</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" aria-label="With textarea" id="txtNotes" name="txtNotes">{{ session()->has('txtNotes') ? Session::get('txtNotes') : $data[0]->notes }}</textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submitItemEdit"
                                name="submitItemEdit">Save</button>
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

            $('#formItemEdit').validate({
                rules: {
                    txtItemName: {
                        required: true,
                    },
                    txtItemPrice: {
                        required: true,
                    },

                },
                messages: {
                    txtItemName: {
                        required: "Please enter item name.",
                    },
                    txtItemPrice: {
                        required: "Please enter item price.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    element.next('.invalid-feedback').html(error.html());
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                },
                submitHandler: function(form) {
                    $('#submitItemEdit').prop('disabled', true).val('Processing...');
                    form.submit();
                }
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
            $('#txtNeedPrice').on('input', function() {
                updatePriceInput(this);
            });

            // Panggil fungsi updatePriceInput saat input harga diisi
            $('#txtNeedQty').on('input', function() {
                updatePriceInput(this);
            });


        });
    </script>
@endsection
