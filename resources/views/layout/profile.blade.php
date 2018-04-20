
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

            if( !($post_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $post_data["author"] ) {

              echo $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];

              echo "<br>";

              $author_url = "https://www.steemit.com/@".$post_data["author"];

              echo "<br>";

              $post_title = substr($post_data["title"],0,53).'...';
              echo "<br>";

              $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);
              echo "<br>";
            }

          }

       ?>

        <!-- @foreach ($profile as $post_data)

            @if ( !($post_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $post_data["author"] ) )

            echo $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];

            echo "<br>";

            $author_url = "https://www.steemit.com/@".$post_data["author"];

            echo "<br>";

            $post_title = substr($post_data["title"],0,53).'...';
            echo "<br>";

            $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);
            echo "<br>";

            @endif


        @endforeach -->

    </section>
