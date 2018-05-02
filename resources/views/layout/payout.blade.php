@php

    $total_price = 0;
    $total_payout_in_sbd = 0;
    $count = 0;

@endphp

@foreach( $profile as $post_data )

    @if ( !($post_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $post_data["author"] )

        @php

            $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);

        @endphp

        @if ( !empty($post_data['beneficiaries']) )

            @php

                $beneficiary = $post_data['beneficiaries'][0]['account'];
                $weight = ($post_data['beneficiaries'][0]["weight"]/10000);
                $price_after_beneficiary_deduction  = $price - ($price * $weight);
                $payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
                $total_price = $total_price + $payout_in_sbd;

            @endphp

        @else

            @php

                $payout_in_sbd  = $price   * 0.375;
                $total_price = $total_price + $payout_in_sbd;

            @endphp

        @endif

          @php

              $total_payout_in_sbd = round($total_payout_in_sbd + $payout_in_sbd,2);

          @endphp

    @endif

@endforeach

@php

     $total_price_comment = 0;
     $total_payout_in_sbd_comment = 0;
     $count_comment = 0;

@endphp

@foreach( $comment as $comment_data  )

    @if( !($comment_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $comment_data["author"] )

        @php

            $price_comment = str_replace(" SBD", "", $comment_data["pending_payout_value"]);

        @endphp

        @if (!empty($comment_data['beneficiaries']))

            @php

               $beneficiary_comment = $comment_data['beneficiaries'][0]['account'];
               $weight_comment = ($comment_data['beneficiaries'][0]["weight"]/10000);
               $price_after_beneficiary_deduction_comment  = $price_comment - ($price_comment * $weight_comment);
               $payout_in_sbd_comment  =  $price_after_beneficiary_deduction_comment * 0.375;
               $total_price_comment = $total_price_comment + $payout_in_sbd_comment;

            @endphp

        @else

            @php

              $payout_in_sbd_comment  = $price_comment   * 0.375;
              $total_price_comment = $total_price_comment + $payout_in_sbd_comment;

            @endphp

        @endif

          @php

              $total_payout_in_sbd_comment = round($total_payout_in_sbd_comment + $payout_in_sbd_comment,2);

          @endphp

    @endif

@endforeach


@include ('layout.forms.checkpayout')


<section class="col-md-12 question question-type-normal">

  <ul class="nav nav-tabs" role="tablist">

    <li role="presentation" class="active"><a class="tabs" href="#post" aria-controls="post" role="tab" data-toggle="tab">POST PAYOUT <br> {{ $total_payout_in_sbd }} SBD</a></li>
    <li role="presentation"><a class="tabs" href="#comment" aria-controls="comment" role="tab" data-toggle="tab">COMMENT PAYOUT <br> {{ $total_payout_in_sbd_comment }} SBD </a></li>
    <li role="presentation"><a class="tabs" href="#" aria-controls="" role="tab" data-toggle="tab">TOTAL PAYOUT <br> {{ $total_payout_in_sbd + $total_payout_in_sbd_comment }} SBD </a></li>

  </ul>
<!-- Tab panes -->

<div class="tab-content">

 <div role="tabpanel" class="tab-pane fade in active" id="post">

   <table class="table table-striped table-responsive">

     <thead>
       <tr>

           <th>s/no</th>
           <th>Post URL</th>
           <th>Beneficiary</th>
           <th>Post Title</th>
           <th>Total Upvote</th>
           <th>Pending Payout</th>
           <th>Payout Time</th>

       </tr>
    </thead>
      <tbody>

        @php

            $total_price = 0;
            $total_payout_in_sbd = 0;
            $count = 0;

        @endphp

        @foreach( $profile as $post_data )

            @if ( !($post_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $post_data["author"] )

                @php

                     $count = $count + 1;

                     $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];

                     $author_url = "https://www.steemit.com/@".$post_data["author"];

                     $post_title = substr($post_data["title"],0,23).'...';

                     $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);

                     $payout_time = $post_data['created'];

                @endphp

                @if ( !empty($post_data['beneficiaries']) )

                    @php

                      $beneficiary = $post_data['beneficiaries'][0]['account'];
                      $weight = ($post_data['beneficiaries'][0]["weight"]/10000);

                      $price_after_beneficiary_deduction  = $price - ($price * $weight);
                      $payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
                      $total_price = $total_price + $payout_in_sbd;


                    @endphp

                @else

                    @php

                      $payout_in_sbd  = $price   * 0.375;
                      $total_price = $total_price + $payout_in_sbd;

                    @endphp

                @endif

                  @php

                      $total_payout_in_sbd = round($total_payout_in_sbd + $payout_in_sbd,2);


                  @endphp


                  <tr>
                     <td>{{ $count }}</td>
                     <td> <a href="{{ $post_url }}">{{ $post_title }}</a> </td>
                     <td> {{ $beneficiary }} ({{ $weight * 100 }}%)</td>
                     <td> {{ $post_title }} </td>
                     <td>${{ $price }}</td>
                     <td> {{ $total_payout_in_sbd }}</td>
                     <td> {{ $payout_time }}</td>
                 </tr>


            @endif

        @endforeach

    </tbody>

  </table>

 </div>

 <div role="tabpanel" class="tab-pane fade" id="comment">

   <table class="table table-striped table-responsive">

     <thead>
       <tr>

           <th>S/no</th>
           <th>Post URL</th>
           <th>Post Title</th>
           <th>Total Upvote</th>
           <th>Pending Payout</th>
           <th>Payout Time</th>

       </tr>
    </thead>

    <tbody>

      @php

          $$total_price = 0;
          $count = 0;

      @endphp

      @foreach( $comment  as $comment_data )

          @if( !($comment_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $comment_data["author"] )

              @php

                  $count = $count + 1;

                  $post_url = "https://www.steemit.com/@".$comment_data["author"]."/".$comment_data["permlink"];

                  $author_url = "https://www.steemit.com/@".$comment_data["author"];

                  $post_title = substr($comment_data["title"],0,43).'...';

                  $price = str_replace(" SBD", "", $comment_data["pending_payout_value"]);

                  $payout_time = $comment_data['created'];

              @endphp

              @if ( !empty($comment_data['beneficiaries']) )

                  @php

                     $beneficiary = $comment_data['beneficiaries'][0]['account'];
                     $weight = ($comment_data['beneficiaries'][0]["weight"]/10000);

                     $price_after_beneficiary_deduction  = $price - ($price * $weight);
                     $payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
                     $total_price = $total_price + $payout_in_sbd;

                  @endphp

              @else

                  @php

                    $payout_in_sbd  = $price   * 0.375;
                    $total_price = $total_price + $payout_in_sbd;

                  @endphp

              @endif

                  <tr>
                     <td>{{ $count }}</td>
                     <td> <a href="{{ $post_url }}">{{ $post_title }}</a> </td>
                     <td> {{ $post_title }} </td>
                     <td>${{ $price }}</td>
                     <td> {{ round($payout_in_sbd,2) }}</td>
                     <td> {{ $payout_time }}</td>
                  </tr>

          @endif

      @endforeach


    </tbody>

  </table>

 </div>

  </div>

</section>
