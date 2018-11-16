<?php get_header();?>
<?php 
$activityrel = get_field('activityrel');
$videorel = get_field('videorel');
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
							<li><a target="_blank" href="<?php bloginfo('url'); ?>">หน้าหลัก</a></li>
							
							<li><span class="sep">&gt;</span></li>
							<li><a target="_blank" href="/project"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>
					<div class="news-section hidden">
					<header class="news-section-header no-line col-xs-12 ">
						  <h2><span><?php the_title()?></span></h2>
						</header>
					</div>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>

<div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-md-9">
					<div class="col-xs-12 col-md-12">
                        <div class="row content-article-content entry-content">
<?php
$title = get_the_title(1077);
$link = get_permalink(1077);
$leadtext = get_field('leadtext',1077);
$get_image = get_field('thumb',1077);
$image = $get_image['sizes']['large'];
?>
<div class="news-section">
					<header class="news-section-header no-line col-xs-12 " style="padding-left:0;margin-bottom:15px;">
						  <h2><span>รายละเอียดกิจกรรมชวนแข่งขันประหยัดน้ำ</span></h2>
					</header>
</div>
<div class="col-lg-6 col-xs-12 pull-right">
	<div class="row">
	<img class="lazyload img-responsive" src="<?=$image?>" alt="<?=$key['title'];?>" style="margin-bottom:10px;padding-right:10px;"/>
	</div>
</div>
   <?=${leadtext}?>
<a target="_blank" href="<?=$link; ?>" target="_blank"> อ่านต่อ </a>
						
	</div>
</div>



                    <!-- MEDIA -->
                    <section class="news-section">
                        <div class="news-content-list">
                            <div class="row">
                              <article class="news-block head-big media-link media-video has-tag tag-special news-featured content-featured col-xs-12">
                                <div class="row news-wrap">
                                  <div class="media-wrapper">
                                                 
                                    <!-- <span class="media-time">5.34</span> -->
									<?php if(!empty($large)){?>
                                                                          <img class=" img-responsive lazyloaded" src="<?=$large?>" alt="<?php the_title()?>" data-src="<?=$large?>">   
									<?php }?>									
									</div>
                                  
                                  
                                  <div class="clearfix"></div>
                                 <!--  <a target="_blank" href="detail.html" class="link-overlay"></a> -->
                                </div>
                              </article>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <!--/ MEDIA -->


<section class="news-section " id="video-gallery-news-block">
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header class=" news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>กิจกรรมร่วมสนุก</span></h2>
    </header>

    <div class="news-content-list">

<?php
$title = get_the_title(1382);
$link = get_permalink(1382);
$leadtext = get_field('abstract',1382);
$get_image = get_field('thumb',1382);
$image = $get_image['sizes']['large'];
		

?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-6 sm-left md-left">
            <h2 class="hide"><?=$title?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2 style="font-size:16px;"><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a target="_blank" href="<?=$link?>"  target="_blank" class="link-overlay"></a>
            </div>
        </article>



<?php
$title = get_the_title(992);
$link = get_permalink(992);
$leadtext = get_field('leadtext',992);
$get_image = get_field('thumb',992);
$image = $get_image['sizes']['large'];
?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-6 sm-left md-left">
            <h2 class="hide"><?=$title?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2 style="font-size:16px;"><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a target="_blank" href="<?=$link?>"  target="_blank" class="link-overlay"></a>
            </div>
        </article>



    <div class="clearfix"></div>
    </div>
</div>
</div>
</section>



<section class="news-section " id="video-gallery-news-block">
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header class=" news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>วิดีโอกิจกรรมต่างๆ</span></h2>
    </header>

    <div class="news-content-list">

<?php 

forEach($videorel as $key=>$post){
	
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	
	if($type == "youtube"){
	$image = "http://img.youtube.com/vi/".$id."/hqdefault.jpg";
	}else{
	$get_image = get_field('thumbnail',$post->ID);
	$image = $get_image['sizes']['large'];
	}
?>
<article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-6 sm-left md-left">
            <h2 class="hide"><?=$title?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2 style="font-size:16px;"><?=$title;?></h2>
                </div>
                <div class="clearfix"></div>
                <a target="_blank" href="<?=$link?>"  target="_blank" class="link-overlay"></a>
            </div>
        </article>
<?php }?>

    <div class="clearfix"></div>
    </div>
</div>
</div>
</section>


                </div>
                <!--/ LEFT SIDE -->
								<div class="col-xs-12 col-lg-3">
				<div class="row">
					


						            <a class="twitter-timeline"  href="https://twitter.com/hashtag/WaterSharing" data-widget-id="706647192526671872">#WaterSharing Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
				</div>
				</div>



	</article>
</section>



<?php get_footer();?>
<style>
.post-views-count{display:none;}
.content-article-content h1, .content-article-content h2, .content-article-content h3, .content-article-content h4, .content-article-content h5, .content-article-content h6{border-bottom:none;}
</style>