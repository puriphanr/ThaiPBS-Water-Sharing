<?php

 $category = get_the_category();
// print_r($category);
 $image =  get_field('thumbnail');
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
$comment = get_field('comment');
$date = get_field('date');
$timeup = get_field('timeup');
$auctionprice = get_field('auction_price');
$currentlink = get_permalink();
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
					<div class="content hidden"><?php the_content(); ?> </div>
						<ol class="breadcrumb">
							<li><a href="<?php bloginfo('url'); ?>">หน้าหลัก</a></li>
							
							<li><span class="sep">&gt;</span></li>
							<li><a href="http://www.thaipbs.or.th/WaterSharingAuction">ประมูลสินค้า</a></li>
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
							<?php 
							if($timeup != true){
							if($comment != true){
						list($day, $month, $year) = split('[/.-]', $date);
						?>
						
				<section id="time" style="margin-top:20px;overflow:hidden;">
					<h3 style="text-align:center;display:block;color:#FE502F;">ร่วมกิจกรรมประมูลในอีก...</h3>
					<div class="container" style="position:relative;">
						<div class="image hidden"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/icon-run.png" class="pull-left"/>
						</div>
						<div class="clock" >
						
						</div>
					</div>
				</section>
<?php }else{
list($day, $month, $year) = split('[/.-]', $date);
?>
<section id="time" style="margin-top:20px;overflow:hidden;">
					<h3 style="text-align:center;display:block;color:#FE502F;">เหลือเวลาประมูลอีก...</h3>
					<div class="container" style="position:relative;">
						<div class="image hidden"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/icon-run.png" class="pull-left"/>
						</div>
						<div class="clock" >
						
						</div>
					</div>
				</section>

<?php }
	}else{
?>

			<section id="time" style="margin-top:20px;overflow:hidden;">
					<h4 style="text-align:center;display:block;color:#FE502F;">จบการประมูล</h4>
					<h3 style="text-align:center;display:block;color:#FE502F;"><?=$auctionprice?></h3>

				</section>
<?php
	}
?>
            <div class="row">
                <div class="col-xs-12 col-md-8">
                </div>
                <div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-md-7">
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

                    <div class="col-xs-12 col-md-9 hidden-xs">
                        <div class="content-article-content entry-content">
							<?php the_content(); ?>              
						</div>

						
                    </div>


                </div>

                <!--/ LEFT SIDE -->
				<!-- RIGHT SIDE -->
				<div class="col-xs-12 col-md-5" style="background:#f0f0f0;padding-bottom:20px;">

					<?php if($comment == true){ ?>
						<div style="padding-bottom:10px;">
							<h4>ข้อกำหนดการเข้าร่วมประมูล</h4>
							<div style="font-size:16px;">1. เปิดให้ประมูลตั้งแต่เวลา 17.00 – 23.00 น ในแต่ละวัน</div>						
							<div style="font-size:16px;">2. ของแต่ละชิ้นจะมีราคาตั้งต้น ราคาที่ต้องเพิ่มขึ้นในการประมูลแต่ละครั้ง 100 บาท ขึ้นไป</div>

							<div style="font-size:16px;">3. ราคาสินค้าที่ประมูลไม่รวมค่าจัดส่ง</div>

							<div style="font-size:16px;">4. ผู้ชนะการประมูล ต้องชำระเงินเต็มจำนวนของราคาสินค้าที่ประมูล  </div>
							<div style="font-size:16px;">5. สามารถร่วมประมูลได้โดยการใส่ราคาเข้าไปใน Facbeook Comment ด้านล่าง</div>
						</div>
						<div class="clearfix"></div>
						<div style="position:relative;min-height:100px;border:1px solid #666;margin-bottom:20px;">
							<div>
								<header style="padding:2px 5px;background:#3B5998;color:#fff;"> Facebook Comment</header>
							</div>
							<div class="clearfix"></div>
							<div style="position:absolute;top:20px;left:20px;z-index:1;">
								<h4>กรุณารอสักครู่...</h4>
							</div>
							<div style="position:relative;z-index:99;background:#fff;">
								<div class="fb-comments" data-width="470" data-num-posts="6" data-order-by="reverse_time"   data-href="<?=$currentlink?>">
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div style="padding-bottom:10px;">
							<h4>การชำระเงิน</h4>
							<div style="font-size:16px;">โอนเงิน พร้อมค่าจัดส่งมาที่ :</div>						
							<div style="font-size:16px;">มูลนิธิองค์การกระจายเสียงและแพร่ภาพสาธารณะแห่งประเทศไทย</div>

							<div style="font-size:16px;">เลขที่บัญชี : 071-0-15623-5</div>

							<div style="font-size:16px;">สอบถามข้อมูลเพิ่มเติม : 0-2790-2398</div>
						</div>
						<?php }?>
						


						<div class="col-xs-12  visible-xs">
                        <div class="content-article-content entry-content">
							<?php the_content(); ?>              
						</div>

						
                    </div>
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

          


                    <div class="clearfix"></div>
                    <!--/ POPULAR NEWS BLOCK -->
                </div>
			<!-- RIGHT SIDE -->



	</article>
