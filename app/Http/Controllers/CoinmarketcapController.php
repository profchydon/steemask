<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coinmarketcap;

class CoinmarketcapController extends Controller
{
    protected $coinmarketcap;


    public function __construct(Coinmarketcap $coinmarketcap)
    {
        $this->coinmarketcap = $coinmarketcap;
    }

    // Get SBD details and write to sbd.txt file
    public function writeSBDToFile ()
    {
      $sbd = $this->coinmarketcap->getSBDetails();
      $sbdfile = fopen("../sbd.txt", "w") or die("Unable to open file!");
      fwrite($sbdfile, $sbd);
      fclose($sbdfile);
    }

    // Get SBD details and write to steem.txt file
    public function writeSteemToFile ()
    {
      $steem = $this->coinmarketcap->getSteemDetails();
      $steemfile = fopen("../steem.txt", "w") or die("Unable to open file!");
      fwrite($steemfile, $steem);
      fclose($steemfile);
    }

    // Get SBD details from sbd.txt file
    public function getSBD ()
    {
      $sbd = $this->coinmarketcap->getSBDetailsFromFile();
      return $sbd;
    }

    // Get Steem details from sbd.txt file
    public function getSteem ()
    {
      $steem = $this->coinmarketcap->getSteemDetailsFromFile();
      return $steem;
    }

    public function getAllCoinDetails ()
    {

        $coin['sbd'] = $this->getSBD();
        $coin['steem'] = $this->getSteem();

        return view ('home' , $coin);

    }


}
