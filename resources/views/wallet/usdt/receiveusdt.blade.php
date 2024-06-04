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
    <script>
        function copyToClipboard() {
            // Get the input field
            var walletAddressInput = document.getElementById("walletAddress");

            // Select the text in the input field
            walletAddressInput.select();
            walletAddressInput.setSelectionRange(0, 99999); /* For mobile devices */

            // Copy the text to the clipboard
            document.execCommand("copy");

            // Deselect the input field
            walletAddressInput.setSelectionRange(0, 0);
        }
    </script>

    <script>
        function copyToClipboard2() {
            // Get the input field
            var walletAddressInput = document.getElementById("walletAddress2");

            // Select the text in the input field
            walletAddressInput.select();
            walletAddressInput.setSelectionRange(0, 99999); /* For mobile devices */

            // Copy the text to the clipboard
            document.execCommand("copy");

            // Deselect the input field
            walletAddressInput.setSelectionRange(0, 0);
        }
    </script>


    <div class="header-style2 fixed-top bg-menuDark">
        @include('layouts.top_nav')
    </div>

    <div class="pt-68 pb-80">
        <div class="bg-menuDark tf-container">





            <div class="bg-menuDark tf-container">
                <div class="tf-tab pt-12 mt-4">
                    <div class="tab-slide">
                        <ul class="nav nav-tabs wallet-tabs" role="tablist">
                            <li class="item-slide-effect"></li>
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#history">ERC20</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#market">TRC20</button>
                            </li>


                        </ul>
                    </div>
                    <div class="tab-content pt-16 pb-16">
                        <div class="tab-pane fade active show" id="history" role="tabpanel">

                            <div class="style-1 gap-12 bg-surface">

                                <div class="row p-5">
                                    <div class="col-md-12 settings">
                                        <div class="cryp-icon">
                                            <img src="{{ url('assets/img/icon/USDT.png') }}" class='mt-10'
                                                alt="" style="width: 50px">
                                        </div>
                                        <h5 class="text-center text-light m-2">ERC20 USDT Coin</h5>

                                        <div class="visible-print text-center">
                                            @if ($coinURL->erc_usdt > 0)
                                                {!! QrCode::size(100)->generate($coinURL->erc_usdt ?? '') !!}
                                            @else
                                                <p>No QR code available</p>
                                            @endif



                                        </div>

                                        <div class="stats mt-3">
                                            <span class="text-light">ERC20 USDT Wallet Address</span>

                                            <div class="input-group mb-3 mt-1">
                                                <input id="walletAddress" type="text"
                                                    class="clear-ip value_input ip-style2"
                                                    placeholder="ERC20 USDT Wallet Address"
                                                    value="{{ $coinURL->erc_usdt ?? '' }}" readonly>

                                            </div>



                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="text-center icon-container">
                                                        <a href="{{ url('wallet/usdt') }}" class="circle-button mb-1">
                                                            <i class='bx bx-arrow-back bx-sm'></i>
                                                        </a>
                                                        <br>

                                                        <a href="{{ url('wallet/usdt') }}" class="text-light">Return
                                                            Back</a>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="text-center icon-container">
                                                        <a href="#" class="circle-button mb-1"
                                                            onclick="copyToClipboard()">
                                                            <i class='bx bx-copy-alt bx-sm'></i>
                                                        </a>
                                                        <br>

                                                        <a href="#" class="text-light"
                                                            onclick="copyToClipboard()">Copy</a>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>


                                    </div>





                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="market" role="tabpanel">

                            <div class="style-1 gap-12 bg-surface">

                                <div class="row p-5">
                                    <div class="col-md-12 settings">
                                        <div class="cryp-icon">
                                            <img src="{{ url('assets/img/icon/USDT.png') }}" class='mt-10'
                                                alt="" style="width: 50px">
                                        </div>
                                        <h5 class="text-center text-light m-2">TRC20 USDT Coin</h5>

                                        <div class="visible-print text-center">
                                            @if ($coinURL->trc_usdt > 0)
                                                {!! QrCode::size(100)->generate($coinURL->trc_usdt ?? null) !!}
                                            @else
                                                <p>No QR code available</p>
                                            @endif



                                        </div>

                                        <div class="stats mt-3">
                                            <span class="text-light">TRC20 USDT Wallet Address</span>

                                            <div class="input-group mb-3 mt-1">
                                                <input id="walletAddress2" type="text"
                                                    class="clear-ip value_input ip-style2"
                                                    placeholder="ERC20 USDT Wallet Address"
                                                    value="{{ $coinURL->trc_usdt ?? '' }}" readonly>

                                            </div>



                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="text-center icon-container">
                                                        <a href="{{ url('wallet/usdt') }}" class="circle-button mb-1">
                                                            <i class='bx bx-arrow-back bx-sm'></i>
                                                        </a>
                                                        <br>

                                                        <a href="{{ url('wallet/usdt') }}" class="text-light">Return
                                                            Back</a>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="text-center icon-container">
                                                        <a href="#" class="circle-button mb-1"
                                                            onclick="copyToClipboard2()">
                                                            <i class='bx bx-copy-alt bx-sm'></i>
                                                        </a>
                                                        <br>

                                                        <a href="#" class="text-light"
                                                            onclick="copyToClipboard2()">Copy</a>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>


                                    </div>





                                </div>

                            </div>


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
            background-color: #979aa3;
            color: #ffffff;
        }
    </style>




</body>

</html>
