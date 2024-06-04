<div id="tradeFormContainer"
    style="width: 100%; padding: 20px; border-radius: 10px;  color: white; box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; align-items: center; overflow-y: auto;">



    <form action="{{ url('trade-transaction') }}" method="POST" style="width: 100%; color: white;">
        @csrf
        <style>
            .custom-select {
                position: relative;
                width: 100%;
            }

            .form-select {
                width: 100%;
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
                background-color: #34495e;
                color: white;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            .custom-select::after {
                content: '';
                position: absolute;
                top: calc(50% - 5px);
                right: 10px;
                border: solid white;
                border-width: 0 1px 1px 0;
                padding: 3px;
                transform: rotate(45deg);
                pointer-events: none;
            }

            /* For Mozilla Firefox */
            @supports (-moz-appearance: none) {
                .custom-select::after {
                    top: calc(50% - 8px);
                }
            }
        </style>

        <p style="font-weight: bold; margin-bottom: 10px;">Select Coin</p>
        <div class="custom-select" style="margin-bottom: 10px;">
            <select class="form-select" id="coinSelector" wire:model.live="coin" name="coin"
                onchange="updateCoinValue()"
                style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #2D3136; color: white;">
                <option value="bitcoin">Bitcoin</option>
                <option value="ethereum">Ethereum</option>
            </select>

        </div>
        @error('coin')
            <p class="text-danger" style="color: red; margin-bottom: 20px;">{{ $message }}</p>
        @enderror

        <div style="margin-bottom: 10px; display: flex; align-items: center;">
            <input type="text" id="purchasePrice" wire:model="purchase_price" name="purchase_price"
                placeholder="Purchase Price"
                style="flex: 1; padding: 10px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; background-color: #2D3136; color: white; height: 40px;" />
            <div
                style="display: inline-block; padding: 10px; border: 1px solid #ccc; border-radius: 0 5px 5px 0; background-color: #34495e; color: white; height: 40px;">
                <span id="coinLabel2">USDT</span>
            </div>
        </div>
        @error('purchase_price')
            <p class="text-danger" style="color: red; margin-bottom: 10px;">{{ $message }}</p>
        @enderror

        <div class="row" style="margin-bottom: 5px;">
            <div class="col">
                <p id="coinSymbol">Loading..</p>
            </div>
        </div>


        <div style="margin-bottom: 20px; display: flex; align-items: center;">
            <input type="text" id="purchaseAmount" name="purchase_amount" placeholder="Purchase Amount"
                style="flex: 1; padding: 10px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; background-color: #2D3136; color: white; height: 40px;" />
            <span id="maxButton" onclick="setPurchaseAmount()"
                style="display: inline-block; padding: 10px; border: 1px solid #ccc; border-radius: 0 5px 5px 0; background-color: #34495e; color: white; cursor: pointer; text-align: center; height: 40px;">
                Max
            </span>
        </div>


        @error('purchase_amount')
            <p class="text-danger" style="color: red; margin-bottom: 20px;">{{ $message }}</p>
        @enderror

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-6 col-sm-6" style="margin-bottom: 10px;">
                <p style="font-weight: bold; margin-bottom: 10px;">Delivery Time</p>
                <div class="input-group">
                    <select class="form-select form-control" name="delivery_time"
                        style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #2D3136; color: white;">
                        @foreach ($deliveryTime as $data)
                            @php
                                $deliveryTimeString =
                                    $data->delivery_time == 43200 ? '12h' : $data->delivery_time . 's';
                            @endphp
                            <option value="{{ $data->delivery_time }}">
                                {{ $deliveryTimeString }} => {{ $data->margin_percent }}%
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 layui-form" wire:ignore style="margin-bottom: 10px;">
                <p style="font-weight: bold; margin-bottom: 0px;">Trade Type</p>
                <div class="input-group" style="padding-top: 10px; display: flex; flex-wrap: nowrap;">
                    <style>
                        .container {
                            display: flex;
                            align-items: center;
                            padding: 7px 20px;
                            margin-right: 5px;
                            cursor: pointer;
                            color: white;
                            border-radius: 5px;
                            transition: background-color 0.3s, opacity 0.3s;
                        }

                        .container.bullish {
                            background-color: green;
                        }

                        .container.bearish {
                            background-color: red;
                        }

                        .container.selected {
                            opacity: 0.8;
                        }

                        .radio-input {
                            display: none;
                        }

                        .custom-radio {
                            display: inline-block;
                            width: 16px;
                            height: 16px;
                            margin-right: 10px;
                            border-radius: 50%;
                            border: 2px solid rgb(76, 169, 240);
                            position: relative;
                        }

                        .custom-radio::before {
                            content: '';
                            display: block;
                            width: 10px;
                            height: 10px;
                            border-radius: 50%;
                            background-color: white;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            opacity: 0;
                            transition: opacity 0.3s;
                        }

                        .radio-input:checked+.custom-radio::before {
                            opacity: 1;
                        }
                    </style>


                    <div class="container bullish rounded" onclick="selectTradeType('bullish')">
                        <input type="radio" id="bullish" name="trade_type" value="bullish" class="radio-input">
                        Bullish
                    </div>
                    <div class="container bearish rounded" onclick="selectTradeType('bearish')">
                        <input type="radio" id="bearish" name="trade_type" value="bearish" class="radio-input">
                        Bearish
                    </div>

                    <script>
                        function selectTradeType(type) {
                            // Remove selected class from all containers
                            document.querySelectorAll('.container').forEach(container => {
                                container.classList.remove('selected');
                            });

                            // Toggle selected class on the clicked container
                            const clickedContainer = document.querySelector(`.container.${type}`);
                            clickedContainer.classList.toggle('selected');

                            // Check the corresponding radio input
                            const radioInput = document.getElementById(type);
                            radioInput.checked = true;
                        }
                    </script>



                    @error('trade_type')
                        <p class="text-danger" style="color: red; margin-top: 10px;">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <input type="hidden" wire:model="availabe_balance" id="availableBalance" name="available_balance" />
            <p style="font-weight: bold; margin-top: 20px;">Available: <span id="convertedBalance"
                    style="color: white;">
                    @if ($clientBalance)
                        {{ $clientBalance->balance }}
                    @else
                        0.00000
                    @endif
                </span>
            </p>

            <div class="button-container" style="text-align: center; margin-top: 5px;">
                <button type="submit" class="btn btn-primary" id="tradeButton"
                    style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #2980b9; color: white; cursor: pointer;">Trade</button>
                <div class="text-center icon-container mx-1" style="display: inline-block; margin-left: 10px;">
                    {{-- <a href="{{ url('delivery-report') }}" class="circle-button" style="text-decoration: none;">
                    <i class='bx bxs-report bx-sm' style="font-size: 24px; color: #2980b9;"></i>
                </a> --}}
                </div>
            </div>
    </form>
    <script>
        function adjustFormHeight() {
            const formContainer = document.getElementById('tradeFormContainer');
            const footer = document.querySelector('.menubar-footer');
            const availableHeight = window.innerHeight - footer.offsetHeight - 10;
            formContainer.style.height = availableHeight - formContainer.offsetTop + 'px';
        }

        window.addEventListener('resize', adjustFormHeight);
        window.addEventListener('load', adjustFormHeight);
    </script>
</div>
