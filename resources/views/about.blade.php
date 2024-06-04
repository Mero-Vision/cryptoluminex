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
        {{-- <a href="qr-code.html" class="right text-secondary"><i class="icon-barcode"></i></a> --}}
    </div>
    <div class="pt-45 pb-16">
        <div class="bg-menuDark tf-container">
            <a href="#" class="pt-12 pb-12 mt-4 d-flex justify-content-between align-items-center">
                <div class="box-account">
                    <img src="{{ Avatar::create(Auth()->user()->name)->toBase64() }}" alt="img" class="avt">
                    <div class="info">
                        <h5>{{ Auth()->user()->name }}</h5>

                        <span class="tag-xs style-2 round-2 red text-light">
                            <label class="avatar-label" style="color: white;">
                                @if ($verifyEmail->verification_status == 'unverified')
                                    Unverified
                                    <i class="bi bi-patch-question-fill"></i>
                            </label>
                        @else
                            <label class="avatar-label text-light" style="color: white;">
                                Verified <i class='bx bxs-badge-check'></i>
                            </label>
                            @endif
                        </span>

                    </div>
                </div>

            </a>

        </div>



    </div>

   <div class="bg-menuDark tf-container">
    <div class="pt-12 pb-12 mt-4">
            <h5 class="text-center mt-3">About Us</h5><br>
            <p class="text-light" style="overflow-y: auto;">Crypto Luminexx is a premier crypto trading app, renowned for its reliability and
                user-friendly
                interface. Specializing in the trading of top cryptocurrencies such as Bitcoin (BTC), Ethereum
                (ETH), and Tether (USDT), Crypto Luminexx provides a seamless and efficient trading experience for
                both novice and experienced traders. </p>
            <br>
            <p class="text-light" style="overflow-y: auto;">
                With over 5,000 trusted clients, Crypto Luminexx has established itself as a leading platform in the
                crypto trading space. Our app is designed with cutting-edge security features to ensure that your
                assets are always safe and secure. Real-time market data and advanced trading tools allow users to
                make informed decisions, maximizing their investment potential.</p>
            {{-- <p class="text-light" style="overflow-y: auto;"><br>
                Coin Luminexx stands out for its exceptional customer service and support, available 24/7 to assist
                with any queries or issues. Our intuitive interface and comprehensive educational resources empower
                users to trade with confidence, regardless of their level of expertise.
            </p><br>
            <p class="text-light" style="overflow-y: auto;">
                Whether you're looking to invest in Bitcoin, explore the potential of Ethereum, or trade with the
                stability of USDT, Coin Luminexx is your go-to app for all your crypto trading needs. Join our
                growing community and experience the best in crypto trading with Coin Luminexx.
            </p> --}}
        </div>
    </div>


    @include('layouts.menu')












    @include('layouts.footer')



</body>

</html>
