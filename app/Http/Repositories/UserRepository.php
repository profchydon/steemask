<?php

namespace App\Http\Repositories;

class UserRepository
{

  public function steemConnect ()
  {

    session_start();

    if (isset($_GET['access_token']) and isset($_GET['expires_in'])) {

        $_SESSION['code'] = $_GET['access_token'];

    if (!isset($_SESSION['code'])) {

        return false;

    } else {

      $authstr = "authorization: " . $_SESSION['code'];

      $check = curl_init();

      curl_setopt_array($check, array(

            CURLOPT_URL => "https://v2.steemconnect.com/api/me",
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

    return $user;
}


public function getUserBlogData ($username)
{

  $query = urlencode('{"tag":"'.$username.'", "limit": "100"}');
  $url = 'https://api.steemjs.com/get_discussions_by_blog?query='.$query;
  $json= file_get_contents($url);
  $data = json_decode($json,true);
  return $data;

}


}


?>
