<?php get_header();?>
<link href="<?php echo get_template_directory_uri(); ?>/js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/js/owl-carousel/owl.theme.css" rel="stylesheet">
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
							<li><a href="#"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>
					<section id="hilight" style="margin-top:20px;background:#808080;overflow:hidden;">
					<div class="container hidden">
						<div class="image " style="position:relative;">
							<img class="img-responsive wp-image-1092" src="http://event.thaipbs.or.th/minimarathon/wp-content/themes/minimarathon/images/han-2edit.jpg">
							<div id="button" onclick="window.location='http://payment.thaipbs.or.th';">
								<div id="grad">
								 สมัครที่นี่
								</div>
							</div>
						</div>
						<div style="padding:10px;margin:10px 0;color:#fff;font-size:18px;text-align:center;">
				
						
						</div>
					</div>
				</section>
					<div class="news-section">
					<header class="news-section-header no-line col-xs-12 ">
						  <h2><span style="background:#df5028;display:block;text-align:center;"><?php the_title()?></span></h2>
						</header>
					</div>
                    <div class="clearfix"></div>
					<div id="button" style="margin:20px auto 0px;width:100%;max-width:1170px;">

						<div style="text-align:center;font-size:18px;">
						<br/>ไทยพีบีเอส ขอขอบคุณนักวิ่งกว่า 4,000 ท่าน ที่เข้าร่วมกิจกรรมเดินวิ่งการกุศล "แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน” เมื่อวันอาทิตย์ที่ 15 พฤษภาคม 2559 พร้อมทั้งร่วมบริจาคเพื่อผู้ประสบภัยแล้งร่วมกับมูลนิธิไทยพีบีเอส 
<br/>* ท่านสามารถรับชมย้อนหลังการถ่ายทอดสด ช่วงเวลา 05.30 - 07.30 น. ได้ที่ <a href="http://program.thaipbs.or.th/watch/Lf8cpp" target="_blank">http://program.thaipbs.or.th/watch/Lf8cpp</a> 
<br/>* ติดตามชมและดาวน์โหลดภาพบรรยากาศและนักวิ่งได้ที่ <a href="http://www.thaipbs.or.th/watersharingrun" >www.thaipbs.or.th/waterSharingRun</a>
<br/>
<br/>หากท่านไม่ได้รับความสะดวกหรือมีข้อผิดพลาดประการใดในกิจกรรมนี้ ทีมงานต้องขออภัยมา ณ โอกาสนี้<br/>แล้วพบกับกิจกรรมต่าง ๆ ของไทยพีบีเอสได้ในโอกาสต่อไป
<br/>ขอบคุณค่ะ
							
							</div>
					</div>
                </div>
			</div>
		</div>
		<div class="clearfix"></div>
				<section id="gallery" style="margin-top:20px;overflow:hidden;">
					<div class="container">
					<h3>Gallery <div class="pull-right"><a class="btn btn-primary" href="<?php bloginfo('url'); ?>/watersharingrun/gallery">ดูทั้งหมด</a></div></h2>
					
<div class="text-center">
   
    <div class="row" style="margin:0px;">
	
	 <div id="owl-demo" class="owl-carousel">
	<?php
		$getphoto = fbPhoto('10156987579225085');	
		foreach($getphoto as $key=>$row){
			if($key > 1 && $key < 20){
	?>
	   <div class="item">
		<a href="<?php echo $row['source']?>" class="gallery" rel="gal" title="<?php echo $irow['title']?>">
			
				<img class="lazyOwl" data-src="<?php echo $row['thumb']?>" alt="<?php echo !empty($row['title']) ? $row['title'] : NULL ?>">
			
		</a>
	  </div>
	<?php }
	} ?>
	</div>

    </div><!-- end projects row Two -->
     
  </div>
					</div>
				</section>

