<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
    <link href="//unpkg.com/layui@2.9.10/dist/css/layui.css" rel="stylesheet">
    <title>Crypto Luminexx</title>
</head>

<body>
    <!-- preloade -->
    {{-- <div class="preload preload-container">
        <div class="preload-logo" style="background-image: url('images/logo/144.png')">
            <div class="spinner"></div>
        </div>
    </div> --}}
    <!-- /preload -->



    <div class="header-style2 fixed-top bg-menuDark">
        @include('layouts.top_nav')
    </div>



    <div class="pt-68 pb-80">
        <div class="bg-menuDark tf-container">
            <div class="tf-tab pt-12 mt-4">
                <div class="tab-slide">
                    <ul class="nav nav-tabs wallet-tabs" role="tablist">
                        <li class="item-slide-effect"></li>
                        <li class="nav-item active" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#history">Waiting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#market">Finished</button>
                        </li>


                    </ul>
                </div>
                <div class="tab-content pt-16 pb-16">
                    <div class="tab-pane fade active show" id="history" role="tabpanel">

                        <div class="row sm-gutters">
                            <div class="col-md-12" style="background-color: #2d3136;">

                                @livewire('delivery-waiting-component')



                            </div>


                        </div>




                    </div>
                    <div class="tab-pane fade" id="market" role="tabpanel">

                        @livewire('delivery-finished-component')



                    </div>
                </div>
            </div>
        </div>
    </div>




    @include('layouts.menu')


















    <script src="//unpkg.com/layui@2.9.10/dist/layui.js"></script>
    {{-- <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script> --}}
    @include('layouts.footer')
    {{-- <script>
        $('tbody, .market-news ul').mCustomScrollbar({
            theme: 'minimal',
        });
    </script> --}}



</body>

</html>
