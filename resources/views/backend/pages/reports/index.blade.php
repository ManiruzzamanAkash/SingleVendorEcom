@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h2 class="float-left">
            All Reports
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <div class="row">
              
              <div class="col-md-3" onclick="location.href='{{ route('admin.report.sell_report') }}'">
                  <div class="card card-body p-2 pt-5 pb-5 m-2 border bg-light text-center pointer font-weight-bold">
                      <i class="fa fa-cart-plus"></i>  Sell Report
                  </div>
              </div> 

            </div>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
