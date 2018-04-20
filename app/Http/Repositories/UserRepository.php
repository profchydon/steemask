<?php

namespace App\Http\Repositories;

class UserRepository
{

  

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
