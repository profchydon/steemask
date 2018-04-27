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

        $_SESSION['about'] = $profile['profile']['about'];
        $_SESSION['location'] = $profile['profile']['location'];
        $_SESSION['website'] = $profile['profile']['website'];
        $_SESSION['avatar'] = "https://steemitimages.com/u/".$data['user']['user']."/avatar";

        return view ('home' , $data);

    }

    public function logout ()
    {

        session_start();
        session_destroy();

        return redirect('/');

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

}
