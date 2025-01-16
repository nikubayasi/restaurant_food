@extends('client.client_dashboard')
@section('client')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                            <form id="myForm" action="{{ route('product.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Category Name</label>
                                            <select class="form-select" name="category_id">
                                                <option>Select</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Menu Name</label>
                                            <select class="form-select" name="menu_id">
                                                <option selected disabled>Select</option>
                                                @foreach ($menu as $men)
                                                    <option
                                                        value="{{ $men->id }}"{{ $men->id == $product->menu_id ? 'selected' : '' }}>
                                                        {{ $men->menu_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">City Name</label>
                                            <select class="form-select" name="city_id">
                                                <option selected disabled>Select</option>
                                                @foreach ($city as $cit)
                                                    <option
                                                        value="{{ $cit->id }}"{{ $cit->id == $product->city_id ? 'selected' : '' }}>
                                                        {{ $cit->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Product Name</label>
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $product->name }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Price</label>
                                            <input class="form-control" name="price" type="text"
                                                value="{{ $product->price }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Discount Price</label>
                                            <input class="form-control" name="discount_price" type="text"
                                                value="{{ $product->discount_price }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Size</label>
                                            <input class="form-control" name="size" type="text"
                                                value="{{ $product->size }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Product QTY</label>
                                            <input class="form-control" name="qty" type="text"
                                                value="{{ $product->qty }}" id="example-text-input">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="mb-3 form-group">
                                            <label for="example-text-input" class="form-label">Product Image</label>
                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="mb-3 form-group">
                                            <img id="showImage" src="{{ asset($product->image) }}" alt=""
                                                class="image-fluid rounded-circle p-1 bg-primary" width="100"
                                                height="100">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="best_seller" value="1"
                                            {{ $product->best_seller == 1 ? 'checked' : '' }}>
                                        <label for=formCheck2" class="best_seller">Bast Seller</label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            name="most_populer" {{ $product->most_populer == 1 ? 'checked' : '' }}>>
                                        <label for=formCheck2" class="form-check-label">Most Popular</label>
                                    </div>
                                    <div class="mt-4 form-group">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    menu_id: {
                        required: true,
                    },
                    city_id: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: '商品名を入力してください',
                    },
                    menu_id: {
                        required: '商品を一つ選択してください',
                    },
                    city_id: {
                        required: '都市を選択してください',
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
@endsection
