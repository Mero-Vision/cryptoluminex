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
            <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script>
            <div class="livecoinwatch-widget-5" lcw-base="USD" lcw-color-tx="#999999" lcw-marquee-1="coins"
                lcw-marquee-2="movers" lcw-marquee-items="10"></div>
        </div>

        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <div class="wrap-filter-swiper">

                    <div class="swiper-wrapper1 menu-tab-v3 mt-12" role="tablist">
                        <div class="swiper-slide1 nav-link active" data-bs-toggle="tab" data-bs-target="#favorites"
                            role="tab" aria-controls="favorites" aria-selected="true">
                             Coins Analytics
                        </div>

                    </div>
                    <!-- </div> -->
                </div>
                <div class="col-md-12">

                <div class="main-chart mb15 dark-variant">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_e8033"></div>
                        <script src="https://s3.tradingview.com/tv.js"></script>
                        <script>
                            new TradingView.widget({
                                "width": "100%",
                                "height": 550,
                                "symbol": "BITSTAMP:BTCUSD",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "dark",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "withdateranges": true,
                                "hide_side_toolbar": false,
                                "allow_symbol_change": true,
                                "show_popup_button": true,
                                "popup_width": "1000",
                                "popup_height": "650",
                                "container_id": "tradingview_e8033"
                            });
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>





            </div>
            </div>
        </div>
    </div>

    @include('layouts.menu')













    @include('layouts.footer')



    <script>
        async function fetchCoinData() {
            try {
                const response = await fetch('https://api.coincap.io/v2/assets');
                const data = await response.json();
                return data.data;
            } catch (error) {
                console.error('Error fetching coin data:', error);
            }
        }

        function updateCoinData(coins) {
            const coinMap = {
                'bitcoin': 'BTC',
                'ethereum': 'ETH',
                'tether': 'USDT',
                'binance-coin': 'BNB',
                'xrp': 'XRP',
                'solana': 'SOL' // Added SOL to the map
            };

            coins.forEach(coin => {
                const symbol = coinMap[coin.id];
                if (symbol) {
                    const valueElement = document.getElementById(`${symbol}-value`);
                    const priceElement = document.getElementById(`${symbol}-price`);
                    const changeElement = document.getElementById(`${symbol}-change`);

                    // Update elements with market value of the coin
                    valueElement.textContent = `$${(parseFloat(coin.priceUsd)).toFixed(2)}`;
                    priceElement.textContent = `$${parseFloat(coin.priceUsd).toFixed(2)}`;
                    const changePercent = parseFloat(coin.changePercent24Hr).toFixed(2);
                    changeElement.textContent = `${changePercent}%`;
                    changeElement.classList.toggle('increase', changePercent > 0);
                    changeElement.classList.toggle('decrease', changePercent < 0);
                }
            });
        }

        async function updatePrices() {
            const coins = await fetchCoinData();
            updateCoinData(coins);
        }

        setInterval(updatePrices, 1000);
    </script>

</body>

</html>
