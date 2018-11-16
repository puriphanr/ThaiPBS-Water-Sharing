<?php

 $category = get_the_category();
// print_r($category);
 $image =  get_field('thumb');
 if(!empty($image)){
 $large = $image['sizes']['large'];
 }else{
 $large = "";
 }
$postid = get_the_ID();
$videorel = get_field('videorel');
$embed = get_field('link');
$type = get_field('type');
$leadtext = get_field('abstract');
if(empty($leadtext)){
$leadtext = get_the_title();
}
if(empty($type)){
	$type = "youtube";
}
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
							<li><a ><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>
                    <header class="col-xs-12 col-md-8">
                        <h1 class="content-title" itemprop="headline"><?php the_title()?></h1>
                    </header>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
		<div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="content-meta">
                        <i class="fa fa-clock-o"></i> <span><?php echo get_the_date('H:i') ; ?></span>
                        <i class="sep"> | </i>
                        <i class="fa fa-calendar-o"></i> <span> <?php echo get_the_date('F j, Y') ; ?></span>
                        <i class="sep"> | </i>
                        <i class="fa fa-eye"></i> <span class="postview"></span> 
                    </div>
                </div>
                <div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-md-8">
                    <!-- MEDIA -->
                    <section class="news-section">
                        <div class="news-content-list">
                            <div class="row">
                              <article class="news-block head-big media-link media-video has-tag tag-special news-featured content-featured col-xs-12">
                                <div class="row news-wrap">
                                  <div class="media-wrapper">
                                                 
                                    <!-- <span class="media-time">5.34</span> -->
									<?php  $gallery = get_post_gallery_images(get_the_ID(),false); 
												if(!empty($gallery)){
													$img = 0;
									?>
									<div id="carousel-example-captions" class="carousel slide" data-ride="carousel"> 
										<div class="carousel-inner" role="listbox"> 
									<?php
												forEach($gallery as $image){
									?>
									<div class="item <?php if($img==0)echo"active";?>"> 
										<img data-holder-rendered="true" src="<?=$image?>" data-src="//news.thaipbs.or.th/media/G0DL5oPyrtt5HBAi4FsMYQcy7WLaHFU69xjKwL0MmR8dReI0aRiwn7.png" alt="750x422"> 
										<div class="carousel-caption hidden"> <h3>Gallery</h3> <p>image <?=$img?></p> </div>
									</div>
									<?php $img++;}?>
									</div>
									<ol class="carousel-indicators"> 
									<?php for($i=0;$i<$img;$i++){?>
									<li data-target="#carousel-example-captions" data-slide-to="<?=$i?>" class="<?php if($i==0)echo"active";?>"></li>
									<?php }?>
									</ol> 
									<a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
									<?php }else if(!empty($large)){?>
                                                                          <img class=" img-responsive lazyloaded" src="<?=$large?>" alt="<?php the_title()?>" data-src="<?=$large?>">   
									<?php }else if(!empty($embed)){?>	
										<?php if($type == "facebook"){?>
										<div id="fb-root"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<div class="fb-video" data-href="<?=$embed?>" data-width="500">
										 <div class="fb-xfbml-parse-ignore">
											<blockquote cite="<?=$embed?>">
											   <a href="<?=$embed?>"><?=$title?></p>
											</blockquote>
										 </div>
									  </div>
										<?php }else if($type == "thaipbs"){?>
										<div class="embed-responsive embed-responsive-16by9">
										<iframe src="http://vod.thaipbs.or.th/videos/<?=$embed?>/embedded" class="embed-responsive-item"></iframe>
										</div>
										<?php }else{?>
										<div class="embed-responsive embed-responsive-16by9">
										<iframe src="https://www.youtube.com/embed/<?=$embed?>?autoplay=1" class="embed-responsive-item"></iframe>
										</div>
										<?php }?>
									<?php }?>
									</div>
                                  
                                  
                                  <div class="clearfix"></div>
                                 <!--  <a href="detail.html" class="link-overlay"></a> -->
                                </div>
                              </article>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                    <!--/ MEDIA -->
					<div class="content-social-sharing col-md-3">
                        <div class="row">
                            <div class="col-xs-9 col-md-12">
                                <div class="row">
                                    <div class="social-title">
                                        <div class="icn">
                                            <i class="fa fa-share-alt"></i>
                                        </div>
                                        <h3>แบ่งปัน</h3>
                                    </div>
                                    <div class="social-btn-list">
                                        <div class="social-btn fb">
                                            <div fb-iframe-plugin-query="app_id=&amp;container_width=183&amp;href=<?php the_permalink();?>&amp;layout=button_count&amp;locale=en_GB&amp;sdk=joey" fb-xfbml-state="rendered" class="fb-share-button fb_iframe_widget" data-href="<?php the_permalink();?>" data-layout="button_count"><span style="vertical-align: bottom; width: 88px; height: 20px;"><iframe class="" src="http://www.facebook.com/v2.3/plugins/share_button.php?app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df1536c0b98ef9a6%26domain%3Dnews.thaipbs.or.th%26origin%3Dhttp%253A%252F%252Fnews.thaipbs.or.th%252Ff2ee5dfdad096e8%26relation%3Dparent.parent&amp;container_width=183&amp;href=<?php the_permalink();?>&amp;layout=button_count&amp;locale=en_GB&amp;sdk=joey" style="border: medium none; visibility: visible; width: 88px; height: 20px;" title="fb:share_button Facebook Social Plugin" scrolling="no" allowfullscreen="true" allowtransparency="true" name="f265fa5268c99cc" frameborder="0" height="1000px" width="1000px"></iframe></span></div>
                                        </div>

                                        <div class="social-btn gplus">
                                            <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;"><iframe title="+1" data-gapiattached="true" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fnews.thaipbs.or.th&amp;url=<?php the_permalink();?>&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_GB.ocSOssjDg14.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNoJSipLXsH5J9A9YAfo9pJ-lbwEQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1457323644373&amp;parent=http%3A%2F%2Fnews.thaipbs.or.th&amp;pfname=&amp;rpctoken=62806299" name="I0_1457323644373" id="I0_1457323644373" vspace="0" tabindex="0" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" scrolling="no" marginwidth="0" marginheight="0" hspace="0" frameborder="0" width="100%"></iframe></div>
                                        </div>

                                        <div class="social-btn tw">
                                            <?php /*<iframe data-url="<?=get_the_guid();?>" src="http://platform.twitter.com/widgets/tweet_button.b212c8422d3b3079acc6183618b32f10.th.html#dnt=false&hashtags=WaterSharing,ThaiPBS&id=twitter-widget-0&lang=th&type=share&text=<?=$leadtext?>&url=<?=get_the_guid();?>&original_referer=<?=get_the_guid();?>" title="Twitter Tweet Button" style="position: static; visibility: visible; width: 51px; height: 20px;" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" allowtransparency="true" scrolling="no" id="twitter-widget-0" frameborder="0"></iframe>
											*/ ?>
											<a class="twitter-share-button"  href="https://twitter.com/share"  data-size="small"  data-url="<?=get_the_guid();?>"  data-via=""  data-related=""  data-hashtags="WaterSharing,ThaiPBS"  data-text="<?=$leadtext?>">Tweet</a>
                                        </div>

                                        <div class="social-btn line">
                                            <span>
                                                <script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411"></script>
                                                <script type="text/javascript">
                                                new media_line_me.LineButton({"pc":false,"lang":"en","type":"a"});
                                                </script>
                                            </span>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-12">
                                <div class="row">
                                    <ul class="social-sharing">
                                      <li class="hidden-xs hidden-sm first">
                                        <a href="javascript:window.print()"><i class="fa fa-print"></i></a>
                                      </li>
                                      <li>
                                        <a href="mailto:webmaster@thaipbs.or.th?Subject=<?php the_title()?>&amp;body=<?php the_permalink();?>" target="_top"><i class="fa fa-envelope"></i></a>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-xs-12 col-md-9">
                        <div class="content-article-content entry-content">
							<?php the_content(); ?>              
						</div>
                    </div>
