<div id="tradeFormContainer" style="width: 100%; padding: 20px; border-radius: 10px;  color: white; box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; align-items: center; overflow-y: auto;">



    <form action="{{ url('trade-transaction') }}" method="POST" style="width: 100%; color: white;">
        @csrf

        <p style="font-weight: bold; margin-bottom: 10px;">Select Coin</p>
        <div class="input-group" style="margin-bottom: 10px;">
            <select class="form-select form-control" id="coinSelector" wire:model.live="coin" name="coin"
                onchange="updateCoinValue()"
                style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #34495e; color: white;">
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
                style="flex: 1; padding: 10px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; background-color: #34495e; color: white; height: 40px;" />
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
                style="flex: 1; padding: 10px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; background-color: #34495e; color: white; height: 40px;" />
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
                        style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; background-color: #34495e; color: white;">
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
    <p style="font-weight: bold; margin-bottom: 10px;">Trade Type</p>
    <div class="input-group" style="padding-top: 10px; display: flex; flex-wrap: nowrap;">
        <div style="flex: 1;">
            <input type="checkbox" name="trade_type" value="bullish" title="Bullish" lay-skin="tag"
                style="margin-right: 10px; color: white;"> Bullish
        </div>
        <div style="flex: 1;">
            <input type="checkbox" name="trade_type" value="bearish" title="Bearish" lay-skin="tag"
                style="margin-left: 20px; color: white;"> Bearish
        </div>
    </div>
    @error('trade_type')
        <p class="text-danger" style="color: red; margin-top: 10px;">{{ $message }}</p>
    @enderror
</div>

        </div>

        <input type="hidden" wire:model="availabe_balance" id="availableBalance" name="available_balance" />
        <p style="font-weight: bold; margin-top: 20px;">Available: <span id="convertedBalance" style="color: white;">
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
