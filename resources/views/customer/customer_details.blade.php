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

                            <h4 class="card-title">Customer Details</h4>
                            <hr>

                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $customer->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10">
                                        <input name="customer_name" readonly class="form-control" type="text" value="{{ $customer->firstname }} {{ $customer->lastname }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Balance</label>
                                    <div class="col-sm-10">
                                        <input name="balance" class="form-control" type="text" value="${{ $customer->balance }}" readonly id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                   <div class="col-sm-10">
                                        <select disabled name="status" class="form-select" aria-label="Default select example">
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
                                    </div>
                                </div>
                                <!-- end row -->

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Make a Payment</h4>
                        <form method="post" action="{{ route('customer.makepayment') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $customer->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount:</label>
                                    <div class="col-sm-10">
                                        @if($customer->status == 3)
                                            <input readonly name="payment_amount" required class="form-control" type="text" id="example-text-input">
                                        @else
                                            <input name="payment_amount" class="form-control" type="text" id="example-text-input">
                                        @endif
                                    </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Make Payment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add to Balance</h4>
                        <form method="post" action="{{ route('customer.addbalance') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $customer->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Amount:</label>
                                    <div class="col-sm-10">
                                        @if($customer->status == 3)
                                            <input name="add_amount" readonly class="form-control" type="text" id="example-text-input">
                                        @else
                                            <input name="add_amount" class="form-control" type="text" id="example-text-input"> 
                                        @endif
                                    </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add to Balance">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
