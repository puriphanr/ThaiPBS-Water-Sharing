<?php get_header()?>
   <div class="news-main-wrapper has-live">

        <div class="row">

            <!-- TOP NEWS BLOCK -->
<?php
$query = 'posts_per_page=1&page_id=454';
$queryObject = new WP_Query($query);
		$queryObject->the_post();
		$id = get_the_ID();
		$title = get_the_title();
		$link = get_permalink();
		$date = get_the_date();
		$hilight = get_field('hilightrel');
		$newsrel = get_field('newrel');
		//$get_image = get_field('thumb');
		//$image = $get_image['sizes']['large'];
		//if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
		//$gallery = get_post_gallery_images($id,false); 

?>

          <section class="news-section" id="hilight-news-block">
                
                <div class="top news-content-list">
<div class="col-lg-9">

<?php 
if(!empty($hilight)){
													$img = 0;
									?>
									<div id="carousel-example-captions" class="carousel slide" data-ride="carousel"> 
										<div class="carousel-inner" role="listbox"> 
									<?php
												
												forEach($hilight as $key=>$post){
												$title = $post->post_title;
												$link = $post->guid;
												$permalink = get_field('permalink',$post->ID);
												if(!empty($permalink)){
													$link = $permalink;
												}
												$a = "";
												if($link != "#"){
													$a = "href='".$link."' target='_blank'";
												}
												$type = get_field('type',$post->ID);
												$id = get_field('link',$post->ID);
												$caption = get_field('caption',$post->ID);
												$get_image = get_field('thumb',$post->ID);
												$image = $get_image['sizes']['thumbnail'];
												if($type == 'youtube'){
													$get_image = get_field('thumbnail',$post->ID);
													$image = $get_image['sizes']['thumbnail'];
												}
									?>
									<div class="item <?php if($img==0)echo"active";?>"> 
										<a <?=$a?>>
										<img style="width:100%;height:auto;" data-holder-rendered="true" src="<?=$image?>" data-src="//news.thaipbs.or.th/media/G0DL5oPyrtt5HBAi4FsMYQcy7WLaHFU69xjKwL0MmR8dReI0aRiwn7.png" alt="750x422"></a>
										<div class="carousel-caption <?php if($caption!=true){echo"hidden";}?>"> <h3><?=$title?></h3> <p class="hidden">image <?=$img?></p> 
										<div class="bg"></div>
										</div>
									</div>
									<?php $img++;}?>
									</div>
									<ol class="carousel-indicators"> 
									<?php for($i=0;$i<$img;$i++){?>
									<li data-target="#carousel-example-captions" data-slide-to="<?=$i?>" class="<?php if($i==0)echo"active";?>"></li>
									<?php }?>
									</ol> 
									<a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<?php }?>
</div>
<div class="col-lg-3">					
					    <div class="news-section">
							<div class="news-block banner-right-wrap">
							
							<a href="<?php bloginfo('url'); ?>/area" target="_blank">
								<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 nopad">
									<div class="banner-right">
										<h2 style="color:#f05a28;line-height:20px;">Update เขื่อนทั่วไทย</h2>
										<h3 style="color:#FFF;line-height:20px;margin-bottom:0px;">เหลือน้ำใช้การได้แค่ไหน</h3>
										<h3 style="color:#f05a28;float:right;font-size:34px;line-height:20px;">คลิกเลย !</h3>
										
									</div>
								</div>
								<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 nopad">
									<img src="<?php echo get_template_directory_uri(); ?>/images/banner_map_03.png" class="img-responsive banner-right-img">
								</div>
							</a>
							</div>
						</div>
</div>
						<div class="clearfix"></div>
