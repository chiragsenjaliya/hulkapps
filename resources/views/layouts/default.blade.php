<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ ucwords(strtolower(app()->view->getSections()['pageTitle'])) }} | {{ env('app_name', 'HulkTestApp') }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uppy/2.2.3/uppy.min.css" integrity="sha512-rIHliWoBFcuFHGQd+B0KEEnSNMePw2a58Jlrc8pIlX0LBygiinXiNiw8kKBymG5sKJCcGGjgBrC0eNeKuGj/fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        @yield('styles')
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white col-md-3" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light d-flex">
                    <div class="col-auto align-middle ">
                        <h5 class="mt-2">Files</h5>
                    </div>
                    <div class="w-100 text-end">
                        <button class="btn" id="upload-files">
                            Upload <i class="fa fa-upload"></i>
                        </button>
                        <div class="uppy" id="uppy_upload">
                        </div>
                    </div>
                </div>
                <livewire:p-d-f-list/>
            </div>
            @yield('content')
        </div>
        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uppy/2.2.3/uppy.min.js" integrity="sha512-TEPt1pdBcYOzoo2Hw124t41FpG03M5CWZoCpY91WEByQV/vIl3fCIxEXXOupn6kFoHwCmGZEs5CxaHLx6LX3Hw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>
