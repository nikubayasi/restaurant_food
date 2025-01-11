@extends('client.client_dashboard')
@section('client')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm order-2 order-sm-1">
                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xl me-3">
                                                <img src="{{ !empty($profileData->photo) ? url('upload/client_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle d-block">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                <h5 class="font-size-16 mb-1">{{ $profileData->name }}</h5>
                                                <p class="text-muted font-size-13">{{ $profileData->email }}</p>

                                                <div
                                                    class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                    <div><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->phone }}
                                                    </div>
                                                    <div><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->address }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto order-1 order-sm-2">
                                    <div class="d-flex align-items-start justify-content-end gap-2">
                                        <div>
                                            <button type="button" class="btn btn-soft-light"><i class="me-1"></i>
                                                Message</button>
                                        </div>
                                        <div>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('client.profile.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="example-number-input" class="form-label">Phone Number</label>
                                        <input class="form-control" name="phone" type="number"
                                            value="{{ $profileData->phone }}" id="example-number-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Address</label>
                                        <input class="form-control" name="address" type="text"
                                            value="{{ $profileData->address }}" id="example-number-input">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3 text-center">
                                        <img id="showImage"
                                            src="{{ !empty($profileData->photo) ? url('upload/client_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                            alt="" class="image-fluid rounded-circle p-1 bg-primary" width="110">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Profile Image</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Date</label>
                                        <input class="form-control" type="date" value="2019-08-19"
                                            id="example-date-input">
                                    </div>

                                    <div>
                                        <label for="exampleDataList" class="form-label">Datalists</label>
                                        <input class="form-control" list="datalistOptions" id="exampleDataList"
                                            placeholder="Type to search...">
                                        <datalist id="datalistOptions">
                                            <option value="San Francisco">
                                            <option value="New York">
                                            <option value="Seattle">
                                            <option value="Los Angeles">
                                            <option value="Chicago">
                                        </datalist>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            Changes</button>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Skills</h5>

                                        <div class="d-flex flex-wrap gap-2 font-size-16">
                                            <a href="#" class="badge bg-primary-subtle text-primary">Photoshop</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">illustrator</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">HTML</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">CSS</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Javascript</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Php</a>
                                            <a href="#" class="badge bg-primary-subtle text-primary">Python</a>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Portfolio</h5>

                                        <div>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i
                                                            class="mdi mdi-web text-primary me-1"></i> Website</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i
                                                            class="mdi mdi-note-text-outline text-primary me-1"></i>
                                                        Blog</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Similar Profiles</h5>

                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-1.jpg" alt=""
                                                            class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">James Nix</h5>
                                                            <p class="font-size-13 text-muted mb-0">Full Stack Developer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-3.jpg" alt=""
                                                            class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">Darlene Smith</h5>
                                                            <p class="font-size-13 text-muted mb-0">UI/UX Designer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <div
                                                            class="avatar-title bg-light-subtle text-light rounded-circle font-size-22">
                                                            <i class="bx bxs-user-circle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">William Swift</h5>
                                                            <p class="font-size-13 text-muted mb-0">Backend Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
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
