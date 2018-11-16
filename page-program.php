<?php 
$water = get_field('waterclip');
$videos = get_field('programrel');
get_header();?>
 <script>
            function loadCSS(e,n,o,t){"use strict";var d=window.document.createElement("link"),i=n||window.document.getElementsByTagName("script")[0],r=window.document.styleSheets;return d.rel="stylesheet",d.href=e,d.media="only x",t&&(d.onload=t),i.parentNode.insertBefore(d,i),d.onloadcssdefined=function(e){for(var n,o=0;o<r.length;o++)r[o].href&&r[o].href===d.href&&(n=!0);n?e():setTimeout(function(){d.onloadcssdefined(e)})},d.onloadcssdefined(function(){d.media=o||"all"}),d}
            loadCSS("http://program.thaipbs.or.th/app/front/css/style.min.css?version=1.0.95");
        </script>


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
							<li><a target="_blank" href="/watersharing/program"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>
                    <header class="col-xs-12 col-md-8 hide">
                        <h1 class="content-title" itemprop="headline"><?php the_title()?></h1>
                    </header>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
		<div class="container ">
            <div class="row">

                <div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-md-12">
					<div class="program-detail-cover  lazyloaded" style="background-image: url('http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/04/41qhwtzp.png'); background-color: rgb(130, 128, 126); background-size: cover;"></div>




<section class="news-section " id="video-gallery-news-block">
<div class="row">
    <header class="news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>คลิปย้อนหลังลดน้ำ 30 %</span></h2>
    </header>
	<div class="news-content-list">

<?php 

