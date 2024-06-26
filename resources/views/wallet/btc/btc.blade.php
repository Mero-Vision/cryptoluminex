
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

    <div class="pt-68 pb-80">
        <div class="bg-menuDark tf-container">
            <div class="row" style="display: flex; flex-wrap: wrap; margin: 0;">
                <div class="col-lg-12 col-sm-12 col-xs-12 settings"
                    style="width: 100%; padding: 10px; box-sizing: border-box;">

                    <div class="icon-after cc BTC-alt" style="margin-bottom: 10px;"></div>
                    <div class="cryp-icon" style="display: flex; justify-content: center; align-items: center;">
                        <img src="{{ url('assets/img/icons/18.png') }}" class='mt-10' alt=""
                            style="width: 50px; margin-top: 10px;">
                    </div>
                    <div class="stats" style="text-align: center; margin-top: 20px;">
                        <h3 class="text-light mt-3" id="usdBtcBalance" style="margin-top: 10px;">Loading...
                            <span>BTC</span>
                        </h3>
                        <div class="balance bg-white mt-3 text-center"
                            style="background-color: white; padding: 10px; margin-top: 10px; border-radius: 5px;">
                            <label class="text-light" style="font-weight: bold;">Balance in USD: </label>
                            <span class="desc text-light" id="btcBalance">${{ $btcBalance->dollar_balance }}</span><br>

                            <label class="text-light" style="font-weight: bold; margin-top: 10px;">Frozen Amount:
                            </label>
                            <span
                                class="desc text-light">${{ isset($btcBalance->frozen_amount) ? $btcBalance->frozen_amount : '0.000' }}</span>
                        </div>


                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <div class="text-center icon-container">
                                    <a href="{{ url('wallet/send/btc') }}" class="circle-button mb-1">
                                        <i class='bx bx-up-arrow-alt bx-sm'></i>
                                    </a>
                                    <br>

                                    <a href="{{ url('wallet/send/btc') }}" class="text-light">Send</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center icon-container">
                                    <a href="{{ url('wallet/convert/btc') }}" class="circle-button mb-1">

                                        <i class='bx bx-expand-horizontal bx-sm'></i>
                                    </a>
                                    <br>
                                    <a href="{{ url('wallet/convert/btc') }}" class="text-light">Convert</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center icon-container">
                                    <a href="{{ url('wallet/receive/btc') }}" class="circle-button mb-1">
                                        <i class='bx bx-down-arrow-alt bx-sm'></i>
                                    </a>
                                    <br>
                                    <a href="{{ url('wallet/receive/btc') }}" class="text-light">Receive</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

            <!-- End .row -->



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




</body>

</html>



















