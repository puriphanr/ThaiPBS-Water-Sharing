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
							<li><a href="<?php bloginfo('url'); ?>">หน้าหลัก</a></li>
							
							<li><span class="sep">&gt;</span></li>
							<li><a href="/watersharing/news"><?php the_title()?></a></li>
							
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
		<div class="container ">
            <div class="row">

                <div class="clearfix"></div>
				<!-- LEFT SIDE -->
                <div class="col-xs-12 col-lg-9">
				<div class="row">
                   



                    <div class="col-xs-12 col-md-12">
                        <div class="row content-article-content entry-content">

            <!-- TOP NEWS BLOCK -->
            <section class="news-section" id="hilight-news-block">
                
                <div class="top news-content-list">
<?php
$json = file_get_contents('http://phinder.beta.thaipbs.or.th/api/search/thaipbs/news?type=news&q=%E0%B8%A0%E0%B8%B1%E0%B8%A2%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%87&published_range=last_week');

$getData = json_decode($json,true);
$data = $getData['data'];
$data = $getData['data'];
function sortFunction( $a, $b ) {
    return strtotime($a["published_time"]) - strtotime($b["published_time"]);
}
usort($data, "sortFunction");
$data = array_reverse($data);
$i=0;
forEach($data as $inx=>$key ){
$i++;
if($i<0){

}else if($i <= 9){
		$color = array('#00456e','#493f55','#6c3932','#616720');
	
?>

				<article class="news-block  head-big has-tag tag-special news-featured col-lg-4 col-md-4 col-sm-12 col-xs-12">
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

<?php
	}
}

$query = 'posts_per_page=10';
$queryObject = new WP_Query($query);
$key = 0;
if ($queryObject->have_posts()) {
	while ($queryObject->have_posts()) {
		$queryObject->the_post();
		$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'default' );
		$title = get_the_title();
		$link = get_permalink();
		$date = get_the_date();
		$get_image = get_field('thumb');
		$image = $get_image['sizes']['medium'];
		if(empty($image)){$image="//news.thaipbs.or.th/images/logo/home_logo.jpg";}
		$resultArray[$key] = array(
										   'title'=>$title,
											'image'=> array('url'=>$image),
											'url'=>$link,
											'youtube'=>$youtube,
										   'date'=>$date
			);

		$key++;
	}
}
?>
<div class="clearfix"></div>
<div class="load-more-holder col-sm-12 col-md-4">
            <button class="button btn btn-lg btn-primary btn-block load-more-btn " data-now="10" data-type="1">โหลดเพิ่ม <i class="fa fa-plus-circle"></i></button>
        </div>
						</div>
                    </div>
					</div>
                </div>
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