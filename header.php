<?php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <?php if( is_front_page() ) { ?>
    <title><?php bloginfo('name'); ?></title>
<meta property="og:locale" content="th_TH">
<meta property="og:title" content="<?php bloginfo('name'); ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Thai PBS">
<meta property="og:description" content="<?php bloginfo('description');?>">
<meta property="og:image" content="http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/09-03-2559-10-55-01.jpg">
<meta property="og:image:width" content="370">
<meta property="og:image:height" content="210">
<meta property="og:url" content="http://www.thaipbs.or.th/WaterSharing">
<meta property="fb:app_id" content="1640249259527520">
<meta property="twitter:card" content="summary">
<meta property="twitter:title" content="<?php bloginfo('name'); ?>">
<meta property="twitter:description" content="<?php bloginfo('description');?>">
<meta property="twitter:image" content="http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/09-03-2559-10-55-01.jpg">
<meta property="twitter:url" content="http://www.thaipbs.or.th/WaterSharing">
<meta property="twitter:site" content="@thaipbs">    
    <?php }else if( is_404() ) { ?>
    <title>Page Not Found | <?php bloginfo('name'); ?></title>
<meta property="og:locale" content="th_TH">
<meta property="og:title" content="Page Not Found | <?php bloginfo('name'); ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Thai PBS">
<?php 
/*<meta property="og:description" content="<?php bloginfo('description');?>">*/
?>
<meta property="og:image" content="http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/09-03-2559-10-55-01.jpg">
<meta property="og:image:width" content="370">
<meta property="og:image:height" content="210">
<meta property="og:url" content="http://www.thaipbs.or.th/WaterSharing">
<meta property="fb:app_id" content="1640249259527520">
<meta property="twitter:card" content="summary">
<meta property="twitter:title" content="Thai PBS Water Sharing แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง">
<?php 
/*<meta property="og:description" content="<?php bloginfo('description');?>">*/
?>
<meta property="twitter:image" content="http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/09-03-2559-10-55-01.jpg">
<meta property="twitter:url" content="http://www.thaipbs.or.th/WaterSharing">
<meta property="twitter:site" content="@thaipbs">    
	<?php }else{
	 $image =  get_field('thumb');
	 $link = get_field('link');
	 $type = get_field('type');
	 if(empty($image)){
		$image =  get_field('thumbnail');
	 }else{
	 $medium = $image['sizes']['large'];
	 }
	 if(empty($medium) || empty($image)){
		 if($type == "youtube"){

		$medium = "http://img.youtube.com/vi/".$link."/hqdefault.jpg";
		if(get_post_type() == "auction"){
			$image =  get_field('thumbnail');
			$medium = $image['sizes']['large'];
		}
		 }else{
		$medium = "http://event.thaipbs.or.th/watersharing/wp-content/uploads/2016/03/09-03-2559-10-55-01.jpg";
		 }
	 }
	 $content = get_the_content();
     $content = strip_tags($content);
     
	
	?>
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<meta property="og:locale" content="th_TH">
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="Thai PBS Water Sharing">
<?php 
/*<meta property="og:description" content="<?php  echo get_field('leadtext');?>">*/
?>

<meta property="og:image" content="<?php echo $medium;?>">

<meta property="og:url" content="<? the_permalink()?>">
<meta property="fb:app_id" content="1640249259527520">


<meta property="twitter:card" content="article">
<meta property="twitter:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>">
<?php 
/*<meta property="og:description" content="<?php  echo get_field('leadtext');?>">*/
?>
<meta property="twitter:image" content="<?php echo $medium;?>">
<meta property="twitter:url" content="<? the_permalink()?>">
<meta property="twitter:site" content="@thaipbs">    

	<?php }?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-title" content="Thai PBS"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <meta name="robots" content="noodp,noydir"/>
        <meta name="google-site-verification" content="aVPiA8-fsYqT5RQYy20Y6Z9E8Z4g_AMC3MoElxXHkC8" />
        <meta name="msvalidate.01" content="" />

        <!-- site info -->
        <meta name="application-name" content="<?php bloginfo('name'); ?>" />
        <meta name="msapplication-window" content="width=device-width;height=device-height" />
        <meta name="msapplication-tooltip" content="<?php bloginfo('description');?>" />
        <!-- print style sheet -->
        <!-- <link rel="stylesheet" type="text/css" media="print" href="http://news.thaipbs.or.th/css/print.css" /> -->
       
        <!--[if gte IE 9]>
          <style type="text/css">
            .gradient {
               filter: none;
            }
          </style>
        <![endif]-->

        <!-- inject:head:css -->
        <!-- endinject -->

        <!-- icons & logo -->
        <link rel="shortcut icon" href="http://news.thaipbs.or.th/images/icons/favicon.ico"/>
 
        <script>
        function loadCSS(e,n,o,t){"use strict";var d=window.document.createElement("link"),i=n||window.document.getElementsByTagName("script")[0],r=window.document.styleSheets;return d.rel="stylesheet",d.href=e,d.media="only x",t&&(d.onload=t),i.parentNode.insertBefore(d,i),d.onloadcssdefined=function(e){for(var n,o=0;o<r.length;o++)r[o].href&&r[o].href===d.href&&(n=!0);n?e():setTimeout(function(){d.onloadcssdefined(e)})},d.onloadcssdefined(function(){d.media=o||"all"}),d}

        loadCSS('http://news.thaipbs.or.th/css/style.min.css?0a5fa5f');
        </script>
      
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/colorbox.css" media="screen">
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/smoothness/jquery-ui.css" /> 
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/bootstrap-slider/dist/css/bootstrap-slider.min.css" media="screen">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/ammap/ammap.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/select2/dist/css/select2.min.css" type="text/css">
	<link rel="stylesheet" href="http://news.thaipbs.or.th/css/style.min.css?0a5fa5f">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
        
        <script>document.addEventListener("lazybeforeunveil",function(t){var e=t.target.getAttribute("data-bg");e&&(t.target.style.backgroundImage="url("+e+")",t.target.removeAttribute("data-bg"))});</script>

        <script type="application/ld+json">
            {
            "@context": "http:\/\/schema.org",
            "@type": "WebPage",
            "url": "http:&#x2F;&#x2F;news.thaipbs.or.th",
            "publisher":{
            "@type":"Organization",
            "name":"Thai PBS",
            "logo":"http:&#x2F;&#x2F;news.thaipbs.or.th\/images\/logo\/tpbs.png",
            "sameAs":[
            "http:\/\/youtube.com\/thaipbsnews",
            "http:\/\/facebook.com\/thaipbsnews",
            "http:\/\/twitter.com\/thaipbsnews"
            ],
            "url":"http:&#x2F;&#x2F;news.thaipbs.or.th",
            "location":{
            "@type":"PostalAddress",
            "addressLocality":"Bangkok",
            "addressRegion":"BKK"
            }
            },
            "inLanguage":"th-TH",
            "potentialAction": {
            "@type": "SearchAction",
            "target": "http://news.thaipbs.or.th/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
            }
            }
        </script>
      
     <meta name="keywords" content="วิ่ง, RUN , watersharing, น้ำแล้ง,ประมูล,ดารา,Thaipbs, ทีวีไทย, thaipbs, tpbs, ไทยพีบีเอส, รายการ, ผังรายการ,ผังรายเดือน ดูย้อนหลัง, คลิป, ข่าวล่าสุด , ข่าวยอดนิยม, รายการข่าว, กิจกรรมล่าสุด, ทันข่าวเด่น, รายการวิทยุ, รายการโทรทัศน์, ข่าว">
    

    </head>
    <body>
         
