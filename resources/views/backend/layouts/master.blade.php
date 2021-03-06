<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin | ' . config('app.name'))</title>

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}?v=1.2">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backend/css/datatables/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backend/css/datatables/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/backend/css/datatables/buttons.dataTables.min.css') }}">
    <!-- DataTable -->

    <!-- Sweet Alert -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/backend/js/sweetalert2/dist/sweetalert2.min.css') }}">
    <!-- Sweet Alert -->


    <link rel="shortcut icon" href="images/favicon.png" />
    @yield('stylesheets')
</head>

<body>
    <div class="container-scroller">
        @include('backend.partials.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('backend.partials.left_sidebar')
            @yield('content')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/data-table.min.js') }}"></script>

    <!-- Data Tables -->

    <script src="{{ asset('public/assets/backend/js/datatable/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/datatable/datatables/buttons.print.min.js') }}"></script>


    <!-- Sweet Alert -->
    <script src="{{ asset('public/assets/backend/js/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/sweetalert2/sweet-alert.init.js') }}"></script>
    <!-- Sweet Alert -->

    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="{{ asset('public/assets/backend/js/summernote-lite.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write a short description',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @yield('scripts')

    {{-- <script src="node_modules/chart.js/dist/Chart.min.js"></script> --}}

</body>

</html>
