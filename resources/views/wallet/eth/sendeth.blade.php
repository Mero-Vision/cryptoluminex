<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

    <title>Coin Luminexx</title>
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



            <div class="row">
                <div class="col-md-12 mb-3">

                    <div class="icon-after cc BTC-alt"></div>
                    <div class="cryp-icon">
                        <img src="{{ url('assets/img/icons/1.png') }}" class='mt-10 d-block mx-auto' alt="" style="width: 50px">
                    </div>
                    <h5 class="text-center text-light m-2">Ethereum</h5>

                    <form action="{{ url('wallet/send/eth') }}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <p class="text-light">Enter Wallet Address</p>
                            <input type="text" class="clear-ip value_input ip-style2 mt-1"
                                placeholder="Wallet Address" name="wallet_address">
                            @error('wallet_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="mb-3 mt-1">
                            <p class="text-light">Amount</p>
                            <div class="input-group" style="display: flex; align-items: center; margin-top: 10px;">
                                <input id="walletAddress" type="text" class="clear-ip value_input ip-style2"
                                    placeholder="Amount USD" name="withdraw_balance"
                                    style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px 0 0 4px;">
                                <div class="input-group-append" style="display: flex;">
                                    <span class="input-group-text" id="maxButton"
                                        style="padding: 10px 20px; border: 1px solid #ccc; border-left: none; border-radius: 0 4px 4px 0; background-color: #f0f0f0; cursor: pointer;">Max</span>
                                </div>
                            </div>

                            @error('withdraw_balance')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        <input type="hidden" id="availableBalance" name="available_balance"
                            value="{{ $ethBalance->dollar_balance }}" />

                        <p class="text-light">
                            Available: <span id="usdBalance">${{ $ethBalance->dollar_balance }}</span> USD
                            <span id="fetchStatus" style="margin-left: 10px;"></span>
                        </p>

                        <div class="g-recaptcha" data-sitekey="6LcBuuwpAAAAAPv3C8RvsbMZU4ddRzZfqxdEvWzE">
                        </div>



                        <div class="row mt-3">
                            <div class="col">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success text-light">Submit</button>

                                </div>
                            </div>
                        </div>
                    </form>
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
        document.getElementById('maxButton').addEventListener('click', function() {

            var availableBalance = document.getElementById('availableBalance').value;


            document.getElementById('walletAddress').value = availableBalance;
        });
    </script>

    <script>
        document.getElementById('walletAddress').addEventListener('input', function() {

            var withdrawalAmountUSD = parseFloat(this.value);


            if (!isNaN(withdrawalAmountUSD)) {

                fetch('https://api.coincap.io/v2/assets/ethereum')
                    .then(response => response.json())
                    .then(data => {

                        var usdToUsdtConversionRate = parseFloat(data.data.priceUsd);


                        var equivalentAmountUSDT = withdrawalAmountUSD / usdToUsdtConversionRate;


                        document.getElementById('equivalentAmountUSDT').value = equivalentAmountUSDT.toFixed(4);
                    })
                    .catch(error => {
                        console.error('Error fetching conversion rate:', error);
                    });
            } else {

                document.getElementById('equivalentAmountUSDT').value = '';
            }
        });
    </script>




</body>

</html>
