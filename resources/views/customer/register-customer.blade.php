@extends('master')
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">New Customer Registration</h4>
                            <hr>

                            <form method="post" action="{{ route('store.customer') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input name="first_name" class="form-control" type="text" id="example-text-input">
                                        @error('first_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input name="last_name" class="form-control" type="text" id="example-text-input">
                                        @error('last_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror

                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input name="address" class="form-control" type="text" id="example-text-input">
                                        @error('address')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-select" aria-label="Default select example">
                                          <option selected>-- Select Gender --</option>
                                          <option value="1">Male</option>
                                          <option value="2">Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Balance</label>
                                    <div class="col-sm-10">
                                        <input name="balance" class="form-control" type="decimal" id="example-text-input">
                                        @error('balance')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Register New Customer">

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
