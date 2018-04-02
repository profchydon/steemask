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

    // Get Bitcoin details and write to bitcoin.txt file
    public function writeBitcoinToFile ()
    {
      $bitcoin = $this->coinmarketcap->getBitcoinDetails();
      $bitcoinfile = fopen("../bitcoin.txt", "w") or die("Unable to open file!");
      fwrite($bitcoinfile, $bitcoin);
      fclose($bitcoinfile);
    }

    // Get Bitcoin details and write to bitcoin.txt file
    public function writeEthToFile ()
    {
      $eth = $this->coinmarketcap->getEthDetails();
      $ethfile = fopen("../eth.txt", "w") or die("Unable to open file!");
      fwrite($ethfile, $eth);
      fclose($ethfile);
    }

    // Get Bitcoin details and write to bitcoin.txt file
    public function writeEosToFile ()
    {
      $eos = $this->coinmarketcap->getEosDetails();
      $eosfile = fopen("../eos.txt", "w") or die("Unable to open file!");
      fwrite($eosfile, $eos);
      fclose($eosfile);
    }

    // Get Bitcoin details and write to bitcoin.txt file
    public function writeGolosToFile ()
    {
      $golos = $this->coinmarketcap->getGolosDetails();
      $golosfile = fopen("../golos.txt", "w") or die("Unable to open file!");
      fwrite($golosfile, $golos);
      fclose($golosfile);
    }

    // Get Bitcoin details and write to bitcoin.txt file
    public function writeMarketCapToFile ()
    {
      $marketcap = $this->coinmarketcap->getMarketCapDetails();
      $marketcapfile = fopen("../marketcap.txt", "w") or die("Unable to open file!");
      fwrite($marketcapfile, $marketcap);
      fclose($marketcapfile);
    }

    // Get SBD details from sbd.txt file
    public function getSBD ()
    {
      $sbd = $this->coinmarketcap->getSBDetailsFromFile();
      $sbd = json_decode($sbd, TRUE);
      $sbd = $sbd[0];
      return $sbd;
    }

    // Get Steem details from sbd.txt file
    public function getSteem ()
    {
      $steem = $this->coinmarketcap->getSteemDetailsFromFile();
      $steem = json_decode($steem, TRUE);
      $steem = $steem[0];
      return $steem;
    }

    // Get Steem details from bitcoin.txt file
    public function getBitcoin ()
    {
      $bitcoin = $this->coinmarketcap->getBitcoinDetailsFromFile();
      $bitcoin = json_decode($bitcoin, TRUE);
      $bitcoin = $bitcoin[0];
      return $bitcoin;
    }

    // Get Steem details from bitcoin.txt file
    public function getEth ()
    {
      $eth = $this->coinmarketcap->getEthDetailsFromFile();
      $eth = json_decode($eth, TRUE);
      $eth = $eth[0];
      return $eth;
    }

    // Get Steem details from bitcoin.txt file
    public function getEos ()
    {
      $eos = $this->coinmarketcap->getEosDetailsFromFile();
      $eos = json_decode($eos, TRUE);
      $eos = $eos[0];
      return $eos;
    }

    // Get Steem details from bitcoin.txt file
    public function getGolos ()
    {
      $golos = $this->coinmarketcap->getGolosDetailsFromFile();
      $golos = json_decode($golos, TRUE);
      $golos = $golos[0];
      return $golos;
    }

    // Get Steem details from bitcoin.txt file
    public function getMarketCap ()
    {
      $marketcap = $this->coinmarketcap->getMarketCapDetailsFromFile();
      $marketcap = json_decode($marketcap, TRUE);
      // $marketcap = $marketcap[0];
      return $marketcap;
    }

    public function getAllCoinDetails ()
    {

        $coin['sbd'] = $this->getSBD();
        $coin['steem'] = $this->getSteem();
        $coin['bitcoin'] = $this->getBitcoin();
        $coin['eth'] = $this->getEth();
        $coin['eos'] = $this->getEos();
        $coin['golos'] = $this->getGolos();
        $coin['marketcap'] = $this->getMarketCap();

        return view ('home' , $coin);

    }


}
