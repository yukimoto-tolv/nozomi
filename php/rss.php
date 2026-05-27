<?php
//RSS配信先からXMLデータを取得
$rss_url = 'https://note.com/tolv_yukimoto/rss';
$data_obj = simplexml_load_file($rss_url);

if($data_obj){
  //取得したいitemの数
  $max_item_num = 1;

  //itemの配列を保持
  $items = $data_obj->channel->item;

  //HTMLに出力
  $rssitem = '';
  for($i = 0; $i < $max_item_num; $i++){
    //RSSに含まれる投稿数が取得したい数より少なければbreakして抜ける
    if(!$items[$i]) break;

    // $item_link = $items[$i]->link;
    // $item_thum_url = $items[$i]->children('media', true)->thumbnail;
    $item_date = date('Y.m.d (D)', strtotime($items[$i]->pubDate));
    $item_title = $items[$i]->title;
    $item_desc = $items[$i]->description;
    $item_account_img = $items[$i]->children('note', true)->creatorImage;
    $item_account_name = $items[$i]->children('note', true)->creatorName;

    $rssitem .= '<h2>'.$item_title.'</h2>';
    $rssitem .= '<div><span>'.$item_date.'</span><div>';
    $rssitem .= '<p>'.$item_desc.'</p>';
    $rssitem .= '<div class="note-account">';
    $rssitem .= '<img decoding="async" loading="lazy" alt="tolv" src="'.$item_account_img.'"?fit=bounds&amp;format=jpeg&amp;quality=85&amp;width=330">';
    $rssitem .= '<div class="creator-name">'.$item_account_name.'</div>';
    $rssitem .= '</div>';
  }

  echo json_encode($rssitem);
}
exit;