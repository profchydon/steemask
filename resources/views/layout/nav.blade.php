
<div class="fixed-tab">

  <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

    @if (isset($coinmarketcap))

        <li>Market Capitalization : ${{ $coinmarketcap['marketcap']['total_market_cap_usd']  }}</li>
        <li>{{ $coinmarketcap['bitcoin']['name'] }} : ${{ $coinmarketcap['bitcoin']['price_usd']  }}</li>
        <li>{{ $coinmarketcap['eth']['name'] }} : ${{ $coinmarketcap['eth']['price_usd']  }}</li>
        <li>{{ $coinmarketcap['steem']['name'] }} : ${{ $coinmarketcap['steem']['price_usd']  }}</li>
        <li>{{ $coinmarketcap['sbd']['name'] }} : ${{ $coinmarketcap['sbd']['price_usd']  }}</li>
        <li>{{ $coinmarketcap['eos']['name'] }} : ${{ $coinmarketcap['eos']['price_usd']  }}</li>
        <li>{{ $coinmarketcap['golos']['name'] }} : ${{ $coinmarketcap['golos']['price_usd']  }}</li>

    @else

        <li>Market Capitalization : $265,685,696.03</li>
        <li>{{ $bitcoin['name'] }} : ${{ $bitcoin['price_usd']  }}</li>
        <li>{{ $eth['name'] }} : ${{ $eth['price_usd'] }}</li>
        <li>{{ $steem['name'] }} : ${{ $steem['price_usd'] }}</li>
        <li>{{ $sbd['name'] }} : ${{ $sbd['price_usd'] }}</li>
        <li>{{ $eos['name'] }} : ${{ $eos['price_usd'] }}</li>
        <li>{{ $golos['name'] }} : ${{ $golos['price_usd'] }}</li>

    @endif

  </ul>

</div>

<nav class="navbar navbar-inverse navbar-static-top">

    <div class="row">
      <div class="navbar-header"><!-- Navbar header holds the webpage logo and the collapse button-->

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-One-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a href="/" class="navbar-brand">

          <img src="/img/logo_beta.png" class="img-responsive logo" alt="SteemAnswer">

        </a>

      </div>

      <div class="collapse navbar-collapse" id = "bs-One-navbar-collapse-1"><!--This creates a collapsed navbar when screen is below 768px-->

          <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

            @if (isset($_SESSION['username']))

                <img src= {{ $_SESSION['avatar'] }} alt="" class="avatar img-responsive">

                <h5 class="welcome"> {{ $_SESSION['username'] }}</h5>


            @endif

          </ul>

      </div>
    </div>

</nav>

<div class="fixed-downtab">

  <ul style="margin-right: 0px;" class="nav navbar-nav">

    <li> <a href="http://signup.steemit.com" class="signup-a">Trending</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">New</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Category</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Unaswered</a> </li>

  </ul>

  <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

    <li> <a href="http://signup.steemit.com" class="signup-a">Marketplace</a> </li>

    @if (isset($_SESSION['username']))

      <li> <a href="/payout" class="signup-a">Check Payout</a> </li>
      <li> <a href="/profile" class="signup-a">Profile</a> </li>
      <li> <a href="/logout" class="signup-a">Logout</a> </li>

    @else

    <li> <a href="https://v2.steemconnect.com/oauth2/authorize?client_id=steemask.app&redirect_uri=http://localhost:8000/callback&scope=login,vote,comment,delete_comment,comment_options,custom_json,claim_reward_balance,offline" class="signup-a">Login</a> </li>

    <!-- <li> <a href="/login" class="signup-a">Login</a> </li> -->

    <li> <a href="http://signup.steemit.com" class="signup-a">Register</a> </li>

    @endif

  </ul>

</div>

<?php



 ?>
