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
            <h5 class="py-3">Trade History</h5>

            <ul>
                @forelse ($finishedTrades as $data)
                    <li class="my-2">
                        <div href="" class="coin-item style-1 gap-12 bg-surface">
                            <div class="content">
                                <div class="title">
                                    <p class="mb-4 text-light">Purchase Amount: ${{ $data->purchase_amount }}
                                        USD</p>
                                    <span class="text-light">Purchase Price: {{ $data->purchase_amount }}</span>
                                </div>
                                <div class="box-price">
                                    <p class=" mb-4 text-light">Trade Type:
                                        @if ($data->trade_type == 'bullish')
                                            <span class="bg-success p-1 rounded text-capitalize">
                                                {{ $data->trade_type }}</span>
                                        @else
                                            <span
                                                class="bg-danger p-1 rounded text-capitalize">{{ $data->trade_type }}</span>
                                        @endif
                                        </span>
                                    </p>
                                    {{-- <p class="text-end text-light">Coin:{{ $data->coin }}</p> --}}
                                    <p class="text-end text-light">
                                        Status:
                                        <span
                                            class="@if ($data->trade_status == 'loss') badge bg-danger rounded text-light @elseif ($data->trade_status == 'profit') badge bg-success rounded text-light @endif">
                                            {{ $data->trade_status }}
                                        </span>
                                    </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>




                @empty
                @endforelse
            </ul><br>
            {{ $finishedTrades->links('pagination::bootstrap-5') }}
            <br>
        </div>


    </div>


    @include('layouts.menu')













    @include('layouts.footer')






</body>

</html>
