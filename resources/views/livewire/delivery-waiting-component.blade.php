<div>
    <ul wire:poll.1s>
        @forelse ($trades as $data)
            <li>
                <div href="" class="coin-item style-1 gap-12 bg-surface">
                    <div class="content">
                        <div class="title">
                            <p class="mb-4 text-large text-light">Purchase Amount: ${{ $data->purchase_amount }} USD</p>
                            <span class="text-light">Purchase Price: {{ $data->purchase_amount }}</span>
                        </div>
                        <div class="box-price">
                            <p class="text-small mb-4 text-light">Trade Type: 
                                    @if ($data->trade_type == 'bullish')
                                    <span class="bg-success p-1 rounded text-capitalize">
                                       {{ $data->trade_type }}</span>
                                    @else
                                        <span class="bg-danger p-1 rounded text-capitalize">{{ $data->trade_type }}</span>
                                    @endif
                                </span>
                            </p>
                            {{-- <p class="text-end text-light">Coin:{{ $data->coin }}</p> --}}
                            <p class="text-end text-light">Time Spent: {{ $data->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </li>


           
    </ul>
@empty
    @endforelse












   
</div>
