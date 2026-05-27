<?php
$instagram_business_id = '17841453021135657';
$access_token = 'EAAH6Xlu58QQBABgotbj3rGplMNudCefqmzdleOwnvCtL7UXaH3cinBv7loQk7auPBTyuowUVMCDSnxGGAt6ANfhoPJBwvBlMuaDIoWB9E3peiuJ0NST68mslX31khSO1HUoEuyw6GiF5xSLXeNZC7i8DjxmmmIbQZCMsspz3petOrAhTJM';
// $target_user = 'nozomi_pharmacy_nishinoomote';

//上記の他人のInstagramアカウント名の情報を取得する場合
// $query = 'business_discovery.username('.$target_user.'){id,followers_count,media_count,ig_id,media{caption,media_url,media_type,like_count,comments_count,timestamp,id}}';

//自分のアカウント情報のみ（コメントアウト中）
$query = 'id,followers_count,media_count,ig_id,media{caption,media_url,thumbnail_url,media_type,like_count,comments_count,timestamp,id,children{id,media_url,media_type,thumbnail_url}}';

$instagram_api_url = 'https://graph.facebook.com/v13.0/';
$target_url = $instagram_api_url.$instagram_business_id."?fields=".$query."&access_token=".$access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$instagram_data = curl_exec($ch);
curl_close($ch);
echo $instagram_data;
exit;
