<?php get_header();
$auctions = get_field('auctionrel');
$oldauctions = get_field('oldauctionrel');
$currentlink = get_permalink();
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
						<div style="text-align:center;display:none;">
						<br/>Give & Share มอบด้วยใจ สู้ภัยแล้ง 
						<br/>ประมูลของรักดารา เฟี้ยว!!ทุกชุิ้น
						นำเงินไปช่วยเหลือผู้ประสบภัยแล้งในงานการกุศล “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน”
						www.thaipbs.or.th/WaterSharingAuction
							</div>
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
					<div id="button" class="hidden" style="margin:20px auto 0px;width:100%;max-width:340px;cursor:pointer;">
						<div style="cursor:pointer;" onclick="window.open('http://payment.thaipbs.or.th/checkout');" id="grad">
							ลงทะเบียน
							
						</div>
						
					</div>
                </div>
			</div>
		</div>
		<div class="clearfix"></div>
				<section id="hilight" style="margin-top:20px;background:#153764;overflow:hidden;">
					<div class="container">
						<div class="image" style="position:relative;">
							<img style="" class="img-responsive wp-image-1092" src="<?php echo get_template_directory_uri(); ?>/images/giveshare4.png">
						</div>
						<div class="col-lg-12" style="margin-bottom:20px;background:#fff;">
							<div class="row animated fadeInRight">
								<?php
								forEach($auctions as $key=>$post){
									$title = $post->post_title;
									$link = $post->guid;
									$type = get_field('type',$post->ID);
									$id = get_field('link',$post->ID);
									$date = get_field('date',$post->ID);
									$price = get_field('price',$post->ID);
									$get_image = get_field('thumbnail',$post->ID);
									$image = $get_image['sizes']['large'];
								?>
								<div class="col-lg-6">
									<div class="contact-box">
										<a >
										<div class="col-sm-12">
											<div class="text-center">
												<img alt="image" class="img-circles m-t-xs img-responsive" src="<?=$image?>">
												<div class="m-t-xs font-bold"><?=$title?></div>
											</div>
										</div>
										<div class="col-sm-8 hidden">
											<h3><strong><?=$title?></strong></h3>
											<p><i class="fa fa-map-marker"></i> <?=$leadtext?></p>
											<address>
												<strong>Price</strong><br>
												500 Bath<br>
												<br>
												<abbr title="Phone">P:</abbr> (123) 456-7890
											</address>
										</div>
										<div class="clearfix"></div>
											</a>
									</div>
								</div>
						<?php }?>
							</div>							
						</div>
						



						<div class="col-lg-12 hidden" style="margin-bottom:20px;background:#fff;">
							<div class="row animated fadeInRight">

								<div class="col-lg-12">
									<h3 style="padding:0 15px;">สินค้าที่ปิดประมูลแล้ว</h3>
								</div>
								<?php
								forEach($oldauctions as $key=>$post){
									$title = $post->post_title;
									$link = $post->guid;
									$type = get_field('type',$post->ID);
									$id = get_field('link',$post->ID);
									$date = get_field('date',$post->ID);
									$price = get_field('price',$post->ID);
									$get_image = get_field('thumbnail',$post->ID);
									$image = $get_image['sizes']['large'];
								?>
								<div class="col-lg-3">
									<div class="contact-box">
										<a href="<?=$link?>" target="_blank">
										<div class="col-sm-12">
											<div class="text-center">
												<img alt="image" class="img-circles m-t-xs img-responsive" src="<?=$image?>">
												<div class="m-t-xs font-bold"><?=$title?></div>
											</div>
										</div>
										<div class="col-sm-8 hidden">
											<h3><strong><?=$title?></strong></h3>
											<p><i class="fa fa-map-marker"></i> <?=$leadtext?></p>
											<address>
												<strong>Price</strong><br>
												500 Bath<br>
												<br>
												<abbr title="Phone">P:</abbr> (123) 456-7890
											</address>
										</div>
										<div class="clearfix"></div>
											</a>
									</div>
								</div>
						<?php }?>
							</div>							
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
<h4 id="header"><span style="color:red;">พิเศษ !</span> เปิดบูทรับสมัครงานเดินวิ่งการกุศล<br/> “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน”</h4>
<div><h2>ณ หน้างาน TU Walk & Run 2016<br/>ธรรมศาสตร์ ศูนย์รังสิต<br/> วันอาทิตย์ที่ 24 เมษายน 2559</h2></div>
</div>

	
<?php get_footer();?>

<style>
.contact-box {
    background-color: transparent;
    border: none;
    padding: 20px 0 0 0px;
    margin-bottom: 20px;
	color:#333;
	font-size:24px;
	font-family:sukhumvit_setsemi_bold;
	
}
.contact-box  a img.img-circle{border:2px solid #fff;}
.contact-box > a {
    color: inherit;
}
.text-center {
    text-align: center;
}
.img-circle {
    border-radius: 50%;
}
.font-bold {
    font-weight: 600;
}
.m-t-xs {
    margin-top: 5px;
}

div#box{position:fixed;width:480px;background:#fff;border:1px solid #333;border-radius:20px;padding:20px;right:5%;top:10%;text-align:center;z-index:999;}
div#box div#close{cursor:pointer;position:absolute;border-radius:20px;border:1px solid #ccc;top:5px;right:5px;color:red;width:25px;height:25px;text-align:center;}
div#box #header{padding-bottom:20px;margin-bottom:10px;min-height:60px;border-bottom:1px solid #ccc;color:#333;}
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