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
							<li><a href="#"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>
					<div class="news-section">
					<header class="news-section-header no-line col-xs-12 ">
						  <h2><span style="background:#df5028;display:block;text-align:center;"><?php the_title()?></span></h2>
						</header>
					</div>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
		<div class="clearfix"></div>
				<section id="hilight" style="margin-top:20px;background:#153764;overflow:hidden;">
					<div class="container" >
						<div class="image" style="position:relative;">
							<img style="" class="img-responsive wp-image-1092" src="<?php echo get_template_directory_uri(); ?>/images/han-1.png">
							<div id="button">
								<div onclick="window.open('http://www.rungister.com');" id="grad">
								 ลงทะเบียนสมัคร
								</div>
							</div>
						</div>
						<div style="padding:10px;margin:10px 0;color:#fff;font-size:18px;text-align:center;">
							ขั้นตอนการลงทะเบียน <a href="https://m.facebook.com/notes/rungister/%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B8%95%E0%B8%AD%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A5%E0%B8%87%E0%B8%97%E0%B8%B0%E0%B9%80%E0%B8%9A%E0%B8%B5%E0%B8%A2%E0%B8%99-%E0%B8%AA%E0%B8%A1%E0%B8%B2%E0%B8%8A%E0%B8%B4%E0%B8%81-rungister/1752818404963442/" target="_blank" style="color:yellow;">คลิก</a>
							<br/>
							<br/>
							<br/>
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
				<section id="time" style="margin-top:20px;overflow:hidden;">
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


	
<?php get_footer();?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/compiled/flipclock.js"></script>
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
			});
		</script>

<style>
.post-views-count{display:none;}
.content-article-content h1, .content-article-content h2, .content-article-content h3, .content-article-content h4, .content-article-content h5, .content-article-content h6{border-bottom:none;}
#content{padding-left:0;padding-right:0;}
#button{position:absolute;bottom:20px;left:50px;}
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
@media (max-width:767px){
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
<!--Start of Tawk.to Script-->
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