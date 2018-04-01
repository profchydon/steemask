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
}
