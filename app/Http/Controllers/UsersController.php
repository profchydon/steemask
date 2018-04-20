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
      // echo "<pre>";
      // var_dump($data['profile']);
      // dd();

      return view ('pages.payout' , $data);

    }

}
