@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card card-body">
                <h3>Welcome to Amar Mart BD</h3>
            </div>

            <div class="row mt-3 text-center">
                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.products') }}">
                        <div class="card card-body">
                            <i class="fa fa-info-circle"></i>
                            <br>
                            Products
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.orders') }}">
                        <div class="card card-body">
                            <i class="fa fa-shopping-cart"></i>
                            <br>
                            Orders
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.coupons') }}">
                        <div class="card card-body">
                            <i class="fa fa-chevron-right"></i>
                            <br>
                            Coupons
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.sliders') }}">
                        <div class="card card-body">
                            <i class="fa fa-image"></i>
                            <br>
                            Sliders
                        </div>
                    </a>
                </div>


                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.brands') }}">
                        <div class="card card-body">
                            <i class="fa fa-chevron-down"></i>
                            <br>
                            Brands
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.categories') }}">
                        <div class="card card-body">
                            <i class="fa fa-chevron-down"></i>
                            <br>
                            Categories
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.reviews') }}">
                        <div class="card card-body">
                            <i class="fa fa-chevron-down"></i>
                            <br>
                            Product Reviews
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mt-2">
                    <a href="{{ route('admin.reports') }}">
                        <div class="card card-body">
                            <i class="fa fa-chevron-down"></i>
                            <br>
                            Sales Report
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a
                        href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
@endsection
