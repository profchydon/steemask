<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coinmarketcap extends Model
{
    //

    // Get SBD details
    public function getSBDetails ()
    {
      $sbd = file_get_contents('https://api.coinmarketcap.com/v1/ticker/steem-dollars/');
      return $sbd;
    }

    // Get Steem details
    public function getSteemDetails ()
    {
      $steem = file_get_contents('https://api.coinmarketcap.com/v1/ticker/steem/');
      return $steem;
    }

    // Get Steem details
    public function getBitcoinDetails ()
    {
      $bitcoin = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/');
      return $bitcoin;
    }

    // Get Steem details
    public function getEthDetails ()
    {
      $eth = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/');
      return $eth;
    }

    // Get SBD details
    public function getEosDetails ()
    {
      $eos = file_get_contents('https://api.coinmarketcap.com/v1/ticker/eos/');
      return $eos;
    }

    // Get Steem details
    public function getGolosDetails ()
    {
      $golos = file_get_contents('https://api.coinmarketcap.com/v1/ticker/golos/');
      return $golos;
    }

    // Get Steem details
    public function getMarketCapDetails ()
    {
      $marketcap = file_get_contents('https://api.coinmarketcap.com/v1/global/');
      return $marketcap;
    }

    // Get SBD details
    public function getSBDetailsFromFile ()
    {
      $sbd = file_get_contents('../sbd.txt');
      return $sbd;
    }

    // Get Steem details
    public function getSteemDetailsFromFile ()
    {
      $steem = file_get_contents('../steem.txt');
      return $steem;
    }

    // Get Steem details
    public function getBitcoinDetailsFromFile ()
    {
      $bitcoin = file_get_contents('../bitcoin.txt');
      return $bitcoin;
    }

    // Get Steem details
    public function getEthDetailsFromFile ()
    {
      $eth = file_get_contents('../eth.txt');
      return $eth;
    }

    // Get Steem details
    public function getEosDetailsFromFile ()
    {
      $eos = file_get_contents('../eos.txt');
      return $eos;
    }

    // Get Steem details
    public function getGolosDetailsFromFile ()
    {
      $golos = file_get_contents('../golos.txt');
      return $golos;
    }

    public function getMarketCapDetailsFromFile ()
    {
      $marketcap = file_get_contents('../marketcap.txt');
      return $marketcap;
    }
}
