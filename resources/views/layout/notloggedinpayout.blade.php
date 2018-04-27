<?php

    $total_price = 0;
    $total_payout_in_sbd = 0;
    $count = 0;

    foreach ($profile as $key => $post_data) {

       if( !($post_data["pending_payout_value"] == "0.000 SBD") ) {

         $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);

         if (!empty($post_data['beneficiaries'])) {

            $beneficiary = $post_data['beneficiaries'][0]['account'];
            $weight = ($post_data['beneficiaries'][0]["weight"]/10000);
            $price_after_beneficiary_deduction  = $price - ($price * $weight);
            $payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
            $total_price = $total_price + $payout_in_sbd;

         }else {

           $payout_in_sbd  = $price   * 0.375;
           $total_price = $total_price + $payout_in_sbd;

         }

         $total_payout_in_sbd = round($total_payout_in_sbd + $payout_in_sbd,2);
       }
     }

     $total_price_comment = 0;
     $total_payout_in_sbd_comment = 0;
     $count_comment = 0;

     foreach ($comment as $key => $comment_data) {

        if( !($comment_data["pending_payout_value"] == "0.000 SBD")) {

          $price_comment = str_replace(" SBD", "", $comment_data["pending_payout_value"]);

          if (!empty($comment_data['beneficiaries'])) {

             $beneficiary_comment = $comment_data['beneficiaries'][0]['account'];
             $weight_comment = ($comment_data['beneficiaries'][0]["weight"]/10000);
             $price_after_beneficiary_deduction_comment  = $price_comment - ($price_comment * $weight_comment);
             $payout_in_sbd_comment  =  $price_after_beneficiary_deduction_comment * 0.375;
             $total_price_comment = $total_price_comment + $payout_in_sbd_comment;

          }else {

            $payout_in_sbd_comment  = $price_comment   * 0.375;
            $total_price_comment = $total_price_comment + $payout_in_sbd_comment;

          }

          $total_comment_payout_in_sbd = round($total_payout_in_sbd_comment + $payout_in_sbd_comment,2);
        }
      }
?>

<form class="form-group col-md-8 pull-right" action="/payoutcheck" method="post">

    {{ Csrf_field() }}

    <input class="form-control" type="text" name="username" value="" placeholder="Enter Username without @ to view for other users">

    <button class="btn btn-primary pull-right" type="submit" value="ok" name="check">Go</button>

</form>


<section class="col-md-12 question question-type-normal">

  <ul class="nav nav-tabs" role="tablist">

    <li role="presentation" class="active">
      <a class="tabs" href="#post" aria-controls="post" role="tab" data-toggle="tab">POST PAYOUT <br>
          <?php

              if (isset($total_payout_in_sbd)) {

                  echo $total_payout_in_sbd. " SBD";

              }else {
                echo "0 SBD";
              }

           ?>
       SBD
     </a>
   </li>

    <li role="presentation">
      <a class="tabs" href="#comment" aria-controls="comment" role="tab" data-toggle="tab">COMMENT PAYOUT <br>

        <?php

            if (isset($total_comment_payout_in_sbd)) {

                echo $total_comment_payout_in_sbd ." SBD";

            }else {
              echo "0 SBD";
            }

         ?>


      </a>
    </li>
    <li role="presentation">
      <a class="tabs" href="#" aria-controls="" role="tab" data-toggle="tab">TOTAL PAYOUT <br>

          <?php

          if (isset($total_payout_in_sbd) && isset($total_comment_payout_in_sbd)) {

              echo $total_payout_in_sbd + $total_comment_payout_in_sbd ." SBD";

          }elseif (isset($total_payout_in_sbd) && !isset($total_comment_payout_in_sbd)) {

              echo $total_payout_in_sbd ." SBD";

          }elseif (!isset($total_payout_in_sbd) && isset($total_comment_payout_in_sbd)) {

              echo $total_comment_payout_in_sbd ." SBD";

          }
          else {
            echo "0 SBD";
          }

           ?>



      </a>
  </li>

  </ul>
