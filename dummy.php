@foreach ($posts as $post)

@php
    $tags = json_decode($post['json_metadata'], TRUE);
    $tags = $tags['tags'];
    $img = "https://steemitimages.com/u/".$post['author']."/avatar";
    $post_url = "https://www.steemit.com/@".$post["author"]."/".$post["permlink"];
    $author_url = "https://www.steemit.com/@".$post["author"];
    $post_body = substr($post["body"],0,400).'...';
    $post_title = substr($post["title"],0,63).'...';
    $price = str_replace(" SBD", "", $post["pending_payout_value"]);
    $img = "https://steemitimages.com/u/".$post['author']."/avatar";
    $tags = json_decode($post['json_metadata'], TRUE);
    $tags = $tags['tags'];
    $pending_payout = floatval($post['pending_payout_value']);
    $paid_out = floatval($post['total_payout_value']) + floatval($post['curator_payout_value']) ;
@endphp

<article class="question question-type-normal">
  <div class="span-top"></div>

  <div class="span-inner">
    <h2 class="quest-h2">
        <a href="" class="question-a">{{ $post_title }}</a>
    </h2>

    <div class="question-inner">
        <div class="clearfix"></div>
        <p class="question-desc">
          {{ $post_body }}
        </p>

        <div class="">
            <img src="{{ $img }}" alt="profile-img" class="profile-img-dashboard img-responsive">
            <h4 class="username-dashboard"> {{ $post["author"] }} </h4>
            <h5 class="time-dashboard"> </h5>
            <h5 class="comment-count"><i class="fa fa-comment" aria-hidden="true"></i> {{ $post["children"] }}</h5>

            <h5 class="upvote-count"><i class="fa fa-heart" aria-hidden="true"></i> {{ $post["net_votes"] }}</h5>

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

@endforeach
