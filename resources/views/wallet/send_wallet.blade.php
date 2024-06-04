<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

    <title>Wallet</title>
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

            <div class="col-xxl-12 mb-25 settings">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body px-25">
                                <h4 class="banner-feature__heading text-light mt-4">Send Crypto Now
                                </h4>
                                <p class="banner-feature__para text-light">Choose a wallet to send crypto now..
                                </p>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="banner-feature__shape float-end">
                                <img src="{{ url('assets/img/send_receive.webp') }}" alt="img"
                                    style="max-width: 100px">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <div class="wrap-filter-swiper">

                    <div class="swiper-wrapper1 menu-tab-v3 mt-12" role="tablist">
                        <div class="swiper-slide1 nav-link active" data-bs-toggle="tab" data-bs-target="#favorites"
                            role="tab" aria-controls="favorites" aria-selected="true">
                            Wallet Coins
                        </div>

                    </div>
                    <!-- </div> -->
                </div>
                <div class="tab-content mt-8">
                    <div class="tab-pane fade show active" id="favorites" role="tabpanel">
                        <div class="wallerContainer">
                            {{-- -------------- Usdt Card -------------- --}}
                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="{{ url('wallet/send/usdt') }}" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/USDT.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">USDT Wallet</p>
                                                    <span class="text-secondary">USDT Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="usdtBalance">
                                                        ${{ $usdtBalance->dollar_balance }}</p>
                                                    <p class="text-end" id="usdBalance"> Loading..</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- Usdt Card -------------- --}}


                            {{-- -------------- Bitcoin Card -------------- --}}

                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="{{ url('wallet/send/btc') }}" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/18.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">BTC Wallet</p>
                                                    <span class="text-secondary">BTC Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="btcBalance">
                                                        ${{ $btcBalance->dollar_balance }}</p>
                                                    <p class="text-end" id="usdBtcBalance"> Loading..</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- Bitcoin Card -------------- --}}



                            {{-- -------------- ETH Card -------------- --}}

                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="{{ url('wallet/send/eth') }}" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/1.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">ETH Wallet</p>
                                                    <span class="text-secondary">ETH Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="etcBalance">
                                                         ${{ $etcBalance->dollar_balance }}</p>
                                                    <p class="text-end" id="usdEtcBalance"> Loading..</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- ETH Card -------------- --}}


                            {{-- -------------- XRP Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/XRP.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">XRP Wallet</p>
                                                    <span class="text-secondary">XRP Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 XRP</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- XRP Card -------------- --}}




                            {{-- -------------- SOL Card -------------- --}}

                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/SOL.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">SOL Wallet</p>
                                                    <span class="text-secondary">SOL Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 SOL</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- SOL Card -------------- --}}



                            {{-- -------------- RNDR Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/RNDR.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">RNDR Wallet</p>
                                                    <span class="text-secondary">RNDR Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 RNDR</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- RNDR Card -------------- --}}

                            {{-- -------------- ARB Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/ARB.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">ARB Wallet</p>
                                                    <span class="text-secondary">ARB Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 ARB</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- ARB Card -------------- --}}



                            {{-- -------------- INJ Card -------------- --}}
                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/INJ.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">INJ Wallet</p>
                                                    <span class="text-secondary">INJ Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 INJ</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- INJ Card -------------- --}}


                            {{-- -------------- GALA Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/GALA.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">GALA Wallet</p>
                                                    <span class="text-secondary">GALA Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 GALA</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- GALA Card -------------- --}}


                            {{-- -------------- MATIC Card -------------- --}}
                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/MATIC.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">MATIC Wallet</p>
                                                    <span class="text-secondary">MATIC Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 MATIC</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            {{-- -------------- MATIC Card -------------- --}}



                            {{-- -------------- XLM Card -------------- --}}
                            <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/XLM.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">XLM Wallet</p>
                                                    <span class="text-secondary">XLM Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 XLM</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {{-- -------------- XLM Card -------------- --}}


                            {{-- -------------- HBAR Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/HBAR.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">HBAR Wallet</p>
                                                    <span class="text-secondary">HBAR Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 HBAR</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            {{-- -------------- HBAR Card -------------- --}}


                            {{-- -------------- ENJ Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/ENJ.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">ENJ Wallet</p>
                                                    <span class="text-secondary">ENJ Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 ENJ</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            {{-- -------------- ENJ Card -------------- --}}


                            {{-- -------------- SHIB Card -------------- --}}
                             <div class="overflow-auto pb-16">
                                <ul>
                                    <li>
                                        <a href="#" class="coin-item style-1 gap-12 bg-surface">
                                            <img src="{{ url('assets/img/icons/SHIB.png') }}" alt="img"
                                                class="img">
                                            <div class="content">
                                                <div class="title">
                                                    <p class="mb-4 text-large">SHIB Wallet</p>
                                                    <span class="text-secondary">SHIB Coin</span>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-small mb-4" id="">
                                                         $0.000</p>
                                                    <p class="text-end" id=""> 0.00000 SHIB</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                           
                            {{-- -------------- SHIB Card -------------- --}}







                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    @include('layouts.menu')













    @include('layouts.footer')

    <style>
        .icon-container {
            text-align: center;
        }

        .crypto-icon {
            padding: 5px 20px 10px;
        }

        .crypto-icon i {
            font-size: 40px
        }

        .form-group.cryptonia .desc {
            margin-left: 0
        }

        .balance {
            background: #2f323b;
            padding: 10px;
            text-align: left;
        }

        .bg-white {
            background: #393c44 !important
        }

        .circle-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            background-color: #131722;
            color: #ffffff;
        }
    </style>

    <script>
        function updateUSDBalance() {
            var apiUrl = 'https://api.coincap.io/v2/assets/tether';


            $.get(apiUrl, function(data) {
                if (data && data.data && data.data.priceUsd) {

                    var usdtToUsdRate = parseFloat(data.data.priceUsd);


                    var usdtAmount = parseFloat('{{ $usdtBalance->dollar_balance }}');


                    var usdBalance = usdtAmount / usdtToUsdRate;


                    $('#usdBalance').text(usdBalance.toFixed(3) + " USDT");

                } else {

                    $('#usdBalance').text('Error fetching exchange rate');
                }
            }).fail(function() {

                $('#usdBalance').text('Error fetching exchange rate');
            });
        }


        setInterval(updateUSDBalance, 1000);


        updateUSDBalance();
    </script>

    <script>
        function updateUSDBtcBalance() {
            var apiUrl = 'https://api.coincap.io/v2/assets/bitcoin';


            $.get(apiUrl, function(data) {
                if (data && data.data && data.data.priceUsd) {

                    var btcToUsdRate = parseFloat(data.data.priceUsd);


                    var btcAmount = parseFloat('{{ $btcBalance->dollar_balance }}');


                    var usdBtcBalance = btcAmount / btcToUsdRate;


                    $('#usdBtcBalance').text(usdBtcBalance.toFixed(5) + " BTC");
                } else {

                    $('#usdBtcBalance').text('Error fetching exchange rate');
                }
            }).fail(function() {

                $('#usdBtcBalance').text('Error fetching exchange rate');
            });
        }


        setInterval(updateUSDBtcBalance, 1000);


        updateUSDBtcBalance();
    </script>


    <script>
        function updateUSDEtcBalance() {
            var apiUrl = 'https://api.coincap.io/v2/assets/ethereum';


            $.get(apiUrl, function(data) {
                if (data && data.data && data.data.priceUsd) {

                    var etcToUsdRate = parseFloat(data.data.priceUsd);


                    var etcAmount = parseFloat('{{ $etcBalance->dollar_balance }}');


                    var usdEtcBalance = etcAmount / etcToUsdRate;


                    $('#usdEtcBalance').text(usdEtcBalance.toFixed(5) + " ETH");
                } else {

                    $('#usdEtcBalance').text('Error fetching exchange rate');
                }
            }).fail(function() {

                $('#usdEtcBalance').text('Error fetching exchange rate');
            });
        }


        setInterval(updateUSDEtcBalance, 1000);


        updateUSDEtcBalance();
    </script>


</body>

</html>
