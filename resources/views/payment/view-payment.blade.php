@extends('master')
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customer Payments</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Payments</h4>
                        <hr>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Interest Payment</th>
                                <th>Balance Payment</th>
                                <th>Balance</th>
                            </tr>
                            </thead>

                            <tbody>

                                @php($i = 1)
                                @foreach($payments as $item)
                            <tr>
                                <td> {{ date('m-d-Y', strtotime($item->created_at)) }} </td>
                                <td>
                                    {{ $item->firstname . " " . $item->lastname }}</a>
                                </td>
                                <td> ${{ $item->interest_payment }} </td>
                                <td> ${{ $item->balance_payment }} </td>
                                <td> ${{ $item->balance }} </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         
    </div>
</div>

@endsection