<?php
if($postid == 734){
?>
<section class="news-section " id="video-gallery-news-block">
    <h2 class="hide">นกอาสา</h2>
<div class="" style="width:100%;overflow:hidden;">
<div class="row">
    <header style="margin-bottom:15px;" class="news-section-header no-line col-xs-12 ">
      <h2><span>ค่ายนกอาสา</span></h2>
    </header>

    <div class="news-content-list">
<?php
$query = 'posts_per_page=9&cat=4';
$queryObject = new WP_Query($query);
if ($queryObject->have_posts()) {
	while($queryObject->have_posts()) {
		$queryObject->the_post();
		$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'default' );
		$title = get_the_title();
		$link = get_permalink();
		$date = get_the_date();
		$get_image = get_field('thumb');
		$image = $get_image['sizes']['large'];
		if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
		
?>
       <article class="news-block head-big media-link media-video with-padding col-xs-12 col-sm-6 sm-left md-left">
            <h2 class="hide"><?php the_title();?></h2>
            <div class="row news-wrap">
                <div class="media-wrapper">
                    <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image?>&quot;);">
                    </div>
                </div>
                <div class="item-content col-xs-12">
                    <h2><?php the_title();?></h2>
                </div>
                <div class="clearfix"></div>
                <a target="_blank" href="<?=$link?>" class="link-overlay"></a>
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
<?php }?>

                </div>

                <!--/ LEFT SIDE -->
				<!-- RIGHT SIDE -->
				<div class="col-xs-12 col-md-4">
                    <!-- POPULAR NEWS BLOCK -->



