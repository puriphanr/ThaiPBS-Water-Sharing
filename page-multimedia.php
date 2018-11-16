<?php get_header();

$info = get_field('Infographic');
$videos = get_field('videos');
$photos = get_field('photos');


?>

<section class="content-detail">
    <h2 class="hide"><?php the_title()?></h2>
    <article class="content-article-detail ">
        <h2 class="hide"><?php the_title()?></h2>
        <div class="content-title-holder">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php bloginfo('url'); ?>">หน้าหลัก</a></li>
							
							<li><span class="sep">&gt;</span></li>
							<li><a href="/economy"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>

                </div>
			</div>
		</div>
		<div class="container ">
            <div class="row">

                <div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-md-9">








<section class="news-section " id="video-gallery-news-block">
<div class="row">
    <header class="news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>ไทยพีบีเอส ชวนคนไทยร่วมกันประหยัดน้ำ</span></h2>
    </header>
	<div class="news-content-list">
<?php 
forEach($videos as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	$get_image = get_field('thumbnail',$post->ID);
	$image = $get_image['sizes']['large'];
	if(empty($image) && ($type == 'youtube')){$image="http://img.youtube.com/vi/".$id."/hqdefault.jpg";}else if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-4 sm-left md-left">
            <h2 class="hide"><?=$title;?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a href="<?=$link?>" class="link-overlay" target="_blank"></a>
            </div>
        </article>
<?php
}
?>
</div>
</div>
</section>










<section class="news-section " id="video-gallery-news-block">
<div class="row">
    <header class="news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>วิดีโอ Infographic</span></h2>
    </header>
	<div class="news-content-list">
<?php 
forEach($info as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	$get_image = get_field('thumbnail',$post->ID);
	$image = $get_image['sizes']['large'];
	if(empty($image) && ($type == 'youtube')){$image="http://img.youtube.com/vi/".$id."/hqdefault.jpg";}else if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-4 sm-left md-left">
            <h2 class="hide"><?=$title;?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a href="<?=$link?>" class="link-overlay"></a>
            </div>
        </article>
<?php
}
?>
</div>
</div>
</section>










<section class="news-section " id="video-gallery-news-block">
<div class="row">
    <header class="news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>กราฟิก</span></h2>
    </header>
	<div class="news-content-list">
<?php 
forEach($photos as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	$get_image = get_field('thumb',$post->ID);
	$image = $get_image['sizes']['large'];
	if(empty($image) && ($type == 'youtube')){$image="http://img.youtube.com/vi/".$id."/hqdefault.jpg";}else if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-4 sm-left md-left">
            <h2 class="hide"><?=$title;?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a href="<?=$link?>" target="_blank" class="link-overlay"></a>
            </div>
        </article>
<?php
}
?>
</div>
</div>
</section>











                </div>
                <!--/ LEFT SIDE -->

				<div class="col-xs-12 col-lg-3">
				<div class="row">
					<div class="news-section">
							<div class="news-block banner-right-wrap" style="background:#69C5EA;padding-bottom:50px;overflow:hidden;">
							
							<a href="http://event.thaipbs.or.th/watersharing/%E0%B8%81%E0%B8%B4%E0%B8%88%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%99%E0%B8%81%E0%B8%AD%E0%B8%B2%E0%B8%AA%E0%B8%B2-%E0%B8%AA%E0%B8%B9%E0%B9%89%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B9%81%E0%B8%A5/">
								<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 nopad">
									<div class="banner-right" style="background:#69C5EA;">
										<h2>อัพเดทกิจกรรม  </h2>
										<h3>“นกอาสา สู้ภัยแล้ง”</h3>
										<p style="width:80%;padding:20px 0px;line-height:1.5em;">ภายใต้โครงการรณรงค์ "แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง" โดยมีคำขวัญที่ว่า "เราจะฝ่าวิกฤตภัยแล้งนี้ไปด้วยกัน"</p>
										
									</div>
								</div>
								<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 nopad">
									<img src="http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/logo_nokarsa-1.jpg" class="img-responsive" style="width:100%">
								</div>
							</a>
							</div>
						</div>


						            <a class="twitter-timeline"  href="https://twitter.com/hashtag/WaterSharing" data-widget-id="706647192526671872">#WaterSharing Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
				</div>
				</div>
	</article>
</section>



<?php get_footer();?>
<style>
.post-views-count{display:none;}