<div class="col-lg-12">
<div class="row">
<?php
function sortFunction( $a, $b ) {
    return strtotime($a["published_time"]) - strtotime($b["published_time"]);
}
forEach($newsrel as $key=>$post){

	$title = $post->post_title;
	$link = $post->guid;
	$date = $post->post_date;
	$permalink = get_field('permalink',$post->ID);
	if(!empty($permalink)){
		$link = $permalink;
	}
	$a = "";
	if($link != "#"){
		$a = "href='".$link."' target='_blank'";
	}
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
												
	$get_image = get_field('thumb',$post->ID);
	$image = $get_image['sizes']['thumbnail'];
	if($type == 'youtube'){
		$get_image = get_field('thumbnail',$post->ID);
		$image = $get_image['sizes']['thumbnail'];
	}
/*
$json = file_get_contents('http://phinder.beta.thaipbs.or.th/api/search/thaipbs/news?q=%E0%B8%A7%E0%B8%B4%E0%B8%81%E0%B8%A4%E0%B8%95%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%87&published_range=last_week&type=news');

$getData = json_decode($json,true);
$data = $getData['data'];
*/

/*
usort($data, "sortFunction");
$data = array_reverse($data);
*/
$i=-1;
//forEach($data as $inx=>$key ){
$i++;
if($i < 4){
		$color = array('#00456e','#493f55','#6c3932','#616720');
	
?>
				<article class="news-block  head-big has-tag tag-special news-featured col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <h2 class="hide"><?=$title;?></h2>
                        <div class="row news-wrap" style="background:<?php echo $color[$key%4]?>">
                          <div class="media-wrapper">
                           <span class="media-icon"><i class="fa "></i><span></span></span>
                            <div class="image-container lazyload" style="background-image:url('http://news.thaipbs.or.th/images/preload.jpg');" data-bg="<?=$image;?>">
                              <img class="lazyload img-responsive" src="//news.thaipbs.or.th/media/G0DL5oPyrtt5HBAi4FsM5QhAwlh7A6X4pJIIikZOiEIqkN0R6rpF5p.jpg" alt="<?=$title;?>" data-src="<?=$image;?>">                            </div>
                          </div>
                          <div class="item-content col-xs-12" style="max-height:84px;">
                            <h2><?=$title;?></h2>
                          </div>
						  <div class="clearfix"></div>
						  <p class="hidden" style="padding:0 10px;color:#fff;"><?=DateThai($date);?></p>
                          <div class="clearfix"></div>
                          <a href="<?=$link;?>" target="_blank" class="link-overlay"></a>
                        </div>
                     </article>
<?php
/*
				<article class="news-block  head-big has-tag tag-special news-featured col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <h2 class="hide"><?=$key['title'];?></h2>
                        <div class="row news-wrap" style="background:<?php echo $color[$inx%4]?>">
                          <div class="media-wrapper">
                           <span class="media-icon"><i class="fa "></i><span></span></span>
                            <div class="image-container lazyload" style="background-image:url('http://news.thaipbs.or.th/images/preload.jpg');" data-bg="<?=$key['image']['url'];?>">
                              <img class="lazyload img-responsive" src="//news.thaipbs.or.th/media/G0DL5oPyrtt5HBAi4FsM5QhAwlh7A6X4pJIIikZOiEIqkN0R6rpF5p.jpg" alt="<?=$key['title'];?>" data-src="<?=$key['image']['url'];?>">                            </div>
                          </div>
                          <div class="item-content col-xs-12">
                            <h2><?=$key['title'];?></h2>
                          </div>
						  <p style="padding:0 10px;color:#fff;"><?=DateThai($key['published_time']);?></p>
                          <div class="clearfix"></div>
                          <a href="<?=$key['url'];?>" target="_blank" class="link-overlay"></a>
                        </div>
                     </article>

*/?>
<?php
	}
}


?>



</div>
</div>

	<!---- End Banner --->
                   
                </div>
            </section>

            <div class="clearfix"></div>
            <!--/ TOP NEWS BLOCK -->
    </div>
</div>

<section class="video-section">
 <header class="news-section-header no-line col-xs-12 ">
      <h2><span style="color:#fff;">ภาพบรรยากาศผู้เข้าร่วมกิจกรรม แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน </span></h2>
    </header>
	   <div class="clearfix"></div>
	<div class="video-list" id="jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ">

	</div>
	<div class="controller">
	 <i class="fa fa-angle-left"></i>
	  <i class="fa fa-angle-right"></i>
	  </div>
</section>
            <!-- VeGallery -->
            <!-- VIDEO & GALLERY BLOCK -->
<section class="news-section " id="video-gallery-news-block" >
    <h2 class="hide">วิดีโอ</h2>
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header class="news-section-header no-line col-xs-12 ">
      <h2><span>วิดีโอข่าว</span></h2>
    </header>

    <div class="news-content-list">

<?php
$json = file_get_contents('http://phinder.beta.thaipbs.or.th/api/search/thaipbs/news?type=video&q=%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%87&published_range=last_week');

