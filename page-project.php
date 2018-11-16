<?php get_header();?>

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
					<div class="news-section">
					<header class="news-section-header no-line col-xs-12 ">
						  <h2><span><?php the_title()?></span></h2>
						</header>
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



                    <div class="col-xs-12 col-md-12">
                        <div class="row content-article-content entry-content">

<?php

$query = 'posts_per_page=1&post_id=117&cat=2';
$queryObject = new WP_Query($query);
if ($queryObject->have_posts()) {
		$queryObject->the_post();
		$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'default' );
		$title = get_the_title();
		$link = get_permalink();
		$date = get_the_date();
		$get_image = get_field('thumb');
		$image = $get_image['sizes']['large'];
		if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
		//$content = get_the_content();
		//$content = strip_tags($content);
		

}

?>
<div class="col-lg-6 col-xs-12">
	<div class="row">
	<img class="lazyload img-responsive" src="<?=$image?>" alt="<?=$key['title'];?>" style="margin-bottom:10px;padding-right:10px;"/>
	</div>
</div>
<?php echo get_field('abstract'); ?>...    
<a target="_blank" href="<?php the_permalink(); ?>" target="_blank"> อ่านต่อ </a>
						
	</div>
</div>


                    <div class="col-xs-12 col-md-12">
                        <div class="row content-article-content entry-content">

<?php


		$link = get_permalink(734);

		$get_image = get_field('thumb',734);
		$image = $get_image['sizes']['large'];

		


?>
<div class="news-section">
					<header class="news-section-header no-line col-xs-12 " style="padding-left:0;margin-bottom:15px;">
						  <h2><span>รายละเอียดกิจกรรมนกอาสา</span></h2>
					</header>
</div>
<div class="col-lg-6 col-xs-12 pull-right">
	<div class="row">
	<img class="lazyload img-responsive" src="<?=$image?>" alt="<?=$key['title'];?>" style="margin-bottom:10px;padding-right:10px;"/>
	</div>
</div>
กิจกรรม "นกอาสา สู้ภัยแล้ง" เกิดจากแรงบันดาลใจในการทำหน้าที่สื่อสาธารณะ ซึ่งได้พบเห็นความทุกข์ยากเดือดร้อนจากวิกฤตภัยแล้งที่รุนแรงในหลายพื้นที่ของประเทศที่ความช่วยเหลือหรือการแก้ไขปัญหาจากภาครัฐยังหยิบยื่นหรือเดินทางไปไม่ถึง เจ้าหน้าที่และพนักงานของไทยพีบีเอสได้รวมตัวกันระดมความช่วยเหลือทั้งแรงกาย สติปัญญาเพื่อแก้ไขเยียวยา หรือ บรรเทาปัญหาในรูปแบบของค่ายอาสาพัฒนาชนบทและรวมทั้งรูปแบบค่ายศึกษาแลกเปลี่ยนเรียนรู้จากภูมิปัญญาชาวบ้านในการช่วยกันแก้ไขปัญหาภัยแล้งดังกล่าว ภายใต้โครงการรณรงค์ "แบ่งน้ำใช้ ปัญน้ำใจ สู้ภัยแล้ง" โดยมีคำขวัญที่ว่า "เราจะฝ่าวิกฤตภัยแล้งนี้ไปด้วยกัน"...    
<a target="_blank" href="<?=$link; ?>" target="_blank"> อ่านต่อ </a>
						
	</div>
</div>
























<section class="news-section " id="video-gallery-news-block">
    <h2 class="hide">ข่าวโครงการ “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง”</h2>
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header class="news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>ข่าวโครงการ “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง”</span></h2>
    </header>

    <div class="news-content-list">
<?php
$query = 'posts_per_page=6&cat=5';
$queryObject = new WP_Query($query);
if ($queryObject->have_posts()) {
	while($queryObject->have_posts()) {
		$queryObject->the_post();
		$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'default' );
		$title = get_the_title();
		//$link = get_permalink();
		$link = get_field('abstract');
		$date = get_the_date();
		$get_image = get_field('thumb');
		$image = $get_image['sizes']['large'];
		if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
		
?>
       <article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-4 sm-left md-left">
            <h2 class="hide"><?php the_title();?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2 style="font-size:16px;"><?php the_title();?></h2>
                </div>
                <div class="clearfix"></div>
                <a target="_blank" href="<?=$link?>"  target="_blank" class="link-overlay"></a>
            </div>
        </article>

<?php } 
}
?>

    <div class="clearfix"></div>
    </div>
</div>
</div>
</section>






<section class="news-section  hidden" id="video-gallery-news-block">
    <h2 class="hide">Partner</h2>
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header style="margin-bottom:15px;" class="news-section-header no-line col-xs-12 ">
      <h2><span>Partner</span></h2>
    </header>

    <div class="news-content-list">
<?php
//$blogusers = get_users('role=subscriber');
/*$args = array( 'post_type' => 'org' );
$blogusers = new WP_Query( $args );
	while($blogusers->have_posts()) {
		$blogusers->the_post();
		$title = get_the_title();
		$img = get_field('logo');
		$image = $img['sizes']['thumbnail'];*/
?>


<div class="col-lg-4">
<article id="event" class="news-block has-detail media-left-sm has-tag tag-focus with-padding tpbs-focus-block news-item-list">
                                <h2 class="hide"><?=$title;?></h2>
                                <div class="row news-wrap">
								  <div class="">
									 <a class="media-wrapper">
                                        <div class="image lazyloaded" style="border:1px solid #000;background-image: url('http://news.thaipbs.or.th/images/preload.jpg');">
                                            <img class="lazyload img-responsive" src="<?=$image;?>" alt="<?=$title;?>" data-src="<?=$image;?>">                       </div>
                                    </a>
									</div>
                                   <div class="">
                                    <a class="item-content">
                                        <div class="item-meta">
                                            <div class="category hide">   ภัยแล้ง  </div>
                                        </div>
                                        <h2><?=$title;?></h2>
                                        <p class="summary hidden"></p>

                                        <div class="clearfix"></div>
                                    </a>
									</div>

                                    <div class="clearfix"></div>
                                </div>
</article>
</div>

<?php //} 
?>

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


<section>
<marquee>
<?php for($i=1;$i<=11;$i++){?>
<img src="<?php echo get_template_directory_uri(); ?>/images/new/pic_<?=$i?>.jpg"/>
<?php }?>
</marquee>
</section>
<?php get_footer();?>
<style>
.post-views-count{display:none;}