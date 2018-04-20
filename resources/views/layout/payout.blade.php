<section class="col-md-12 question question-type-normal">

  <ul class="nav nav-tabs" role="tablist">

    <li role="presentation" class="active"><a href="#post" aria-controls="post" role="tab" data-toggle="tab">POST PAYOUT</a></li>
    <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">COMMENT PAYOUT</a></li>


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
            $count = 0;

            foreach ($profile as $key => $post_data) {

               if( !($post_data["pending_payout_value"] == "0.000 SBD") && $_SESSION['username'] == $post_data["author"] ) {

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

      <h1>Ytdhjhbm</h1>

 </div>


  </div>

</section>
