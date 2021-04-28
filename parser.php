<?php

    require_once 'vendor/autoload.php'; // Connecting VK SDK. https://vk.com/dev/PHP_SDK

    $vk = new VK\Client\VKApiClient('5.137'); // VK version. https://vk.com/dev/wall.get

    // These values are obtained from the GET parameters.
    $domain = $_GET['domain'] ?: 'apiclub'; // Domain is the name of the group. If the name is missing replace the parameter 'domain' with 'owner_id'.
    $count = $_GET['count'] ?: 1; // The number of repetitions of the cycle.

    $token = 'token'; // It's kind of a token from a sdendelon application.

    for ($i=0; $i < $count; $i++) // Number of repetitions.
        $posts_vk[] = $vk->wall()->get($token, ['domain' => $domain, 'count' => 100, 'offset' => 100 * $i])['items']; // Getting posts.

    foreach ($posts_vk as $posts) // Sorting the received data.
        foreach($posts as $value) // Depending on the version of the SDK, the data may differ.
            $result[] = [
                'link'=> 'https://vk.com/'. $domain .'?w=wall' . $value['from_id'] . '_' . $value['id'], // Getting a link to a post.
                'text' => $value['text'], // Getting text of the post. I do not display this parameter in the table.
                'time' => date('j.m.Y H:i',$value['date']), 
                'comments' => $value['comments']['count'], 
                'likes' => $value['likes']['count'], 
                'repost' => $value['reposts']['count'], 
                'views' => $value['views']['count'] // In older versions of SDK data, the API VK parameter does not return.
            ];