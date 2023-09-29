@extends('master')
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Customer Edit Page</h4>
                            <hr>

                            <form method="post" action="{{ route('update.customer') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $customer->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input name="first_name" class="form-control" type="text" value="{{ $customer->firstname }}" id="example-text-input">
                                        @error('first_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input name="last_name" class="form-control" type="text" value="{{ $customer->lastname }}" id="example-text-input">
                                        @error('last_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror

                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input name="address" class="form-control" type="text" value="{{ $customer->address }}" id="example-text-input">
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
                                            @if($customer->gender == '1')
                                            {
                                                <option value="0">-- Select Gender --</option>
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>      
                                            }
                                            @elseif ($customer->gender == '2')
                                            {
                                                <option value="0">-- Select Gender --</option>
                                                <option value="1">Male</option>
                                                <option value="2" selected>Female</option>      
                                            }
                                            @endif
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
                                        <input name="balance" class="form-control" type="text" value="${{ $customer->balance }}" readonly id="example-text-input">
                                        @error('balance')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror

                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                   <div class="col-sm-10">
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            @if($customer->status == '1')
                                            {
                                                <option value="0">-- Select Status --</option>
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>      
                                            }
                                            @elseif ($customer->status == '2')
                                            {
                                                <option value="0">-- Select Status --</option>
                                                <option value="1">1</option>
                                                <option value="2" selected>2</option>
                                                <option value="3">3</option>  
                                            }
                                            @elseif ($customer->status == '3')
                                            {
                                                <option value="0">-- Select Status --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3" selected>3</option>  
                                            }
                                            @endif
                                        </select>
                                        @error('status')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer Data">

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
