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
        $_SESSION['avatar'] = "https://steemitimages.com/u/".$data['user']['user']."/avatar";

        // echo "<pre>";
        // var_dump($data['user']);
        // dd();

        return view ('home' , $data);

    }



}
