@extends('master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customer</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Customer Information</h4>
                        <hr>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No#</th>
                                <th>Customer Name</th>
                                <th>Balance</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                                @php($i = 1)
                                @foreach($customer as $item)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td>
                                    <a href="{{ route('customer.details', $item->id) }}">{{ $item->firstname . " " . $item->lastname }}</a>
                                </td>
                                <td> ${{ $item->balance }} </td>
                                <td>
                                    <a href="{{ route('edit.customer', $item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                    <a href="{{ route('delete.customer',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class=" fas fa-trash-alt"></i> </a>
                                </td>
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