forEach($water as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	//$get_image = get_field('thumbnail',$post->ID);
	//print_r($get_image);
	//$image = $get_image['sizes']['large'];
	$image = "http://img.youtube.com/vi/".$id."/hqdefault.jpg";
	//if(empty($image) && ($type == 'youtube')){$image="http://img.youtube.com/vi/".$id."/hqdefault.jpg";}else if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
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
                <a target="_blank" href="<?=$link?>" class="link-overlay"></a>
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
      <h2><span>คลิปรายการอื่นๆที่เกี่ยวข้อง</span></h2>
    </header>
	<div class="news-content-list">

<?php 

forEach($videos as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	//$get_image = get_field('thumbnail',$post->ID);
	//print_r($get_image);
	//$image = $get_image['sizes']['large'];
	$image = "http://img.youtube.com/vi/".$id."/hqdefault.jpg";
	//if(empty($image) && ($type == 'youtube')){$image="http://img.youtube.com/vi/".$id."/hqdefault.jpg";}else if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
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
                <a target="_blank" href="<?=$link?>" class="link-overlay"></a>
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
    <header class="news-section-header no-line col-xs-12 " style="">
      <h2><span>คลิปย้อนหลังรู้สู้ภัยแล้ง</span></h2>
    </header>
	</div>


<article class="program-detail-info">
    <div class="media-wrapper">
        <a href="http://program.thaipbs.or.th/FightDrought/episodes/36547">
          <div class="image-container">
                          <img src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/episode/1/AG/SZ/1AGSZmhDEaZN-large.jpg" data-src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/episode/1/AG/SZ/1AGSZmhDEaZN-large.jpg" class="img-responsive  lazyloaded" alt="ประเด็นข่าว (18 มี.ค. 59)">
                      </div>
                    <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
                  </a>
    </div>
    <div class="item-content">
      <div class="content-holder">
                <label class="pre">ตอนล่าสุด</label>
                        <h2 class="title">
            <a href="http://program.thaipbs.or.th/FightDrought/episodes/36547">ประเด็นข่าว (18 มี.ค. 59)</a>
        </h2>
                <h3 class="date">ออกอากาศ 18 มี.ค. 59</h3>
        <span class="sep"></span>
                  <div class="detail">
            <p>พบกับประเด็นข่าว...เฝ้าระวังตลิ่งริมแม่น้ำน้อยทรุดตัวเพิ่ม...เกษตรกร จ.สิงห์บุรีขุดบ่อน้ำตื้นรับมือภัยแล้ง ในรายการรู้สู้ภัยแล้ง วันที่ 18 มี.ค.นี้ เวลา 18.25 น. ทางไทยพีบีเอส</p>
          </div>
                <div class="buttons">
                          <a href="http://program.thaipbs.or.th/FightDrought/episodes/36547" class="btn btn-grey">
                รายละเอียด
              </a>
                                  <a href="http://program.thaipbs.or.th/watch/isT4yM" class="btn btn-orange">
              คลิปย้อนหลัง
            </a>
                  </div>
      </div>
    </div>
          <a href="http://program.thaipbs.or.th/FightDrought/episodes/36547" class="link-overlay"></a>
      </article>



<section class="teaser-block">
  <header>
    <h2> ชมย้อนหลัง เต็มรายการ
            <a href="http://program.thaipbs.or.th/FightDrought/videos/show" class="view-all">ดูทั้งหมด &gt;</a>
          </h2>
  </header>

  <div class="teaser-list">
                <article class="program-block program-block--list program-block--large col-xs-12 col-sm-4 col-md-6">
        <div class="media-wrapper">
          <div class="image-container">
                          <img src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/Tp/1AGTpew82EuD-default.jpg" data-src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/Tp/1AGTpew82EuD-default.jpg" class="img-responsive  lazyloaded" alt="ประเด็นข่าว (18 มี.ค. 59)">
                      </div>
          <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
        </div>
        <div class="item-content">
          <div class="content-holder">
            <h2 class="title">รู้สู้ภัยแล้ง</h2>
            <h3 class="subtitle">ประเด็นข่าว (18 มี.ค. 59)</h3>
          </div>
        </div>
        <div class="bg"></div>
        <a href="http://program.thaipbs.or.th/watch/FKL60Z" class="link-overlay"></a>
      </article>
                      <article class="program-block program-block--list col-xs-12 col-sm-4 col-md-3">
        <div class="media-wrapper">
          <div class="image-container">
                          <img srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-small.jpg 160w" sizes="263px" src="http://program.thaipbs.or.th/app/front/images/preload.jpg" data-sizes="auto" data-src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-medium.jpg" data-srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AG/wR/1AGwRysafdqI-small.jpg 160w" class="img-responsive  lazyautosizes lazyloaded" alt="ประเด็นข่าว (17 มี.ค. 59)">
                      </div>
          <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
        </div>
        <div class="item-content">
          <div class="content-holder">
            <h2 class="title">รู้สู้ภัยแล้ง</h2>
            <h3 class="subtitle">ประเด็นข่าว (17 มี.ค. 59)</h3>
          </div>
        </div>
        <div class="bg"></div>
        <a href="http://program.thaipbs.or.th/watch/h791Sr" class="link-overlay"></a>
      </article>
                      <article class="program-block program-block--list col-xs-12 col-sm-4 col-md-3">
        <div class="media-wrapper">
          <div class="image-container">
                          <img srcset="https://img.youtube.com/vi/tVy79hYETM0/mqdefault.jpg 320w,
                  https://img.youtube.com/vi/tVy79hYETM0/mqdefault.jpg 640w,
                  https://img.youtube.com/vi/tVy79hYETM0/default.jpg 160w" sizes="263px" src="http://program.thaipbs.or.th/app/front/images/preload.jpg" data-sizes="auto" data-src="https://img.youtube.com/vi/tVy79hYETM0/mqdefault.jpg" data-srcset="https://img.youtube.com/vi/tVy79hYETM0/mqdefault.jpg 320w,
                  https://img.youtube.com/vi/tVy79hYETM0/mqdefault.jpg 640w,
                  https://img.youtube.com/vi/tVy79hYETM0/default.jpg 160w" class="img-responsive  lazyautosizes lazyloaded" alt="ประเด็นข่าว (16 มี.ค. 59)">
                      </div>
          <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
        </div>
        <div class="item-content">
          <div class="content-holder">
            <h2 class="title">รู้สู้ภัยแล้ง</h2>
            <h3 class="subtitle">ประเด็นข่าว (16 มี.ค. 59)</h3>
          </div>
        </div>
        <div class="bg"></div>
        <a href="http://program.thaipbs.or.th/watch/RBj4y4" class="link-overlay"></a>
      </article>
                      <article class="program-block program-block--list col-xs-12 col-sm-4 col-md-3">
        <div class="media-wrapper">
          <div class="image-container">
                          <img srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-small.jpg 160w" sizes="263px" src="http://program.thaipbs.or.th/app/front/images/preload.jpg" data-sizes="auto" data-src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-medium.jpg" data-srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/NI/1AFNIPjqbyFT-small.jpg 160w" class="img-responsive  lazyautosizes lazyloaded" alt="ประเด็นข่าว (15 มี.ค. 59)">
                      </div>
          <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
        </div>
        <div class="item-content">
          <div class="content-holder">
            <h2 class="title">รู้สู้ภัยแล้ง</h2>
            <h3 class="subtitle">ประเด็นข่าว (15 มี.ค. 59)</h3>
          </div>
        </div>
        <div class="bg"></div>
        <a href="http://program.thaipbs.or.th/watch/k9LFke" class="link-overlay"></a>
      </article>
                      <article class="program-block program-block--list col-xs-12 col-sm-4 col-md-3">
        <div class="media-wrapper">
          <div class="image-container">
                          <img srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-small.jpg 160w" sizes="263px" src="http://program.thaipbs.or.th/app/front/images/preload.jpg" data-sizes="auto" data-src="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-medium.jpg" data-srcset="https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-medium.jpg 320w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-large.jpg 459w,
                  https://thaipbs-program.s3-ap-southeast-1.amazonaws.com/content/images/video/1/AF/rR/1AFrRtgSfKfg-small.jpg 160w" class="img-responsive  lazyautosizes lazyloaded" alt="ประเด็นข่าว (14 มี.ค. 59)">
                      </div>
          <div class="play-button">
            <i class="fa fa-play"></i>
          </div>
        </div>
        <div class="item-content">
          <div class="content-holder">
            <h2 class="title">รู้สู้ภัยแล้ง</h2>
            <h3 class="subtitle">ประเด็นข่าว (14 มี.ค. 59)</h3>
          </div>
        </div>
        <div class="bg"></div>
        <a href="http://program.thaipbs.or.th/watch/yTqITn" class="link-overlay"></a>
      </article>
          
  </div><!--/.teaser-list -->
</section>



</section>







					
                </div>
                <!--/ LEFT SIDE -->


	</article>
</section>



<?php get_footer();?>
<style>
.post-views-count{display:none;}