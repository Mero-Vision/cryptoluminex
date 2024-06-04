<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/x-icon" href="{{url('assets/img/icon.ico')}}">
<head>


    @include('layouts.header')
    @livewireStyles()

</head>

<body id="dark">
    @include('layouts.nav')


    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table mt-3" wire:poll.5s>
                <thead>
                    <tr>
                        <th class="text-light">ID</th>
                        <th class="text-light">Withdraw Amount</th>
                        <th class="text-light">Wallet Address</th>
                        <th class="text-light">Coin Type</th>
                        <th class="text-light">Status</th>
                        <th class="text-light">Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($withdrawRecords as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{$data->client_wallet_address}}</td>
                            <td>{{$data->coin_type}}</td>
                            <td>{{$data->status}}</td>
                            <td>{{$data->created_at->diffForHumans()}}</td>


                        </tr>
                    @empty
                    @endforelse


                </tbody>


            </table>
            {{ $withdrawRecords->links('pagination::bootstrap-5') }}
        </div>
    </div>





    @include('layouts.footer')
    @livewireScripts()

</body>

</html>
