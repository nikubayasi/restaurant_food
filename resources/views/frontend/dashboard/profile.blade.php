@extends('frontend.dashboard.dashboard')
@section('dashboard')
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp
    <section class="section pt-4 pb-4 osahan-account-page">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')
                <div class="col-md-9">
                    <div class="osahan-account-page-right rounded shadow-sm bg-white p-4 h-100">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <h4 class="font-weight-bold mt-0 mb-4">User Profile</h4>
                                <div class="bg-white card mb-4 order-list shadow-sm">
                                    <div class="gold-members p-4">
                                        <form action="{{ route('profile.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-label">Name</label>
                                                            <input class="form-control" name="name" type="text"
                                                                value="{{ $profileData->name }}" id="example-text-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-label">Email</label>
                                                            <input class="form-control" name="email" type="text"
                                                                value="{{ $profileData->email }}" id="example-text-input">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-number-input" class="form-label">Phone
                                                                Number</label>
                                                            <input class="form-control" name="phone" type="number"
                                                                value="{{ $profileData->phone }}" id="example-number-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-text-input"
                                                                class="form-label">Address</label>
                                                            <input class="form-control" name="address" type="text"
                                                                value="{{ $profileData->address }}"
                                                                id="example-number-input">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mt-3 mt-lg-0">

                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-label">Profile
                                                                Image</label>
                                                            <input class="form-control" name="photo" type="file"
                                                                id="image">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Date</label>
                                                            <input class="form-control" type="date" value="2019-08-19"
                                                                id="example-date-input">
                                                        </div>

                                                        <div>
                                                            <label for="exampleDataList"
                                                                class="form-label">Datalists</label>
                                                            <input class="form-control" list="datalistOptions"
                                                                id="exampleDataList" placeholder="Type to search...">
                                                            <datalist id="datalistOptions">
                                                                <option value="San Francisco">
                                                                <option value="New York">
                                                                <option value="Seattle">
                                                                <option value="Los Angeles">
                                                                <option value="Chicago">
                                                            </datalist>
                                                        </div>
                                                        <div class="mb-3 mt-3 text-center">
                                                            <img id="showImage"
                                                                src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                                alt=""
                                                                class="image-fluid rounded-circle p-1 bg-primary"
                                                                width="110">
                                                        </div>
                                                        <div class="mt-4 text-center">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Save
                                                                Changes</button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
@endsection
