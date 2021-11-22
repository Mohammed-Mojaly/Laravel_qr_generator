@php
    $current_page = \Route::currentRouteName();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <title>Your QR Code</title>
	<meta name="description" content="Simple to Make Your QR Code " />
	<link rel="canonical" href="{{asset('logo.png')}}" />
	<meta property="og:locale" content="en" />
	<meta property="og:type" content="service" />
	<meta property="og:title" content="Your QR Code" />
	<meta property="og:description" content="Simple to Make Your QR Code" />
	<meta property="og:url" content="https://yourqrcode.gq" />
	<meta property="og:site_name" content="Your QR Code" />
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/style.css')}}" >
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>


</style>
</head>

<body>
                 @if (session('status'))
                    <script>
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  '{{ session('status') }}' ,
                        showConfirmButton: false,
                        timer: 1500
                     })

                    </script>

                    @endif



    <div class="py-4">
        <div class="container">
            <h3 class="text-center" style="text-shadow: 1px 1px 2px blue;">Make Your QR Code</h3>
            <div class="col-12 p-0 justify-content-center d-flex row py-4 main_header">


             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_builder' ? 'active_element' : ''}}">
                <a href="{{route('qr_builder')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_builder' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-home d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    General
                </div>
                </div>
                </div>
                </a>
             </div>

             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_phone' ? 'active_element' : ''}}">
                <a href="{{route('qr_phone')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_phone' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-phone d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Phone
                </div>
                </div>
                </div>
                </a>
             </div>

             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_email' ? 'active_element' : ''}}">
                <a href="{{route('qr_email')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_email' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-envelope-square d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Email
                </div>
                </div>
                </div>
                </a>
             </div>


             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_sms' ? 'active_element' : ''}}">
                <a href="{{route('qr_sms')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_sms' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-sms d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Sms
                </div>
                </div>
                </div>
                </a>
             </div>

             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_geo' ? 'active_element' : ''}}">
                <a href="{{route('qr_geo')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_geo' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-location d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Location
                </div>
                </div>
                </div>
                </a>
             </div>

             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_link' ? 'active_element' : ''}}">
                <a href="{{route('qr_link')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_link' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-link d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Link
                </div>
                </div>
                </div>
                </a>
             </div>

             <div class="p-1 text-center  d-inline-block element_header {{$current_page == 'qr_wifi' ? 'active_element' : ''}}">
                <a href="{{route('qr_wifi')}}" class="d-block menu-link" style="border-radius: 7px;color: #232323;">
                <div class="col-12 p-2 text-center  menu-div d-flex align-items-center {{$current_page == 'qr_wifi' ? 'active_text' : ''}}">
                <div class="col-12 p-0 text-center">
                <span class="far fa-wifi d-inline-block"></span>
                <div class="col-12 px-0 text-center">
                    Wifi
                </div>
                </div>
                </div>
                </a>
             </div>



            </div>
        @yield('content')
        </div>
    </div>
    <footer>
     <div class="text-center"><b>Made By: <a href="https://mohammedmojaly.com" target="_blank">Mohammed Mojaly</a></b></div>
    </footer>
</body>
</html>
