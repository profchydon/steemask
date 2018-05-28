  <section class="col-md-3">

      <div class="content-right">

        <h5 class="apps"> <b>About</b> </h5>
        <p> {{ $_SESSION['about'] }} </p>

        <hr>

        <h5> <b>Location</b> </h5>
        <p> {{ $_SESSION['location'] }} </p>

        <hr>

        <h5> <b>Website</b> </h5>
        <a href="{{ $_SESSION['website'] }}"> {{ $_SESSION['website'] }} </a>

        <hr>

        <h5> <b>Date Joined</b> </h5>
        <p>July, 2017</p>

      </div>

      <div class="content-right">

        <h5 class="apps"> <b>Approved Apps</b> </h5>

        @if(isset($_SESSION['app']) && !empty($_SESSION['app']))

            @foreach ($_SESSION['app'] as $app)

            <p> <i class="fa fa-address-card" aria-hidden="true"></i> {{ $app['0'] }} </p>

            <hr>

            @endforeach

        @endif

      </div>

  </section>

  <section class="col-md-6">

      @foreach ($profile as $post_data)

          @php

              $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];
              $author_url = "https://www.steemit.com/@".$post_data["author"];
              $post_title = substr($post_data["title"],0,63).'...';
              $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);
              $img = "https://steemitimages.com/u/".$post_data['author']."/avatar";
              $tags = json_decode($post_data['json_metadata'], TRUE);
              $tags = $tags['tags'];
              $pending_payout = floatval($post_data['pending_payout_value']);
              $paid_out = floatval($post_data['total_payout_value']) + floatval($post_data['curator_payout_value']) ;

          @endphp

          @foreach ($tags as $tag)

              @if ($tag == "steemask")

              <article class="question question-type-normal">

                <div class="span-top"></div>

                <div class="span-inner">
                  <h2 class="quest-h2">
                      <a href="" class="question-a"> {{ $post_title }} </a>
                  </h2>

                  <div class="question-inner">
                      <div class="clearfix"></div>

                      <div class="">
                          <img src=" {{ $img }} " alt="profile-img" class="profile-img-dashboard img-responsive">
                          <h4 class="username-dashboard"> {{ $post_data["author"] }} </h4>
                          <h5 class="time-dashboard"> </h5>
                          <h5 class="comment-count"><i class="fa fa-comment" aria-hidden="true"></i> {{ $post_data["children"] }}</h5>

                          <h5 class="upvote-count"><i class="fa fa-heart" aria-hidden="true"></i> {{ $post_data["net_votes"] }}</h5>

                          <h5 class="payout-dashboard">

                              @if ( $pending_payout && $pending_payout != "0.00" )

                                  ${{ $pending_payout }}

                              @else

                                  ${{ $paid_out }}

                              @endif

                          </h5>

                          <div class="tags-block pull-right">

                            @foreach ($tags as $tag)

                                <a href="/{{ $tag }}" class="tags">{{ $tag }}</a>

                            @endforeach

                          </div>

                      </div>

                      <div class="clearfix" id="clear"></div>
                  </div>
                </div>

             </article>

              @endif

          @endforeach

      @endforeach
  </section>

  <section class="col-md-3">

        <div class="content-right">

          <h5 class="apps"> <b>Wallet</b> </h5>

          <p>Steem <br> {{ $_SESSION['balance'] }} </p>

          <hr>

          <p>Steem Dollar <br> {{ $_SESSION['sbd_balance'] }} </p>

          <hr>

          <b class="apps">Savings</b> <br>

          <p>Steem <br> {{ $_SESSION['savings_balance'] }} </p>

          <hr>

          <p>Steem <br> {{ $_SESSION['savings_sbd_balance'] }} </p>

          <hr>

        </div>

        <div class="content-right">

          <h5 class="apps"> <b>Witness Votes</b> </h5>

          @if(isset($_SESSION['witness_votes']) && !empty($_SESSION['witness_votes']))

              @foreach ($_SESSION['witness_votes'] as $witness)

              <p> <i class="fa fa-user" aria-hidden="true"></i> {{ $witness }} </p>

              <hr>

              @endforeach

          @endif

        </div>

    </section>