<!-- Tab panes -->

<div class="tab-content">

 <div role="tabpanel" class="tab-pane fade in active" id="post">

   <table class="table table-striped table-responsive">

     <thead>
       <tr>

           <th>S/no</th>
           <th>Post URL</th>
           <th>Beneficiary</th>
           <th>Post Title</th>
           <th>Total Upvote</th>
           <th>Pending Payout</th>
           <th>Payout Time</th>

       </tr>
    </thead>
      <tbody>

        <?php

            $total_price = 0;
            $total_payout_in_sbd = 0;
            $count = 0;

            foreach ($profile as $key => $post_data) {

               if( !($post_data["pending_payout_value"] == "0.000 SBD") ) {

                 $count = $count + 1;

                 $post_url = "https://www.steemit.com/@".$post_data["author"]."/".$post_data["permlink"];

                 $author_url = "https://www.steemit.com/@".$post_data["author"];

                 $post_title = substr($post_data["title"],0,23).'...';

                 $price = str_replace(" SBD", "", $post_data["pending_payout_value"]);

                 $payout_time = $post_data['created'];

                 if (!empty($post_data['beneficiaries'])) {

                    $beneficiary = $post_data['beneficiaries'][0]['account'];
                    $weight = ($post_data['beneficiaries'][0]["weight"]/10000);

                    $price_after_beneficiary_deduction  = $price - ($price * $weight);
          					$payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
          					$total_price = $total_price + $payout_in_sbd;

                 }else {

                   $payout_in_sbd  = $price   * 0.375;
                   $total_price = $total_price + $payout_in_sbd;

                 }

                 $total_payout_in_sbd = $total_payout_in_sbd + $payout_in_sbd;

             ?>

             <tr>
               <td><?=$count;?></td>
               <td> <a href="<?=$post_url;?>"><?=$post_title;?></a> </td>
               <td><?=$beneficiary;?> (<?= $weight * 100;?>%)</td>
               <td><?=$post_title;?></td>
               <td>$<?=$price;?></td>
               <td><?=$payout_in_sbd;?></td>
               <td><?=$payout_time;?></td>
             </tr>

         <?php
             }
           }

         ?>

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

        <?php

            $total_price = 0;
            $count = 0;

            foreach ($comment as $key => $comment_data) {

               if( !($comment_data["pending_payout_value"] == "0.000 SBD") ) {

                 $count = $count + 1;

                 $post_url = "https://www.steemit.com/@".$comment_data["author"]."/".$comment_data["permlink"];

                 $author_url = "https://www.steemit.com/@".$comment_data["author"];

                 $post_title = substr($comment_data["title"],0,43).'...';

                 $price = str_replace(" SBD", "", $comment_data["pending_payout_value"]);

                 $payout_time = $comment_data['created'];

                 if (!empty($comment_data['beneficiaries'])) {

                    $beneficiary = $comment_data['beneficiaries'][0]['account'];
                    $weight = ($comment_data['beneficiaries'][0]["weight"]/10000);

                    $price_after_beneficiary_deduction  = $price - ($price * $weight);
                   $payout_in_sbd  =  $price_after_beneficiary_deduction * 0.375;
                   $total_price = $total_price + $payout_in_sbd;

                 }else {

                   $payout_in_sbd  = $price   * 0.375;
                   $total_price = $total_price + $payout_in_sbd;

                 }


             ?>

             <tr>
               <td><?=$count;?></td>
               <td> <a href="<?=$post_url;?>"><?=$post_title;?></a> </td>
               <td><?=$post_title;?></td>
               <td>$<?=$price;?></td>
               <td><?=$payout_in_sbd;?></td>
               <td><?=$payout_time;?></td>
             </tr>

         <?php
             }
           }
         ?>

    </tbody>

  </table>

 </div>

  </div>

</section>
