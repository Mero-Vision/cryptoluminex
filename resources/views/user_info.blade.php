<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

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


    <div class="header fixed-top bg-surface d-flex justify-content-center align-items-center">
        <a href="#" class="left back-btn"><i class="icon-left-btn"></i></a>
        <a href="{{ url('/') }}" class="right"><i class="icon-home2 fs-20"></i></a>
        {{-- <a href="qr-code.html" class="right text-secondary"><i class="icon-barcode"></i></a> --}}
    </div>
    <div class="pt-45 pb-16">
        <div class="bg-menuDark tf-container">
            <a href="{{ url('user-info/profile') }}"
                class="pt-12 pb-12 mt-4 d-flex justify-content-between align-items-center">
                <div class="box-account">
                    <img src="{{ Avatar::create(Auth()->user()->name)->toBase64() }}" alt="img" class="avt">
                    <div class="info">
                        <h5>{{ Auth()->user()->name }}</h5>
                        <p class="text-small text-secondary mt-8 mb-8">Profile and settings</p>
                        @if ($verifyEmail->verification_status == 'unverified')
                            <span class="avatar-label tag-xs style-2 round-2 red text-light" style="color: white;">
                               Unverified
                                <i class="bi bi-patch-question-fill"></i>
                            </span>
                        @else
                            <span class="avatar-label tag-xs style-2 round-2 bg-success text-light"
                                style="color: white;">
                                Verified <i class='bx bxs-badge-check'></i>
                            </span>
                        @endif

                    </div>
                </div>
                <span class="arr-right"><i class="icon-arr-right"></i></span>
            </a>

        </div>
        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <h5>Buy cryptocurrencies</h5>
                <ul class="mt-16 grid-3 gap-12">
                    <li>
                        <a href="#cryptocurrency"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center"
                            data-bs-toggle="modal">
                            <i class="icon icon-currency"></i>
                            Buy Crypto
                        </a>
                    </li>
                    {{-- <li>
                        <a href="exchange-market.html"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                            <i class="icon icon-swap"></i>
                            Exchange
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>
        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <h5>More</h5>
                <ul class="mt-16 grid-3 gap-12">
                    <li>
                        <a href="{{ url('user-info/deposit') }}"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                            <i class='bx bx-coin-stack bx-sm'></i>
                            Deposit
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('trade-history') }}"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                            <i class="icon icon-metalogo"></i>
                            Trade History
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('withdraw-history') }}"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                            <i class="bi bi-clock-history bx-sm"></i>
                            Withdraw History
                        </a>
                    </li>

                    <li class="mt-3">
                        <a href="#"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                            <i class="bi bi-file-earmark-text bx-sm"></i>
                            Verify Document
                        </a>
                    </li>
                    {{-- <li class="mt-3">
                        <a href="{{url('change-password')}}"
                            class="tf-list-item d-flex flex-column gap-8 align-items-center text-break text-center">
                           <i class="bi bi-backpack2 bx-sm"></i>
                            Change Password
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>
        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <h5>Help center</h5>
                <ul class="mt-16 grid-3 gap-12">
                    <li>
                        <a href="{{ url('about') }}" class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <i class="bi bi-file-earmark-person-fill bx-sm"></i>
                            About Us
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#" class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <i class="icon icon-headset"></i>
                            Support
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>

    </div>

    <!--cryptocurrency -->
    <div class="modal fade modalRight" id="cryptocurrency">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="header fixed-top bg-surface d-flex justify-content-center align-items-center">
                    <span class="left" data-bs-dismiss="modal" aria-hidden="true"><i class="icon-left-btn"></i></span>
                    <h3>Buy cryptocurrency</h3>
                </div>
                <div class="overflow-auto pt-45 pb-16">
                    <div class="tf-container">
                        {{-- <div class="mt-8 search-box box-input-field">
                            <i class="icon-search"></i>
                            <input type="text" placeholder="Search cryptocurrency" required class="clear-ip">
                            <i class="icon-close"></i>
                        </div>
                        <h5 class="mt-12">Popular search</h5> --}}
                        <br>
                        <ul class="mt-42">
                            <li>
                                <a href="https://global.transak.com/" target="_blank" class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/transak.png') }}" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">Transak Wallet</p>
                                            {{-- <span class="text-secondary text-small">ETH</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="https://my.mercuryo.io/login/email" target="_blank"
                                    class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/mercuryo.png') }}" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">Mercuryo Wallet</p>
                                            {{-- <span class="text-secondary text-small">BTC</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="https://ramp.network/buy#" target="_blank" class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/ramp.png') }}" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">Ramp Wallet</p>
                                            {{-- <span class="text-secondary text-small">USDT</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="https://buy.simplex.com/" target="_blank" class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/simplex.png') }}" alt="img"
                                        class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">Simplex Wallet</p>
                                            {{-- <span class="text-secondary text-small">BNB</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="https://www.moonpay.com/en-gb/buy?source=homepage" target="_blank"
                                    class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/moonpay.png') }}" alt="img"
                                        class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">MoonPay Wallet</p>
                                            {{-- <span class="text-secondary text-small">XRP</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="https://banxa.com/" target="_blank" class="coin-item style-2 gap-12">
                                    <img src="{{ url('assets/img/buy/banxa.png') }}" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-large">Banxa Wallet</p>
                                            {{-- <span class="text-secondary text-small">ADA</span> --}}
                                        </div>
                                        <span class="text-small">Visit</span>
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.menu')












    @include('layouts.footer')



</body>

</html>
