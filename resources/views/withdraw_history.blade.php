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

    <div class="pt-68 pb-8">
        <div class="bg-menuDark tf-container">
            <h5 class="py-3">Withdraw History</h5>
        </div>
    </div>

    <div class="pt-10">
        <div class="bg-menuDark tf-container">

            <ul class="pt-2">
                @forelse ($withdrawRecords as $data)
                    <li class="my-2">
                        <div href="" class="coin-item style-1 gap-12 bg-surface">
                            <div class="content">
                                <div class="title">
                                    <p class="mb-4 text-light">Withdraw Amount: ${{ $data->amount }}
                                        USD</p>
                                    <span class="text-light">Address: {{ $data->client_wallet_address }}</span>
                                </div>
                                <div class="box-price">
                                    <p class="mb-4 text-light">Coin Type: {{ $data->coin_type }}
                                    </p>
                                    {{-- <p class="text-end text-light">Coin:{{ $data->coin }}</p> --}}
                                    <p class="text-end text-light">
                                        Status: {{ $data->status }}

                                    </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>




                @empty
                    <img class="mx-auto d-block" src="{{ url('assets/img/no-data.png') }}" style="width: 80px;" />
                    <h5 class="text-center p-2">You have no withdrawal history!</h5>
                @endforelse
            </ul><br>
            {{ $withdrawRecords->links('pagination::bootstrap-5') }}
            <br>
        </div>


    </div>


    @include('layouts.menu')













    @include('layouts.footer')






</body>

</html>
