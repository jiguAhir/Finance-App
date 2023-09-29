@extends('master')
@section('content')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Dashboard</h4>
              <hr>
               @foreach($total_sales as $item)
                <h3 class="text-center ">Total of Sales</h3>
                <h1 class="text-center">{{ "$" . $item->total_sales }}</h3>
                <hr>
                <h3 class="text-center">Total Interest</h3>
                <h1 class="text-center">{{ "$" . number_format($item->sales_interest, 2, '.', ',') }}</h3>
                <hr>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
