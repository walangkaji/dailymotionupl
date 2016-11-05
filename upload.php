<?php 
require 'Dailymotion.php';

$api = new Dailymotion();
$apiKey = '';
$apiSecret = '';
$username = '';
$password = '';
$filePath = 'blahblah.mp4';

$title = 'This is a sample title for my video'; // max 120 characters
$channel = 'news';
$language = 'en';
$tags = array('tags','neng kene','man','emboh','wis','manut','opo','jaremu','ya','mamen'); // 10 tags max
$description = 'This is a sample description for my video'; // Maximumm length is set to 3000
$allow_comments = false;
$country = 'US'; 
	$api->setGrantType(Dailymotion::GRANT_TYPE_PASSWORD, $apiKey, $apiSecret,
	    array('userinfo','manage_videos','manage_comments','manage_playlists','manage_tiles','manage_likes',), // scope
	    array('username' => $username,'password' => $password)
	);

$progressUrl = null;
$url = $api->uploadFile($filePath, null, $progressUrl);
echo "Progress : ".$progressUrl."\n";
echo "Video URL: ".$url."\n";

$result = $api->post(
    '/me/videos',
    array(
    	'url' => $url,
    	'title' => $title,
    	'channel' => $channel,
    	'language' => $language,
    	'tags' => $tags,
    	'description' => $description,
    	'allow_comments' => $allow_comments,
    	'country' => $country,
    	'published' => true,
    	));

var_dump($result);
?>