<?php if(!empty($videorel)){
$headline="ไฮไลท์วิดีโอ";
if($postid == 321){
$headline="คลิปย้อนหลัง นกอาสาสู้ภัยแล้ง";
}
?>

                    <section class="news-section popular-news-list">
                <header class="news-section-header col-xs-12">
                    <h2><span><?=$headline?></span></h2>
                </header>
                <div class="news-content-list">
<?php
$i=0;
forEach($videorel as $inx=>$key ){
$i++;
$type = get_field('type',$key->ID);
$id = get_field('link',$key->ID);
if($type == "youtube"){
$image = "http://img.youtube.com/vi/".$id."/hqdefault.jpg";
}else{
$get_image = get_field('thumbnail',$key->ID);
$image = $get_image['sizes']['medium'];
}

?>
                    <article class="news-block media-left no-row col-xs-12">
                        <h2 class="hide"><?=$key->post_title?></h2>
                        <div class="row news-wrap">
                            <div class="media-wrapper">
                                <label class="number <?php if($i<=2){echo"orange";} ?>"><?=$i?></label>
                                <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$image;?>&quot;);">
                                	<img class="lazyload img-responsive" src="<?=$image;?>" alt="<?=$key->post_title;?>" data-src="<?=$image;?>">                                </div>
                            </div>
                            <div class="item-content">
                                <h2><?=$key->post_title?></h2>
                            </div>
                            <div class="clearfix"></div>
                            <a href="<?=$key->guid;?>" target="_blank" class="link-overlay"></a>
                        </div>
                    </article>
<?php 

}
?>
                </div>
            </section>
<?php }else{?>



<?php /*
<section class="news-section popular-news-list">
    <h2 class="hide">ข่าวล่าสุด</h2>
                <header class="news-section-header col-xs-12">
                    <h2><span>ข่าวล่าสุด</span></h2>
                </header>
                <div class="news-content-list">
<?php
$json = file_get_contents('http://phinder.beta.thaipbs.or.th/api/search/thaipbs/news?type=news&q=%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%87&page=1');

$getData = json_decode($json,true);
$data = $getData['data'];
$i=0;

forEach($data as $inx=>$key ){
$i++;
if($i <=5){
?>
                    <article class="news-block media-left no-row col-xs-12">
                        <h2 class="hide"><?=$key['title']?></h2>
                        <div class="row news-wrap">
                            <div class="media-wrapper">
                                <label class="number <?php if($i<=2){echo"orange";} ?>"><?=$i?></label>
                                <div class="image-container  lazyloaded" style="background-image: url(&quot;<?=$key['image']['url'];?>&quot;);">
                                	<img class="lazyload img-responsive" src="<?=$key['image']['url'];?>" alt="<?=$key['title'];?>" data-src="<?=$key['image']['url'];?>">                                </div>
                            </div>
                            <div class="item-content">
                                <h2><?=$key['title'];?></h2>
                            </div>
                            <div class="clearfix"></div>
                            <a href="<?=$key['url'];?>" target="_blank" class="link-overlay"></a>
                        </div>
                    </article>
<?php 
	}
}
?>
                </div>
            </section>

*/
?>

			            <a class="twitter-timeline"  href="https://twitter.com/hashtag/WaterSharing" data-widget-id="706647192526671872">#WaterSharing Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          


                    <div class="clearfix"></div>
                    <!--/ POPULAR NEWS BLOCK -->
                </div>
			<!-- RIGHT SIDE -->



	</article>
</section>

<?php }?>

