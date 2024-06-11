<div>
    <ul wire:poll.1s>
        @forelse ($trades as $data)
            <li class="mt-2">
                <div href="" class="coin-item style-1 gap-12 bg-surface">
                    <div class="content">
                        <div class="title">
                            <p class="mb-4 text-large text-light">Purchase Amount: ${{ $data->purchase_amount }} USD</p>
                            <span class="text-light">Purchase Price: ${{ $data->purchase_price }} USD</span>
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
        @empty
            <img class="mx-auto d-block" src="{{ url('assets/img/no-data.png') }}" style="width: 100px;" />
            <p class="text-center p-1 text-light">There are currently no active trades.</p>
        @endforelse
    </ul>
</div>
