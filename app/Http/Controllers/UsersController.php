<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;

use App\Http\Repositories\CoinmarketcapRepository;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $user;

    protected $coinmarketcap;

    public function __construct(UserRepository $user , CoinmarketcapRepository $coinmarketcap)
    {
        $this->coinmarketcap = $coinmarketcap;
        $this->user = $user;
    }

    public function loginViaSteemConnect ()
    {

        $data['user'] = $this->user->steemConnect();

        $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

        $_SESSION['username'] = $data['user']['user'];
        $profile = $data['user']['account']['json_metadata'];
        $profile = json_decode($profile, TRUE);


        $_SESSION['app'] = $data['user']['account']['posting']['account_auths'];
        $_SESSION['about'] = $profile['profile']['about'];
        $_SESSION['location'] = isset($profile['profile']['location']) ? $profile['profile']['location'] : "";
        $_SESSION['website'] = isset($profile['profile']['website']) ? $profile['profile']['website'] : "";
        $_SESSION['avatar'] = "https://steemitimages.com/u/".$data['user']['user']."/avatar";
        $_SESSION['post_count'] = $data['user']['account']['post_count'];
        $_SESSION['voting_power'] = $data['user']['account']['voting_power'];
        $_SESSION['balance'] = $data['user']['account']['balance'];
        $_SESSION['savings_balance'] = $data['user']['account']['savings_balance'];
        $_SESSION['sbd_balance'] = $data['user']['account']['sbd_balance'];
        $_SESSION['savings_sbd_balance'] = $data['user']['account']['savings_sbd_balance'];
        $_SESSION['witness_votes'] = $data['user']['account']['witness_votes'];

        return view ('home' , $data);

    }

    public function logout ()
    {

        session_start();
        session_destroy();

        return redirect('/');

    }

    public function login ()
    {

    }

    public function payout ()
    {

      if (session_status () == PHP_SESSION_NONE) {
         session_start();
      }

      $username = $_SESSION['username'];

      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();
      $data['profile'] = $this->user->getUserBlogData($username);
      $data['comment'] = $this->user->getUserCommentData($username);

      return view ('pages.payout' , $data);

    }

    public function notLoggedInPayout ($username)
    {

      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();
      $data['profile'] = $this->user->getUserBlogData($username);
      $data['comment'] = $this->user->getUserCommentData($username);

      return view ('pages.notloggedinpayout' , $data);

    }

    public function payoutcheck ()
    {

        if (isset($_POST['username'])) {

            return redirect("/payout/".$_POST['username']);

        }else {

            return redirect()->back();

        }

    }

    public function profile ()
    {

      if (session_status () == PHP_SESSION_NONE) {
         session_start();
      }

      $username = $_SESSION['username'];

      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();
      $data['profile'] = $this->user->getUserBlogData($username);

      return view ('pages.profile' , $data);

    }

    public function askAQuestion (Request $request)
    {
        if (session_status () == PHP_SESSION_NONE) {
           session_start();
        }

        // Initialize Variables

        // Post title
        $title = htmlentities(strip_tags($request->title));

        // Post body
        $body = htmlentities(strip_tags($request->body));

        // Replace space in post title with - to create a valid permlink
        $permlink = str_replace(' ', '-', mb_strtolower($title));

        // Make default parent tag to be steemask
        $parent_permlink = "steemask";

        $author = $_SESSION['username'];

        $tags = htmlentities(strip_tags($request->tags));

        '{"tags":["steemask","contest","steembees","stach"]}';

        // $steemconnect = 'https://steemconnect.com/sign/comment?parent_permlink='.$parent_permlink.'&author='.$author.'&permlink='.$permlink.'&title='.$title.'&body='.$body.'&json_metadata='.$tags;

        $steemconnect = 'https://steemconnect.com/sign/comment?parent_permlink='.$parent_permlink.'&author='.$author.'&permlink='.$permlink.'&title='.$title.'&body='.$body;

        $authstr = "authorization: " . $_SESSION['code'];

        $check = curl_init();

        curl_setopt_array($check, array(

              CURLOPT_URL => $steemconnect,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 1,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{}",
              CURLOPT_HTTPHEADER => array(
                  $authstr,
                  "cache-control: no-cache",
                  "content-type: application/json",
              ),

          ));

          $user = curl_exec($check);

          curl_close($check);

          $user = json_decode($user, TRUE);

    }

}
