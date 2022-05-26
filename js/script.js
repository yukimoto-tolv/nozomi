$.getJSON("php/instagram.php", function(instagram_data){
  const gallery_data = instagram_data["media"]["data"];
  let photos = "";
  const photo_length = (instagram_data["media_count"] > 2) ? 3 : instagram_data["media_count"];

  for(let i = 0; i < photo_length ;i++){
    photos += '<div class="photo content description-overlay"><span class="mask"><img src="' + gallery_data[i].media_url + '"><span class="caption">' + gallery_data[i].caption + '</span></span></div>';
  }
  $("#instagram-gallery").append(photos);
});