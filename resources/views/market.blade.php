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
                            Popular Coins
                        </div>

                    </div>
                    <!-- </div> -->
                </div>
                <div class="tab-content mt-8">
                    <div class="tab-pane fade show active" id="favorites" role="tabpanel">
                        <div class="d-flex justify-content-between">
                            Name
                            <p class="d-flex gap-8">
                                <span>Last price</span>
                                <span>Change</span>
                            </p>
                        </div>
                        <ul class="mt-16" style="height: 400px; overflow-y: auto;">
                            <li>
                                <a href="#" class="coin-item style-2 gap-12">
                                    <img src="assets/img/icons/market-1.jpg" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-button">BTC</p>
                                            <span id="BTC-value" class="text-secondary">Loading..</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-12">
                                            <span id="BTC-price" class="text-small">Loading..</span>
                                            <span id="BTC-change" class="coin-btn decrease">Loading..</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="#" class="coin-item style-2 gap-12">
                                    <img src="assets/img/icons/coin-3.jpg" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-button">ETH</p>
                                            <span id="ETH-value" class="text-secondary">Loading..</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-12">
                                            <span id="ETH-price" class="text-small">Loading..</span>
                                            <span id="ETH-change" class="coin-btn increase">Loading..</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-16">
                                <a href="#" class="coin-item style-2 gap-12">
                                    <img src="assets/img/icons/USDT.png" alt="img" class="img">
                                    <div class="content">
                                        <div class="title">
                                            <p class="mb-4 text-button">USDT</p>
                                            <span id="USDT-value" class="text-secondary">Loading..</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-12">
                                            <span id="USDT-price" class="text-small">Loading..</span>
                                            <span id="USDT-change" class="coin-btn decrease">Loading..</span>
                                        </div>
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
