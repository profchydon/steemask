<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CoinmarketcapRepository;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $coinmarketcap;

    public function __construct(CoinmarketcapRepository $coinmarketcap)
    {
        $this->coinmarketcap = $coinmarketcap;
    }

    //
    public function profile ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.profile' , $data);
    }
}
