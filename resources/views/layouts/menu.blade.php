 <div class="menubar-footer footer-fixed">
        <ul class="inner-bar">
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="{{url('/')}}">
                    <i class="icon icon-home2"></i>
                    Home
                </a>
            </li>
            <li class="{{ request()->is('trade') ? 'active' : '' }}">
                <a href="{{url('trade')}}">
                    <i class="icon icon-exchange"></i>
                    Trade
                </a>
            </li>
            <li class="{{ request()->is('market') ? 'active' : '' }}">
                <a href="{{url('market')}}">
                    <i class="icon icon-earn"></i>
                    Market
                </a>
            </li>
            <li class="{{ request()->is('wallet') ? 'active' : '' }}">
                <a href="{{url('wallet')}}">
                    <i class="icon icon-wallet"></i>
                    Wallet
                </a>
            </li>
        </ul>
    </div>