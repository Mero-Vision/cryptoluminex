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


            <div class="row">
                <div class="col-md-12 settings">

                    <div class="icon-after cc BTC-alt"></div>
                    <div class="cryp-icon">
                        <img src="{{ url('assets/img/icons/USDT.png') }}" class='mt-10 d-block mx-auto' alt="" style="width: 50px">
                    </div>
                    <h5 class="text-center text-light m-2">USDT Coin</h5>

                    <form action="{{ url('wallet/convert/usdt') }}" method="post">
                        @csrf

                        <input type="hidden" id="availableBalance" name="available_balance"
                            value="{{ $usdtBalance->dollar_balance }}" />

                        <input type="hidden" name="balance_id" value="{{ $usdtBalance->id }}" />


                        <div class="mb-3 mt-3">
                            <p class="text-light">USDT Availance Balance</p>
                            <div class="input-group" style="display: flex; align-items: center; margin-top: 10px;">
                                <span class="input-group-text bg-secondary text-light"
                                    style="padding: 10px 20px; border: 1px solid #ccc; border-right: none; border-radius: 4px 0 0 4px;">USDT</span>
                                <input type="text" class="clear-ip value_input ip-style2" placeholder="USDT Amount"
                                    value="{{ $usdtBalance->dollar_balance }}"
                                    style="flex: 1; padding: 10px; border: 1px solid #ccc; border-left: none; border-radius: 0 4px 4px 0;">
                            </div>

                            @error('wallet_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="mb-3 mt-1">
                            <p class="text-light">Amount</p>
                            <div class="input-group" style="display: flex; align-items: center; margin-top: 10px;">
                                <div style="width: 26%; margin-right: -1px; position: relative;">
                                    <select class="form-select form-control custom-arrow" id="coinSelector"
                                        name="convert_currency_id"
                                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px 0 0 4px; appearance: none; -webkit-appearance: none; -moz-appearance: none; background: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns%3D%22http%3A//www.w3.org/2000/svg%22 width%3D%2216%22 height%3D%2216%22 fill%3D%22currentColor%22 class%3D%22bi bi-caret-down-fill%22 viewBox%3D%220 0 16 16%22%3E%3Cpath d%3D%22M7.247 11.14 2.451 6.344a.626.626 0 0 1 .442-1.068h10.214a.626.626 0 0 1 .442 1.068l-4.796 4.796a.626.626 0 0 1-.884 0z%22/%3E%3C/svg%3E') no-repeat right 10px center; background-color: white;">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input id="walletAddress" type="text" class="form-control"
                                    placeholder="Enter Convert Balance" name="convert_balance"
                                    style="flex: 1; padding: 10px; border: 1px solid #ccc; border-left: none; border-radius: 0;">
                                <div class="input-group-append" style="display: flex;">
                                    <span class="input-group-text" id="maxButton"
                                        style="padding: 10px 20px; border: 1px solid #ccc; border-left: none; border-radius: 0 4px 4px 0; background-color: #f0f0f0; cursor: pointer;">Max</span>
                                </div>
                            </div>


                            @error('convert_balance')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>




                        <p class="text-light">
                            Available: <span id="usdBalance">${{ $usdtBalance->dollar_balance }}</span> USD
                            <span id="fetchStatus" style="margin-left: 10px;"></span>
                        </p>





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





            <div class="container settings">
               
                    <p class="p-3 px-4 text-light mt-3">
                        You have the option to directly convert USDT to BTC or ETH. Please input the desired amount from
                        your
                        available balance to initiate the conversion process to other currencies.
                    </p>


               
            </div>



        </div>


    </div>


    @include('layouts.menu')


    <style>
        .custom-arrow {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Add padding to make space for the custom arrow */
            padding-right: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M16.293 9.293L12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707-1.414-1.414z" fill="white"/></svg>');
            background-repeat: no-repeat;
            background-position: right center;
            /* Adjust background size as needed */
            background-size: 20px;
            /* Adjust size as per your requirement */
            border: 1px solid #ccc;
            /* Add border if necessary */
            border-radius: 5px;
            /* Add border radius if necessary */
            color: black;
            /* Set text color */
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

                fetch('https://api.coincap.io/v2/assets/tether')
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








    @include('layouts.footer')






</body>

</html>
