<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
    <link href="//unpkg.com/layui@2.9.10/dist/css/layui.css" rel="stylesheet">
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

    <x-device desktop="true">
        <div class="pt-68 pb-8">
            <div class="bg-menuDark tf-container">
                <div wire:offline>
                    This device is currently offline.
                </div>

                <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script>
                <div class="livecoinwatch-widget-5" lcw-base="USD" lcw-color-tx="#999999" lcw-marquee-1="coins"
                    lcw-marquee-2="movers" lcw-marquee-items="10"></div>
            </div>


        </div>

        <div class="bg-menuDark tf-container">
            <div class="tf-tab pt-12 mt-4">
                <div class="tab-slide">
                    <ul class="nav nav-tabs wallet-tabs" role="tablist">
                        <li class="item-slide-effect"></li>
                        <li class="nav-item active" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#history">Trade</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#market">Delivery
                                Report</button>
                        </li>


                    </ul>
                </div>
                <div class="tab-content pt-16 pb-16">
                    <div class="tab-pane fade active show" id="history" role="tabpanel">

                        <div href="" class="">

                            <div class="row sm-gutters">
                                <div class="col-md-12" style="background-color: #2d3136;">

                                    @livewire('trade-transaction-component')


                                </div>


                            </div>



                        </div>

                    </div>
                    <div class="tab-pane fade" id="market" role="tabpanel">
                        <ul>
                           @livewire('delivery-waiting-component')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-device>

    
    <x-device phone="true" tablet="true">
        <div class="pt-68 pb-8">
            <div class="bg-menuDark tf-container">
                <div class="row sm-gutters">
                    <div class="col-md-12">

                      @livewire('trade-transaction-component')


                    </div>


                </div>


            </div>
        </div>
    </x-device>






    @include('layouts.menu')


















    <script src="//unpkg.com/layui@2.9.10/dist/layui.js"></script>
    <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script>
    @include('layouts.footer')
    <script>
        $('tbody, .market-news ul').mCustomScrollbar({
            theme: 'minimal',
        });
    </script>

    <script>
        function updateCoinValue() {
            const selectedCoin = $('#coinSelector').val();

            $.get("/get-coin-price", {
                coin: selectedCoin
            }, function(data) {
                try {
                    const currentCoinValue = parseFloat(data.currentCoinValue);


                    if (!isNaN(currentCoinValue)) {
                        const roundedCoinValue = currentCoinValue.toFixed(4);
                        const clientBalance = parseFloat(data.clientBalance).toFixed(4);


                        $('#purchasePrice').val(roundedCoinValue);
                        $('#coinSymbol').text(roundedCoinValue);
                        $('#currentCoinLabel').text('Current ' + selectedCoin.charAt(0).toUpperCase() + selectedCoin
                            .slice(1) + ' Value:');
                        $('#coinLabel2').text(selectedCoin.charAt(0).toUpperCase() + selectedCoin.slice(1));


                        document.getElementById("convertedBalance").innerText = clientBalance;
                        document.getElementById("availableBalance").value = clientBalance;


                    } else {
                        console.error("Invalid currentCoinValue received from the API");
                    }
                } catch (error) {
                    console.error("Error processing API response:", error);
                }
            });
        }


        // Set a default coin value
        updateCoinValue();

        // Call the updateCoinValue function when the coin selection changes
        $('#coinSelector').change(function() {
            updateCoinValue();
        });
        setInterval(updateCoinValue, 4000);
    </script>



    <script>
        layui.use(['form'], function() {
            var form = layui.form;

            form.on('checkbox', function(data) {
                var checkboxElem = $(data.elem);

                if (data.elem.checked) {
                    $('input[name="trade_type"]').not(checkboxElem).prop('checked', false);
                    form.render('checkbox');
                }
            });
        });
    </script>

    <script>
        function setPurchaseAmount() {
            // Get the available balance
            var availableBalance = parseFloat(document.getElementById('availableBalance').value);

            // Set the purchase amount to the available balance
            document.getElementById('purchaseAmount').value = availableBalance;
        }
    </script>



    <style>
        .circle-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-color: #27DE81;
            color: #ffffff;
        }

        .button-container {
            display: flex;
            align-items: baseline;
            /* You can try using 'baseline' or 'center' */
            justify-content: space-between;
        }

        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

</body>

</html>
