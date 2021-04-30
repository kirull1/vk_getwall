<?php
$domain = $_GET['domain'] ?: 'vkapi';
$count = $_GET['count'] ?: 1;

$token = 'token';

for ($i=0; $i < $count; $i++){
    $request_params = array(
    'domain' => $domain,
    'count' => $count,
    'offset' => $count * $i,
    'v' => '5.137',
    'access_token' => $token
    );
    $get_params = http_build_query($request_params);
    $posts_vk[] = json_decode(file_get_contents('https://api.vk.com/method/wall.get?'. $get_params))->response->items;
}
foreach ($posts_vk as $posts)
foreach($posts as $value)
    $result[] = [
        'link'=> 'https://vk.com/'. $domain .'?w=wall' . $value->from_id . '_' . $value->id,
        'text' => $value->text,
        'time' => date('j.m.Y H:i',$value->date), 
        'comments' => $value->comments->count, 
        'likes' => $value->likes->count, 
        'repost' => $value->reposts->count, 
        'views' => $value->views->count
    ];

print_r($result);