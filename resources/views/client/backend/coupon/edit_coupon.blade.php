@extends('client.client_dashboard')
@section('client')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Coupon</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Coupon</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <form id="myForm" action="{{ route('coupon.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $coupon->id }}">

                                <div class="row">

                                    <div class="col-xl-6 col-md-6-">

                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Coupon Name</label>
                                            <input class="form-control" name="coupon_name" type="text"
                                                id="example-text-input" value={{ $coupon->coupon_name }}>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-md-6-">

                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Coupon Desc</label>
                                            <input class="form-control" name="coupon_desc" type="text"
                                                id="example-text-input" value={{ $coupon->coupon_desc }}>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-md-6-">

                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Coupon Discount</label>
                                            <input class="form-control" name="discount" type="text"
                                                id="example-text-input" value={{ $coupon->discount }}>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-md-6-">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3 form-group">
                                                <label for="example-text-input" class="form-label">Coupon Validity</label>
                                                <input class="form-control" name="validity" type="date" id="image"
                                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                    value={{ $coupon->validity }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 form-group">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end col -->
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
        </div>
        <!-- end card -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },

                },
                messages: {
                    category_name: {
                        required: 'メニュー名を入力してください',
                    },

                    image: {
                        required: '画像を選択してください',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