<header id="header">
            <nav id="header-nav" class="navbar navbar-inverse">
                <div id="top-nav" class="container navbar-orange">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed dropdown-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            เมนู
                            <span class="caret"></span>
                        </button>
                        <button type="button" class="navbar-toggle btn-secondary">
                            <i class="fa fa-user"></i>
                        </button>
                        <button type="button" class="navbar-toggle btn-secondary" id="open-search-btn">
                            <i class="fa fa-search"></i>
                        </button>
                        <a class="navbar-brand col-xxs-4 col-xs-4" href="//www.thaipbs.or.th" title="Thai PBS logo">
                            <img src="http://news.thaipbs.or.th/images/logo/tpbs.png" class="logo" alt="Thai PBS logo" />
                            <img src="http://news.thaipbs.or.th/images/logo/tpbs-sm.png" class="logo-sm" alt="Thai PBS logo" />
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                                              <ul class="nav navbar-nav">
                            <li class="home">
                                <a href="//www.thaipbs.or.th" target="_blank" title="หน้าแรก">หน้าแรก</a>
                            </li>
                            <li>
                                <a href="//www.thaipbs.or.th/news" target="_blank" title="ข่าว">ข่าว</a>
                            </li>
                            <li>
                                <a href="//program.thaipbs.or.th" target="_blank" title="รายการทีวี">รายการทีวี</a>
                            </li>
                            <li>
                                <a href="//thaipbs.or.th/live" target="_blank" title="ชมสด">ชมสด</a>
                            </li>
                            <li>
                                <a href="//program.thaipbs.or.th/watch" target="_blank" title="ชมย้อนหลัง">ชมย้อนหลัง</a>
                            </li>
                            <li>
                                <a href="http://www.thaipbsonline.net/" target="_blank" title="วิทยุ">วิทยุ</a>
                            </li>
                            <li>
                                <a href="//org.thaipbs.or.th/home" target="_blank" title="องค์กร">องค์กร</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" id="language-switcher" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="full">ENGLISH</span><span class="short">ENG</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="//englishnews.thaipbs.or.th/" target="_blank" title="Thai PBS News">Thai PBS News</a></li>
            						<li><a href="//www2.thaipbs.or.th/home.php" target="_blank" title="About Thai PBS">About Thai PBS</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="social-sharing">
                            <li class="search-tablet-holder">
                                <a href="#" title="ค้นหา" rel="search"><i class="fa fa-search"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/ThaiPBSFan?_rdr=p" target="_blank" title="Thai PBS Facebook"><i class="fa fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/ThaiPBS" target="_blank" title="Thai PBS Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/user/Thaipbs" target="_blank" title="Thai PBS YouTube"><i class="fa fa-youtube-play"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/thaipbs/" target="_blank" title="Thai PBS Instagram"><i class="fa fa-instagram"></i></a>
                            </li>
							<li>
                                <a href="https://gplus.to/thaipbs/" target="_blank" title="Thai PBS Google Plus"><i class="fa fa-google-plus"></i></a>
                            </li>
                           
                            <li>
                                <div id="stat">
