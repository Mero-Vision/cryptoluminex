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
            <div class="pt-12 pb-12 mt-4">
                <h5><span class="text-primary">My Wallet</span>
                     {{-- - <a href="#" class="choose-account"
                        data-bs-toggle="modal" data-bs-target="#accountWallet2"><span class="dom-text">{{ $coin->name }}
                            Wallet </span>
                        &nbsp;<i class="icon-select-down"></i></a> --}}
                     </h5>
                <h1 class="mt-16"><a href="#">${{ $clientBalance }}</a></h1>
                <ul class="mt-16 grid-4 m--16">
                    <li>
                        <a href=""
                            class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <span class="box-round bg-surface d-flex justify-content-center align-items-center">
                                <i class="icon icon-way bx-sm"></i>
                            </span>
                            Send
                        </a>

                    </li>
                    <li>
                        <a href="{{url('wallet')}}" class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <span class="box-round bg-surface d-flex justify-content-center align-items-center"><i
                                    class="icon icon-way2 bx-sm"></i></span>
                            Receive
                        </a>
                    </li>
                    <li>
                        <a href="{{url('wallet')}}" class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <span class="box-round bg-surface d-flex justify-content-center align-items-center"><i class="icon icon-wallet bx-sm"></i></span>
                            Wallet
                        </a>
                    </li>
                    <li>
                        <a href="{{url('wallet')}}" class="tf-list-item d-flex flex-column gap-8 align-items-center">
                            <span class="box-round bg-surface d-flex justify-content-center align-items-center"><i class="bi bi-arrow-repeat bx-sm"></i></span>
                            Convert
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <h5>Market</h5>

                <div class="swiper tf-swiper swiper-wrapper-r mt-16" data-space-between="16" data-preview="2.8"
                    data-tablet="2.8" data-desktop="3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="" class="coin-box d-block">
                                <div class="coin-logo">
                                    <img src="assets/img/icons/market-1.jpg" alt="img" class="logo">
                                    <div class="title">
                                        <p>Bitcoin</p>
                                        <span>BTC</span>
                                    </div>
                                </div>
                                <div class="mt-8 mb-8 coin-chart">
                                    <div id="line-chart-1"></div>
                                </div>
                                <div class="coin-price d-flex justify-content-between">
                                    <span id="btc-price">$30780</span>
                                    <span id="btc-change" class="text-primary d-flex align-items-center gap-2"><i
                                            class="icon-select-up"></i> 11.75%</span>
                                </div>
                                <div class="blur bg1"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="" class="coin-box d-block">
                                <div class="coin-logo">
                                    <img src="assets/img/icons/USDT.png" alt="img" class="logo">
                                    <div class="title">
                                        <p>Tether</p>
                                        <span>USDT</span>
                                    </div>
                                </div>
                                <div class="mt-8 mb-8 coin-chart">
                                    <div id="line-chart-2"></div>
                                </div>
                                <div class="coin-price d-flex justify-content-between">
                                    <span id="usdt-price">$270.10</span>
                                    <span id="usdt-change" class="text-primary d-flex align-items-center gap-2"><i
                                            class="icon-select-up"></i> 21.59%</span>
                                </div>
                                <div class="blur bg2"></div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="" class="coin-box d-block">
                                <div class="coin-logo">
                                    <img src="assets/img/icons/coin-3.jpg" alt="img" class="logo">
                                    <div class="title">
                                        <p>Ethereum</p>
                                        <span>ETH</span>
                                    </div>
                                </div>
                                <div class="mt-8 mb-8 coin-chart">
                                    <div id="line-chart-3"></div>
                                </div>
                                <div class="coin-price d-flex justify-content-between">
                                    <span id="eth-price">$1478.10</span>
                                    <span id="eth-change" class="text-primary d-flex align-items-center gap-2"><i
                                            class="icon-select-up"></i> 4.75%</span>
                                </div>
                                <div class="blur bg3"></div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-menuDark tf-container">
            <div class="pt-12 pb-12 mt-4">
                <div class="wrap-filter-swiper">
                    <h5><a href="cryptex-rating.html" class="cryptex-rating"><i class="icon-star"></i>Cryptex
                            Rating</a></h5>
                    <!-- <div class="swiper swiper-wrapper-r market-swiper" data-space-between="20" data-preview="auto"> -->
                    <div class="swiper-wrapper1 menu-tab-v3 mt-12" role="tablist">
                        <div class="swiper-slide1 nav-link active" data-bs-toggle="tab" data-bs-target="#favorites"
                            role="tab" aria-controls="favorites" aria-selected="true">
                            Favorites
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
                        <ul class="mt-16">
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

    <!-- Account -->
    <div class="modal fade action-sheet" id="accountWallet2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Wallet</span>
                    <span class="icon-cancel" data-bs-dismiss="modal"></span>
                </div>
                <ul class="mt-20 pb-16">

                    <form id="walletForm" action="{{ url('/') }}" method="get">
                        <li data-bs-dismiss="modal" onclick="submitForm('USDT')">
                            <div
                                class="d-flex justify-content-between align-items-center gap-8 text-large item-check active dom-value">
                                USDT Wallet <i class="icon icon-check-circle"></i>
                            </div>
                        </li>

                        <li class="mt-4" data-bs-dismiss="modal" onclick="submitForm('BTC')">
                            <div class="d-flex justify-content-between gap-8 text-large item-check dom-value">
                                BTC Wallet <i class="icon icon-check-circle" name="wallet"></i>
                            </div>
                        </li>
                        <li class="mt-4" data-bs-dismiss="modal" onclick="submitForm('ETH')">
                            <div class="d-flex justify-content-between gap-8 text-large item-check dom-value">
                                ETH Wallet <i class="icon icon-check-circle" name="wallet"></i>
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function submitForm(walletType) {
            // Create a hidden input to hold the selected wallet type
            var form = document.getElementById('walletForm');
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'wallet';
            input.value = walletType;

            // Append the input to the form and submit the form
            form.appendChild(input);
            form.submit();
        }
    </script>



    <!-- notification -->
    <div class="modal fade modalRight" id="notification">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="header fixed-top bg-surface d-flex justify-content-center align-items-center">
                    <span class="left" data-bs-dismiss="modal" aria-hidden="true"><i
                            class="icon-left-btn"></i></span>
                    <h3>Notification</h3>
                </div>
                <div class="overflow-auto pt-45 pb-16">
                    <div class="tf-container">
                        <ul class="mt-12">
                            <li>
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt d-flex">
                                        <p class="text-button fw-6">Cointex to just tick size and trading amount
                                            precision of spots/margins and perpetual swaps</p>
                                        <i class="dot-lg bg-primary"></i>
                                    </div>
                                    <span class="d-block mt-8">5 minutes ago</span>
                                </a>
                            </li>
                            <li class="mt-12">
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt d-flex">
                                        <p class="text-button fw-6">Cointex to adjust components of several indexes</p>
                                        <i class="dot-lg bg-primary"></i>
                                    </div>
                                    <span class="d-block mt-8">5 minutes ago</span>
                                </a>
                            </li>
                            <li class="mt-12">
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt d-flex">
                                        <p class="text-button fw-6">Cointex to just tick size and trading amount
                                            precision of spots/margins and perpetual swaps</p>
                                        <i class="dot-lg bg-primary"></i>
                                    </div>
                                    <span class="d-block mt-8">5 minutes ago</span>
                                </a>
                            </li>
                            <li class="mt-12">
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt">
                                        <p class="text-button fw-6 text-secondary">Cointex to adjust components of
                                            several indexes</p>
                                    </div>
                                    <span class="d-block mt-8 text-secondary">1 day ago</span>
                                </a>
                            </li>
                            <li class="mt-12">
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt">
                                        <p class="text-button fw-6 text-secondary">Cryptex wallet uses Achain network
                                            service</p>
                                    </div>
                                    <span class="d-block mt-8 text-secondary">1 day ago</span>
                                </a>
                            </li>
                            <li class="mt-12">
                                <a href="#" class="noti-item bg-menuDark">
                                    <div class="pb-8 line-bt">
                                        <p class="text-button fw-6 text-secondary">Cointex to adjust components of
                                            several indexes</p>
                                    </div>
                                    <span class="d-block mt-8 text-secondary">1 day ago</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>











    @include('layouts.footer')

    <script>
        async function fetchCryptoData() {
            const response = await fetch('https://api.coincap.io/v2/assets');
            const data = await response.json();
            return data.data;
        }

        function updateCryptoPrices() {
            fetchCryptoData().then(cryptoData => {
                const btc = cryptoData.find(coin => coin.id === 'bitcoin');
                const eth = cryptoData.find(coin => coin.id === 'ethereum');
                const usdt = cryptoData.find(coin => coin.id === 'tether');

                document.getElementById('btc-price').textContent = `$${parseFloat(btc.priceUsd).toFixed(2)}`;
                document.getElementById('btc-change').textContent =
                    `${parseFloat(btc.changePercent24Hr).toFixed(2)}%`;
                document.getElementById('btc-change').classList.toggle('text-primary', btc.changePercent24Hr > 0);
                document.getElementById('btc-change').classList.toggle('text-danger', btc.changePercent24Hr < 0);

                document.getElementById('eth-price').textContent = `$${parseFloat(eth.priceUsd).toFixed(2)}`;
                document.getElementById('eth-change').textContent =
                    `${parseFloat(eth.changePercent24Hr).toFixed(2)}%`;
                document.getElementById('eth-change').classList.toggle('text-primary', eth.changePercent24Hr > 0);
                document.getElementById('eth-change').classList.toggle('text-danger', eth.changePercent24Hr < 0);

                document.getElementById('usdt-price').textContent = `$${parseFloat(usdt.priceUsd).toFixed(2)}`;
                document.getElementById('usdt-change').textContent =
                    `${parseFloat(usdt.changePercent24Hr).toFixed(2)}%`;
                document.getElementById('usdt-change').classList.toggle('text-primary', usdt.changePercent24Hr > 0);
                document.getElementById('usdt-change').classList.toggle('text-danger', usdt.changePercent24Hr < 0);
            });
        }

        setInterval(updateCryptoPrices, 1000);
        updateCryptoPrices();
    </script>

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
                'tether': 'USDT'
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
