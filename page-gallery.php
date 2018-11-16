<?php
/*
Template name: gallery
*/
?> 
<?php get_header();?>
<?php

$data1 = fbPhoto('10156987579225085',100,$_GET['next'],$_GET['prev']);
$data3 = fbPhoto('10156991200320085',100,$_GET['next2'],$_GET['prev2']);
$data2 = fbPhoto('10156987828800085',100,$_GET['next3'],$_GET['prev3']);
$prev1 = split('before=',$data1['prev']['title']);
$next1 = split("after=",$data1['next']['title']);
$prev2 = split('before=',$data3['prev']['title']);
$next2 = split("after=",$data3['next']['title']);
$prev3 = split('before=',$data2['prev']['title']);
$next3 = split("after=",$data2['next']['title']);
?>
<section class="content-detail">

        <div class="content-title-holder">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
						<ol class="breadcrumb">
						
							<li><a target="_blank" href="<?php bloginfo('url'); ?>">หน้าหลัก</a></li>
							<li><span class="sep">&gt;</span></li>
							<li><a href="<?php bloginfo('url'); ?>/watersharingrun">กิจกรรมเดินวิ่งการกุศล “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน”</a></li>
							<li><span class="sep">&gt;</span></li>
							<li><a href="#"><?php the_title()?></a></li>
							
						</ol>                    
					</div>
					<div class="clearfix"></div>		
				</div>
			</div>
		<div class="clearfix"></div>

	</div>
<div class="tabbable boxed parentTabs">
    <ul class="nav nav-tabs">
		<li class="<?php if($_GET['album'] == 1 || $_GET['album'] == ""){echo"active";}?>"><a href="#area1" aria-controls="area1" role="tab" data-toggle="tab">ประมวลภาพนักวิ่ง (1/2)</a></li>
		<li class="<?php if($_GET['album'] == 2){echo"active";}?>"><a href="#area3" aria-controls="area1" role="tab" data-toggle="tab">ประมวลภาพนักวิ่ง (2/2)</a></li>
		<li class="<?php if($_GET['album'] == 3){echo"active";}?>"><a href="#area2" aria-controls="area2" role="tab" data-toggle="tab">บรรยากาศงานเดินวิ่งการกุศล</a></li>
    </ul>
    <div class="tab-content">
		 <div class="tab-pane fade <?php if($_GET['album'] == 1 || $_GET['album'] == ""){echo"active";}?> in" id="area1">
            <div class="tabbable">
				<ul class="row gallery-row">
					<div class="col-lg-12"> 
						<?php if($data1['prev']['title'] != ""){?>
						<div class="pull-left"><a href="<?php the_permalink()?>?prev=<?=$prev1[1];?>&album=1"><i class="fa fa-arrow-left" aria-hidden="true"></i> Prev</a>
						</div>
						<?php }?>
						<?php if($data1['next']['title'] != ""){?>
						<div class="pull-right"><a href="<?php the_permalink()?>?next=<?=$next1[1];?>&album=1">Next </a><i class="fa fa-arrow-right" aria-hidden="true"></i>
						</div>
						<?php }?>
					</div>
						<?php foreach($data1 as $ikey=>$irow){ 
							  if($irow['soure'] == '1'){

							  }else{
						?>
							
							<li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
								<a href="<?php echo $irow['source']?>" class="gallery" rel="gal" title="<?php echo $irow['title']?>">
									<img class="img-responsive" src="<?php echo $irow['thumb']?>">
								</a>
							</li>
						<?php }} ?>
				</ul>
			</div>
		</div>
		<div class="tab-pane fade <?php if($_GET['album'] == 2){echo"active";}?> in" id="area3">
            <div class="tabbable">
				<ul class="row gallery-row">
					<div class="col-lg-12"> 
						<?php if($data3['prev']['title'] != ""){?>
						<div class="pull-left"><a href="<?php the_permalink()?>?prev2=<?=$prev2[1];?>&album=2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Prev</a>
						</div>
						<?php }?>
						<?php if($data3['next']['title'] != ""){?>
						<div class="pull-right"><a href="<?php the_permalink()?>?next2=<?=$next2[1];?>&album=2">Next </a><i class="fa fa-arrow-right" aria-hidden="true"></i>
						</div>
						<?php }?>
					</div>
						<?php foreach($data3 as $ikey=>$irow){ 
							  if($irow['soure'] == '1'){

							  }else{
						?>
							
							<li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
								<a href="<?php echo $irow['source']?>" class="gallery" rel="gal" title="<?php echo $irow['title']?>">
									<img class="img-responsive" src="<?php echo $irow['thumb']?>">
								</a>
							</li>
						<?php }} ?>
				</ul>
			</div>
		</div>
		<div class="tab-pane fade <?php if($_GET['album'] == 3){echo"active";}?> in" id="area2">
            <div class="tabbable">
				<ul class="row gallery-row">
					<div class="col-lg-12"> 
						<?php if($data2['prev']['title'] != ""){?>
						<div class="pull-left"><a href="<?php the_permalink()?>?prev3=<?=$prev3[1];?>&album=3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Prev</a>
						</div>
						<?php }?>
						<?php if($data2['next']['title'] != ""){?>
						<div class="pull-right"><a href="<?php the_permalink()?>?next3=<?=$next3[1];?>&album=3">Next </a><i class="fa fa-arrow-right" aria-hidden="true"></i>
						</div>
						<?php }?>
					</div>

						<?php foreach($data2 as $ikey=>$irow){ 
						if($irow['soure'] == '1'){

							  }else{
						?>
							<li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
								<a href="<?php echo $irow['source']?>" class="gallery" rel="gal" title="<?php echo $irow['title']?>">
									<img class="img-responsive" src="<?php echo $irow['thumb']?>">
								</a>
							</li>
						<?php }} ?>
				</ul>
			</div>
		</div>
	</div>
</div>
</section>

<?php get_footer();?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/js/colorbox/example2/colorbox.css" media="screen" />
<script>
$(function(){
	$('a.gallery').colorbox({rel:'gal'});
})
</script>