$getData = json_decode($json,true);
$data = $getData['data'];
usort($data, "sortFunction");
$data = array_reverse($data);
$i=0;
forEach($data as $inx=>$key ){
$i++;
if($i == 1){
?>
       <article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-6 sm-left md-left">
            <h2 class="hide"><?=$key['title'];?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <span class="media-icon media-icon--image"><i class="fa fa-play"></i><span>Video</span></span>
                    <div class="image-container lazyload" style="background-image:url('http://news.thaipbs.or.th/images/preload.jpg')" data-bg="<?=$key['image']['url'];?>">
                    </div>
					<span class="media-time media-icon--image">
					<i class="fa fa-clock-o"></i>
					<span><?=DateThai($key['published_time']);?></span>
					</span>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?=$key['title'];?></h2>
                </div>
                <div class="clearfix"></div>
                <a href="<?=$key['url'];?>" target="_blank" class="link-overlay"></a>
            </div>
        </article>
 <?php
	}
}
$i=0;
forEach($data as $inx=>$key ){
$i++;
if($i > 1 && $i < 11){
?>
       <article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-3 sm-left md-left 
	   <?php if($key['url'] == 'http://news.thaipbs.or.th/clip/641' || $key['url'] == 'http://news.thaipbs.or.th/content/251238'|| $key['url'] == 'http://news.thaipbs.or.th/content/251244' || $key['url'] == 'http://news.thaipbs.or.th/content/251600' || $key['url'] == 'http://news.thaipbs.or.th/clip/1496' || $key['url'] == 'http://news.thaipbs.or.th/clip/1495' || $key['url'] == 'http://news.thaipbs.or.th/content/251578'){echo" hidden";}?>">
            <h2 class="hide"><?=$key['title'];?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <span class="media-icon media-icon--image"><i class="fa fa-play"></i><span>Video</span></span>
					<span class="media-time media-icon--image">
					<i class="fa fa-clock-o"></i>
					<span><?=DateThai($key['published_time']);?></span>
					</span>
                    <div class="image-container lazyload" style="background-image:url('http://news.thaipbs.or.th/images/preload.jpg')" data-bg="<?=$key['image']['url'];?>">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?=$key['title'];?></h2>
                </div>
                <div class="clearfix"></div>
                <a href="<?=$key['url'];?>" target="_blank" class="link-overlay"></a>
            </div>
        </article>
 <?php
	}
?>

 <?php

}
?>
                	        <div class="clearfix"></div>
    </div>
</div>
</div>
</section>



	<!----Banner --->

                    <div id="banner-long" class="col-lg-12">
						<div class="row">
                        <a >
                            <img src="<?php echo get_template_directory_uri(); ?>/images/b1.png" class="img-responsive" alt="บทความวิเคราะห์">
                        </a>
						</div>
                    </div>

					<div class="clearfix"></div>
					




<?php get_footer()?>

<script type="text/javascript">
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}
//var ListID = "PL79NhB6sAwH8GoI0SgtU9LLgXmVB2oxsJ";
var apiKey = 'AIzaSyCVgBBbVx4J9tDEdslvdtDy7GkCINTvBBA';
function getYouTubeInfo(listid) {
	$.ajax({
	url: 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId='+listid+'&maxResults=20&key='+apiKey,
	dataType: "jsonp",
	success: function (data) { parseresults(listid,data); }
	});
}

var token = "1444762879177941|Wc0tNcW_RVe2gJPtYibZa_CTlAQ";
var albumid = '759543544171823';
function getFacebookPhoto() {
	$.ajax({
	url: 'https://graph.facebook.com/'+albumid+'/photos?access_token='+token,
	dataType: "jsonp",
	success: function (data) { parsePhotoData(data); }
	});
}

function parseresults(listid,data) {
	
	  var html = "";
	  var i = 0;
	  //shuffleArray(data.items);
	  $.each(data.items, function(key,val){
        var videoID = val.snippet.resourceId.videoId;
		var title = val.snippet.title;
		var thumb = val.snippet.thumbnails.high.url;
		var link = "http://www.youtube.com/watch?list="+ listid +'&v='+videoID;
		html += "<a target='_blank' href='"+link+"' class='c-"+i%2+"'><div style='text-align: center;'><div class='img'><img src='"+thumb+"'/><div class='play-btn'></div></div><div class='text'>"+title+"</div></div></a>";
		i++;
	  });
	  $("#jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ").html(html);
}

getYouTubeInfo('PL79NhB6sAwH9grBafbNtC_et_icYpubKD')
$(document).ready(function(){
$("i.fa-angle-right").click(function(){
	var size = $("section.video-section").width();
	size = size +40;
	var offset = $("#jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ").offset();
	if(offset.left > -500){
$("#jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ").animate({
	left: "-="+size
	}, 1000);
		}
});
$("i.fa-angle-left").click(function(){
	var size = $("section.video-section").width();
	size = size +40;
	var offset = $("#jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ").offset();
	if(offset.left < 0){
$("#jp-container-PL79NhB6sAwH9UkDQSFMcG9JTtzxDHToeJ").animate({
	left: "+="+size
	}, 1000);
		}
});

$('#carousel-example-captions').carousel({
  interval: 7000
})

});
</script>