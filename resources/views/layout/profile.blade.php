<section class="col-md-3 content-right">

      <h5> <b>About</b> </h5>
      <p> {{ $_SESSION['about'] }} </p>

      <hr>

      <h5> <b>Location</b> </h5>
      <p> {{ $_SESSION['location'] }} </p>

      <hr>

      <h5> <b>Website</b> </h5>
      <a href="{{ $_SESSION['website'] }}"> {{ $_SESSION['website'] }} </a>

      <hr>

      <h5> <b>Approved Apps</b> </h5>
      <a href="{{ $_SESSION['website'] }}"> {{ $_SESSION['website'] }} </a>

    </section>

    <section class="col-md-6">

      <?php

          foreach ($profile as $key => $post_data) {

            $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];
            $author_url = "https://www.steemit.com/@".$post_data["author"];
            $post_title = substr($post_data["title"],0,63).'...';
            $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);
            $img = "https://steemitimages.com/u/".$post_data['author']."/avatar";

      ?>


      <article class="question question-type-normal">
        <h2 class="quest-h2">
            <a href="" class="question-a"><?=$post_title?></a>
        </h2>

        <div class="question-inner">
            <div class="clearfix"></div>
            <p class="question-desc">
              I just recently signed up on steemit and finding some things difficult to understand. One of which is the steem  power and powering up. I really want to know the essence of powering up on steemit.
            </p>

            <div class="">
                <img src="<?=$img?>" alt="profile-img" class="profile-img-dashboard img-responsive">
                <h4 class="username-dashboard"><?=$post_data["author"];?></h4>
                <h5 class="time-dashboard"> -  12 hours ago</h5>
                <h5 class="comment-count"><i class="fa fa-comment" aria-hidden="true"></i> 12</h5>

                <h5 class="upvote-count"><i class="fa fa-heart" aria-hidden="true"></i> 33</h5>

                <h5 class="payout-dashboard"> $20.34</h5>

                <div class="tags-block pull-right">
                  <a href="#" class="tags">STEEMANSK</a>
                  <a href="#" class="tags">PAYOUT</a>
                  <a href="#" class="tags">STEEMIT</a>

                </div>

            </div>

            <div class="clearfix" id="clear"></div>
        </div>

     </article>


      <?php
           }
       ?>

    </section>
