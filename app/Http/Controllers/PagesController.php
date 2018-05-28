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


    public function faq ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.faq' , $data);
    }

    public function terms ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.terms' , $data);
    }

    public function disclaimer ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.disclaimer' , $data);
    }

    public function privacy ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.privacy' , $data);
    }

    public function askAQuestion ()
    {
      if (session_status () == PHP_SESSION_NONE) {
        session_start();
      }
      $data['coinmarketcap'] = $this->coinmarketcap->getAllCoinDetails();

      return view ('pages.ask-a-question' , $data);
    }
}
