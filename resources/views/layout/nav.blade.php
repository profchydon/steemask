<?php

    $profile = json_decode($user['account']['json_metadata'] , TRUE);

    $profile_image = $profile['profile']['profile_image'];

    $avatar = "https://steemitimages.com/u/".$user['account']['name']."/avatar";

 ?>

<div class="fixed-tab">

  <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

    @if (isset($coinmarketcap))

        <li>Market Capitalization : $265,685,696.03</li>
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

        <a href="#" class="navbar-brand">

          <!-- <img src="" class="img-responsive logo" alt="SteemAnswer"> -->
          <h4 class="navbar-text-logo">SteemAsk</h4>

        </a>

      </div>

      <div class="collapse navbar-collapse" id = "bs-One-navbar-collapse-1"><!--This creates a collapsed navbar when screen is below 768px-->

          <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

            @if (isset($user))

                <img src= {{ $avatar }} alt="" class="avatar img-responsive">

                <h5 class="welcome"> {{ $user['account']['name'] }}</h5>

            @endif

          </ul>

      </div>
    </div>

</nav>

<div class="fixed-downtab">

  <ul style="margin-right: 0px;" class="nav navbar-nav">

    <li> <a href="http://signup.steemit.com" class="signup-a">Trending</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Hot</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">New</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Promoted</a> </li>

  </ul>

  <ul style="margin-right: 0px;" class="nav navbar-nav navbar-right">

    <li> <a href="http://signup.steemit.com" class="signup-a">Marketplace</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Check Payout</a> </li>
    <li> <a href="https://v2.steemconnect.com/oauth2/authorize?client_id=steemask.app&redirect_uri=http://localhost:8000/callback&scope=login,vote,comment,comment_delete,comment_options,custom_json,claim_reward_balance,offline" class="signup-a">Login</a> </li>
    <li> <a href="http://signup.steemit.com" class="signup-a">Register</a> </li>

  </ul>

</div>

<?php



 ?>
