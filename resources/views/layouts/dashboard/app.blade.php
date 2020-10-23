<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <title>Netflix</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}}">


    <!-- Jquery -->
    <script src="{{asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>


    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    <style>
        label {
            font-weight: bold;
        }
    </style>

    @stack('styles')

</head>
<body class="app sidebar-mini">



@include('layouts.dashboard._header')

@include('layouts.dashboard._aside')


<main class="app-content">

    @include('dashboard.partials._session')


   @yield('content')

</main>


<!-- Essential javascripts for application to work-->

<script src="{{asset('dashboard_files/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/bootstrap.min.js')}}"></script>

{{-- select 2 --}}
<script src="{{asset('dashboard_files/plugins/select2/select2.min.js')}}"></script>

<script src="{{asset('dashboard_files/js/main.js')}}"></script>

{{-- movie --}}
<script src="{{asset('dashboard_files/js/custom/movie.js')}}"></script>

<script>

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();


            var that = $(this);

            var n = new Noty({
                text: 'Confirm Deleting Record',
                killer: true,
                buttons: [
                    Noty.button('Yes', 'btn btn-success mr-2', function () {
                       that.closest('form').submit();
                    }),

                    Noty.button('No', 'btn btn-danger', function () {
                        n.close();
                    }),
                ]
            });

            n.show();
        });



}); //end of document ready



    //select2
    $('.select2').select2({
        width: '100%'
    });


</script>

</body>
</html>