<script language="javascript1.1"> __th_page="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>";</script> 
<script language="javascript1.1" src="http://hits.truehits.in.th/data/s0029048.js"></script>
<noscript>
<a target="_blank" href="http://truehits.net/stat.php?id=s0029048"><img src="http://hits.truehits.in.th/noscript.php?id=s0029048" alt="Thailand Web Stat" border="0" width="14" height="17" /></a>
<a target="_blank" href="http://truehits.net/">Truehits.net</a>
</noscript>
</div>

                            </li>
                        </ul>
                        <form class="form" id="mini-search-form" action="http://news.thaipbs.or.th/search" method="get" >
                            <div class="form-group">
                                <input type="search" id="mini-search-input" name="q" class="form-control" autocomplete="off" tabindex="1">
                                 <input type="hidden"  name="tab" value="news">
                                 <input type="hidden"  name="time" value="last_month">
                                <span class="icon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div><!--/.navbar-collapse -->
                </div><!--/#top-nav -->
                <!-- #header-banner -->
				    <div id="search-bar-holder">
                <form class="form" id="search-form" action="http://news.thaipbs.or.th/search" method="get">
                    <div class="form-group">
                        <input type="search" id="search-input" name="q" placeholder="ค้นหาข่าว, รายการ, พิธีกร..." class="form-control search-bar" autocomplete="off" tabindex="1">
                        <input type="hidden"  name="tab" value="news">
                        <input type="hidden"  name="News-time" value="last_month">
                    </div>
                    <button type="button" id="close-search-bar">ปิด</button>
                    <span id="search-icon">
                        <i class="fa fa-search"></i>
                    </span>
                </form>
            </div>
     </nav><!--/#header-nav -->
</header><!--/#header -->

<div class="container effect7">
                <div id="header-banner" class="grey">
                    <div class="site-branding banner ">
                        <h2 class="site-title logo">
                            <a href="<?php bloginfo('url'); ?>" rel="home">
                                <img src="<?php bloginfo('url'); ?>/wp-content/themes/watersharing/images/logo.png" alt="Thai PBS logo" />
                            </a>
                        </h2>
                        <div class="site-description text hidden">
                            <p class="slogan h1">ข่าวไทยพีบีเอส</p>
                            <p class="date h2">วันอังคารที่ 23 กุมภาพันธ์ พ.ศ. 2559</p>
                        </div>
                    </div>
                </div><!--/header-banner -->

                <!-- main nav -->
                <div id="main-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed dropdown-toggle" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="text-bar">
                                <span class="text">เมนูหลัก</span>
                                <span class="text-close"><i class="fa fa-times"></i> ปิด</span>
                            </span>
                          
                        </button>
                        <a class="navbar-brand col-xxs-4 col-xs-6" href="http://news.thaipbs.or.th/news">
                            <img src="http://news.thaipbs.or.th/images/logo/news_logo.png" alt="Thai PBS News logo" class="img-responsive logo" />
                            <img src="http://news.thaipbs.or.th/images/logo/news_logo-sm.png" alt="Thai PBS News logo" class="img-responsive logo-sm" />
                        </a>
                    </div>
                    <div id="main-navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                           <li>
                                <a  target="_blank" href="<?php bloginfo('url'); ?>/project" class="" title="รายละเอียดโครงการ">รายละเอียดโครงการ</a>
                            </li>
							
                            <li>
                                <a  target="_blank" href="<?php bloginfo('url'); ?>/news" class="" title="ข่าวภัยแล้ง">ข่าวภัยแล้ง</a>
                            </li>
                            <li>
                                <a  target="_blank" href="<?php bloginfo('url'); ?>/program" class="" title="ลดน้ำ 30 %">ลดน้ำ 30 %</a>
                            </li>
                            <li>
                                <a href="<?php bloginfo('url'); ?>/area" target="_blank" class="" title="พื้นที่ภัยแล้ง" >พื้นที่ภัยแล้ง</a>
                            </li>
                            <li>
                                <a href="<?php bloginfo('url'); ?>/activity" class="" title="กิจกรรมร่วมสนุก">กิจกรรมร่วมสนุก</a>
                            </li>
                            <li>
                                <a  target="_blank" href="<?php bloginfo('url'); ?>/multimedia" class="" title="Multimedia" >Multimedia</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.navbar-collapse -->
                </div><!--/#main-nav -->
				
                <!--<div id="top-bg"></div>
                <div id="other-bg"></div>
                <div id="watermask-left" class="header-watermask"></div>
                <div id="watermask-right" class="header-watermask"></div>-->
           

        
		
        <div id="content" class="news">      