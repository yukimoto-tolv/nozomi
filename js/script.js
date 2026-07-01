// $.getJSON("php/instagram.php", function(instagram_data){
//   const gallery_data = instagram_data["media"]["data"];
//   let photos = "";
//   const photo_length = (instagram_data["media_count"] > 2) ? 3 : instagram_data["media_count"];

//   for(let i = 0; i < photo_length ;i++){
//     if(gallery_data[i].media_url){
//         photos += '<div class="photo content description-overlay"><span class="mask"><img src="' + gallery_data[i].media_url + '"><span class="caption">' + gallery_data[i].caption + '</span></span></div>';
//     } else if(gallery_data[i].thumbnail_url) {
//         photos += '<div class="photo content description-overlay"><span class="mask"><img src="' + gallery_data[i].thumbnail_url + '"><span class="caption">' + gallery_data[i].caption + '</span></span></div>';
//     } else if (gallery_data[i].children.data[0].media_url) {
//         photos += '<div class="photo content description-overlay"><span class="mask"><img src="' + gallery_data[i].children.data[0].media_url + '"><span class="caption">' + gallery_data[i].caption + '</span></span></div>';
//     }
//   }
//   $("#instagram-gallery").append(photos);
// });

// $.getJSON("php/rss.php", function(rss_data){
//   // console.log(rss_data);
//   $("#note-embed").append(rss_data);
// });

// モーダルを開く関数
function openPdfModal(pdfUrl) {
    const modal = document.getElementById('pdfModal');
    const iframe = document.getElementById('pdfIframe');
    
    iframe.src = pdfUrl; 
    modal.style.display = 'flex'; 
    document.body.style.overflow = 'hidden'; 
}

function closePdfModal() {
    const modal = document.getElementById('pdfModal');
    const iframe = document.getElementById('pdfIframe');
    
    modal.style.display = 'none'; 
    iframe.src = ''; 
    document.body.style.overflow = ''; 
}
  