<section class="news-section" style="margin-top:50px;overflow:hidden;">
		<a href="http://org.thaipbs.or.th/content/903" target="_blank">
		<div class="">
			<h1 class="content-title" style="text-align:center;">ครั้งแรกของไทยพีบีเอส กับ มินิมาราธอนการกุศล งานแบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง</h1>
        </div>
        <div class="news-content-list">
            <div class="row">
                <article class="news-block head-big media-link media-video has-tag tag-special news-featured content-featured col-xs-12">
                    <div class="row news-wrap">
                        <div class="media-wrapper">
                                                            <img src="//org.thaipbs.or.th/media/GBdo1QtbNpVHJcgifcSC6obFVkaC5ByBFz1MzQ1B0RbmwNs6CQ.jpg" data-src="//org.thaipbs.or.th/media/GBdo1QtbNpVHJcgifcSC6obFVkaC5ByBFz1MzQ1B0RbmwNs6CQ.jpg" class="img-responsive  lazyloaded" alt="ครั้งแรกของไทยพีบีเอส กับ มินิมาราธอนการกุศล งานแบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง<">
                                                    </div>
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
        </div>
		</a>
    </section>


				<section id="hilight" style="margin-top:20px;background:#153764;overflow:hidden;">
					<div class="container">
						<div class="image" style="position:relative;">
							<img style="" class="img-responsive wp-image-1092" src="<?php echo get_template_directory_uri(); ?>/images/han-12.png">
							<div id="button" class="hidden">
								<div style="cursor:initial;" onclick="//window.open('http://www.rungister.com');" id="grad">
									ลงทะเบียน
							</div>
						</div>
						</div>
						<div class="col-lg-12" style="margin-bottom:20px;">
							<div class="row">
								<div><h2 onclick="window.open('http://www.thaipbs.or.th/WaterSharingAuction');"  style="text-align:center;color:yellow;text-decoration:underline;">งานนี้มีรางวัลพิเศษ</h2></div>
								<div class="col-lg-6" style="border:1px solid #fff;min-height:100px;">
									<h3 style="text-align:center;color:#fff;">สำหรับชมรมที่ส่งนักวิ่งมาร่วมงานมากที่สุด</h3>	
								</div>
								<div class="col-lg-6" style="border:1px solid #fff;min-height:100px;">
									<h3 style="text-align:center;color:#fff;">สำหรับนักวิ่งแต่งชุดแฟนซี</h3>	
								</div>
							</div>							
						</div>
						<div class="hidden" style="padding:10px;margin:10px 0;color:#fff;font-size:18px;text-align:center;">
							ขั้นตอนการลงทะเบียน <a href="https://m.facebook.com/notes/rungister/%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B8%95%E0%B8%AD%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A5%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%9A%E0%B8%B5%E0%B8%A2%E0%B8%99-%E0%B8%AA%E0%B8%A1%E0%B8%B2%E0%B8%8A%E0%B8%B4%E0%B8%81-rungister/1752818404963442/" target="_blank" style="color:yellow;">คลิก</a>
							<br/> 
							<br/>
							<br/>
							<h2 style="text-align:center;color:red;text-decoration:underline;">แจ้งปัญหาการลงทะเบียน</h2>
							สอบถามเรื่องการลงทะเบียนเพิ่มเติมได้ที่ facebook Rungister 
							<br/><a href="https://www.facebook.com/rungister" target="_blank" style="color:yellow;">https://www.facebook.com/rungister</a>
							<br/>
							<br/>
							<br/>
							สอบถามเรื่องการชำระเงินเพิ่มเติมได้ที่ facebook mPAY Fanclub
							<br/>
							<a href="https://www.facebook.com/mPAYFanclub" target="_blank" style="color:yellow;">https://www.facebook.com/mPAYFanclub</a>
						</div>
					</div>
				</section>
		<div class="clearfix"></div>
				<section class="hidden" id="time" style="margin-top:20px;overflow:hidden;">
					<h3 style="text-align:center;display:block;color:#FE502F;">เราจะได้ร่วมกิจกรรมในอีก...</h3>
					<div class="container" style="position:relative;">
						<div class="image"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/icon-run.png" class="pull-left"/>
						</div>
						<div class="clock" >
						
						</div>
					</div>
				</section>
		<div class="clearfix"></div>
				<section style="margin-top:20px;overflow:hidden;">
					<div class="container" >
						<div class="content-article-content entry-content " style="text-align:center;">
							


							<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							the_content();
							endwhile; else: ?>
							<p>Sorry, no content.</p>
							<?php endif; ?>          
						</div>
					</div>
				</section>
		<div class="clearfix"></div>
	</article>
</section>
<div id="box" class="hidden">
<div onclick="$('#box').hide();" id="close">X</div>
<h4 id="header"><span style="color:red;">กิจกรรมพิเศษ ! ประมูลของรักดารา</span> </h4>
ประมูลพร้อมกันในวันงาน 15 พ.ค. 59 ตั้งแต่ 07.00 น. เป็นต้นไป
<div class="image" style="position:relative;">
	<a href="http://www.thaipbs.or.th/watersharingAuction" target="_blank"><img style="" class="img-responsive wp-image-1092" src="<?php echo get_template_directory_uri(); ?>/images/giveshare4.png"></a>
</div>
</div>
</div>

	
<?php get_footer();?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/colorbox/example2/colorbox.css" media="screen" />
<script type="text/javascript">
			var clock;

			$(document).ready(function() {

				// Grab the current date
				var currentDate = new Date();

				// Set some date in the future. In this case, it's always Jan 1
				var futureDate  = new Date(2016,4,15,05,00);

				// Calculate the difference in seconds between the future and current date
				var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

				// Instantiate a coutdown FlipClock
				clock = $('.clock').FlipClock(diff, {
					clockFace: 'DailyCounter',
					countdown: true
				});
$('a.gallery').colorbox({rel:'gal'});
				 $("#owl-demo").owlCarousel({
					autoPlay : 5000,
					lazyLoad : true,
					items : 5,
					pagination : false,
					navigation : true,
						navigationText: [
		  'ก่อนหน้า',
		  'ถัดไป'
		  ]
					
				 });
			});
		</script>

<style>
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
#owl-demo .item {
    margin: 10px;
}
#owl-demo .item img {
    display: block;
    width: 100%;
    height: 203px !important;
    object-fit: contain;
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