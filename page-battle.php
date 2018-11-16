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
		
				<section>
					<div class="col-lg-12">
						<div class="content-article-content entry-content ">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							the_content();
							endwhile; else: ?>
							<p>Sorry, no content.</p>
							<?php endif; ?>          
						</div>
					</div>
				</section>
	</article>
</section>
<section class="news-section " id="video-gallery-news-block">
<div class="" style="width:100%;overflow:hidden;">
<div class="">
    <header class=" news-section-header no-line col-xs-12 " style="margin-bottom:20px;">
      <h2><span>วิดีโอเชิญชวนแข่งขันประหยัดน้ำ</span></h2>
    </header>

    <div class="news-content-list">

<?php 
$videorel = get_field('videorel',989);
forEach($videorel as $key=>$post){
	$title = $post->post_title;
	$link = $post->guid;
	$type = get_field('type',$post->ID);
	$id = get_field('link',$post->ID);
	$get_image = get_field('thumbnail',$post->ID);
	$image = $get_image['sizes']['large'];
	//$image = "http://img.youtube.com/vi/".$id."/hqdefault.jpg";
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


<?php get_footer();?>
<script>
var html = "";
var value;
var itoken = "<?=$_GET['token'];?>";

function getFacebookPosts(facebook_id){
	$.ajax({
	url: 'https://graph.facebook.com/330743535084/feed?access_token=1444762879177941|Wc0tNcW_RVe2gJPtYibZa_CTlAQ&fields=id,from,message,full_picture,link,type&limit=100',
	dataType: "jsonp",
	success: function (data) { parsePostsData(data); }
	});
}

function parsePostsData(posts) {
	  var html = "";
	  var i = 0;

	  $.each(posts.data, function(key,val){
		var id = val.id;
		var message = val.message;
		var link = val.link;
		var picture = val.full_picture;
		var type = val.type;
		var from = val.from;
		if(from != "Thai PBS"){
			if((type == 'photo' || type=='video') && message != ""){

				html += "<br/>"+message;

			}
		}

	  });
	  console.log(html);
}
getFacebookPosts();

</script>
<style>
.post-views-count{display:none;}
.content-article-content h1, .content-article-content h2, .content-article-content h3, .content-article-content h4, .content-article-content h5, .content-article-content h6{border-bottom:none;}
</style>