</section>

<?php }?>

<?php get_footer(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.js"></script>
<script type="text/javascript">
			var clock;

			$(document).ready(function() {

				// Grab the current date
				var currentDate = new Date();

				// Set some date in the future. In this case, it's always Jan 1
				var futureDate  = new Date(<?=$year?>,4,<?=$day?>,<?php if($comment != true){echo"17";}else{echo"23";}?>,00);

				// Calculate the difference in seconds between the future and current date
				var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

				// Instantiate a coutdown FlipClock
				clock = $('.clock').FlipClock(diff, {
					clockFace: 'DailyCounter',
					countdown: true
				});
			});
		</script>

<style>
.fb_iframe_widget span[style]{width:100% !important;}
.fb_iframe_widget,
.fb_iframe_widget span,
.fb_iframe_widget span iframe[style] {
  min-width: 100% !important;
  width: 100% !important;
}
div#box{position:fixed;width:480px;background:#fff;border:1px solid #333;border-radius:20px;padding:20px;right:5%;top:10%;text-align:center;z-index:999;}
div#box div#close{cursor:pointer;position:absolute;border-radius:20px;border:1px solid #ccc;top:5px;right:5px;color:red;width:25px;height:25px;text-align:center;}
div#box #header{padding-bottom:20px;margin-bottom:10px;min-height:30px;border-bottom:1px solid #ccc;color:#333;}
.post-views-count{display:none;}
.content-article-content h1, .content-article-content h2, .content-article-content h3, .content-article-content h4, .content-article-content h5, .content-article-content h6{border-bottom:none;}
#content{padding-left:0;padding-right:0;}
#button{position:absolute;bottom:20px;left:50px;}
#button{position:relative;bottom:0px;left:0px;}
div.clock{width:620px;padding:10px 0;margin:2em auto !important;display:block;}
section#time div.image{position:absolute;left:5%;top:20px;}
#grad {
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#53B257, green); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#53B257, green); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#53B257, green); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#53B257, green); /* Standard syntax */
	cursor:pointer;color:#fff;padding:10px 130px;border-radius:30px;box-shadow:2px 2px 2px #333;font-family:sukhumvit_setsemi_bold;font-size:18px;text-align:center;
} 
#grad:hover {
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#53B257, #006600); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#53B257, #006600); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#53B257, #006600); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#53B257, #006600); /* Standard syntax */
}
@media (min-width:978px){
.container.effect7{max-width:none;}
#header-banner.grey{background-position: top center;background-color: #303538;background-size: 80%;}
}
@media (max-width:977px){
#button{left:20px;}
#grad{padding:10px 40px;}
section#time div.image{left:-7%;}
}
@media (max-width:768px){
div#box{width:300px;font-size:18px !important;right:5px;bottom:10px;top:auto;}
div#box #header{font-size:14px;}
div#box h2{font-size:18px;}
section#time div.image{left:5%;width:80px;}
div.clock{width:400px;}
#hilight .container{padding:0;}
#button{position:relative;left:0;bottom:0;margin:20px 20px;}
#grad{padding:10px 40px;}
/*
.flip-clock-divider .flip-clock-label{top:40px;right:30px;}
.flip-clock-divider.hours .flip-clock-label{top:140px;right:180px;}
.flip-clock-divider.minutes .flip-clock-label{top:140px;right:175px;}
.flip-clock-divider.seconds .flip-clock-label{top:140px;right:170px;}
*/
.flip-clock-divider{height:50px;width:10px;left:-2px;}
.flip-clock-dot{width:5px;height:5px;}
.flip-clock-dot.top{top:18px;}
.flip-clock-dot.bottom{bottom:13px;}
.flip-clock-wrapper{margin:0 !important;padding:30px 0;}
.flip-clock-wrapper ul{margin:1px 1px 1px 0;}
.flip-clock-wrapper ul li{width:100%;}
.flip-clock-wrapper ul li a div{font-size:20px;width:100%;}
.flip-clock-wrapper ul li{line-height:50px;}
.flip-clock-wrapper ul li a div div.inn{font-size:20px;}
.flip-clock-wrapper ul{width:40px;height:50px;font-size:20px;}
.flip-clock-divider .flip-clock-label{right:-66px;}
.flip-clock-divider.minutes .flip-clock-label{right:-74px;}
.flip-clock-divider.seconds .flip-clock-label{right:-74px;}
}
@media (max-width:680px){
section#time div.image{clear:both !important;width:100px;margin:10px auto;position:static;}
}
</style>
<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56f2b2b81d1573a2295438c2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->