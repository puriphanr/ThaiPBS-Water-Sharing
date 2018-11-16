<?php
/*
Template name: area_test
*/
?> 
<?php
	if(empty($_GET['damD'])){

		$curdate = $wpdb->get_results( "SELECT MAX(collect_date) AS max_date FROM dam_level" );
	}
	else{
		$curdate[0]->max_date = date('Y-m-d',strtotime($_GET['damD']));
	}
	$colorArray = array(
						'blue'=>'#0090ec',
						'green'=>'#5cb85c',
						'yellow'=>'#f4e877',
						'red'=>'#f4274c'
					   );
	$min = $wpdb->get_results( "SELECT dam_level.*,dam.*,DATEDIFF(usage_period,CURDATE()) AS usage_date 
												  FROM dam_level,dam
												  WHERE dam_level.collect_date = '".$curdate[0]->max_date."'  
												  AND dam_level.dam_id = dam.dam_code
												  ORDER BY dam_level.usage_level ASC
												  LIMIT 1
												  " ); 														  
	$minColor = map_damColor($min[0]->usage_level);
	$hightCount = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
													  WHERE collect_date = '".$curdate[0]->max_date."'
													  AND usage_level > 81" );
	$mediumCount = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
													  WHERE collect_date = '".$curdate[0]->max_date."'
													  AND  usage_level > 50 AND usage_level < 81" ); 
	$lowCount = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
													  WHERE collect_date = '".$curdate[0]->max_date."'
													  AND  usage_level > 30 AND usage_level < 51" ); 		

	$lowestCount = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
													  WHERE collect_date = '".$curdate[0]->max_date."'
													  AND  usage_level < 31" ); 		

	$allDate = $wpdb->get_results( "SELECT DISTINCT(collect_date) FROM dam_level ORDER BY collect_date ASC" ); 		
	
?>
<?php get_header();?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/bootstrap-datepicker/css/bootstrap-datetimepicker.css" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/bootstrap-progressbar-master/css/bootstrap-progressbar-3.3.4.css" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/Pie-style-Loading/jquery-pie-loader.css" type="text/css">
<style type="text/css">
#mapsDam{
	padding:40px;
}
.svg-pie { float:left; margin-bottom:10px;}
.demo-6 {
  box-shadow: none;
  margin-left:-15px;
  background: <?php echo $minColor[1] ?>;
}
.demo-6 circle:nth-child(1) {
  fill: <?php echo $minColor[1] ?>;
}
.demo-6 circle:nth-child(2) {
  fill: <?php echo $minColor[1] ?>;
  stroke: <?php echo $minColor[1] ?>;
}
.demo-6 .percentage {font-size:5em; color: white;}

#demo-7 {
  box-shadow: none;
  background: #FFF;
  margin-top: 60px;
}
#demo-7 circle:nth-child(1) {
  fill: #FFF;
}
#demo-7 circle:nth-child(2) {
  fill: #FFF;
  stroke: #FFF;
}
#demo-7 .percentage {font-size:2.5em; color: black;}

#mapdiv{
	width:100%;
	height:700px;
	    border: 1px solid #EEE;
		border-radius:8px;
}
.progress-in{
	margin-top: 10px;
    margin-bottom: 20px;
	height:40px;
	position:absolute;
	width:90%;
}
.progress.vertical {
	width:100%;
}
.progress.vertical .progress-bar {
	background-color : <?php echo $minColor[1] ?>;
}
.dam_head{
	font-size:20px;
	background:#EEE;
	padding:10px;
	margin-bottom:30px;
	line-height:35px;
}
.dam_date{
	margin-left:10px;
	color:#414141;
	font-size:18px;
}
.source{
	margin-top:20px;
	
}
.table{
	font-family:"sukhumvit_setsemi_bold";
}
.table,.table thead tr th,.table tbody tr td{
	border:0px !important;
}
.table tr td div.strong{
	color:#4c4e4d;
	font-weight:900;
	font-size:20px;
}
.table tbody tr td{
	line-height:20px;
}
.table tbody tr td span.usage{
	background:#4c4e4d;
	color:#FFF;
	padding:8px;
	font-size:22px;
	display:block;
	width:40px;
}
</style>
<script src="//publish.viostream.com/embed/l-bq7g35h"></script>
<?php
$dam = getPost('dam_level',array('title','dam','usage_level','current_level'));
?>
<section id="mapsDam">
<h1 class="dam_head">
	<div class="row">
	<div class="col-lg-5">สรุปปริมาณน้ำในอ่างเก็บน้ำขนาดใหญ่ทั่วประเทศ</div>
	<div class="col-lg-3"><div class="dam_date">(ข้อมูล ณ วันที่ <?php echo dateth($curdate[0]->max_date)?>)</div></div>
	<div class="col-lg-4">
	<div class="form-group">
				
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" placeholder="เลือกวันที่" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
	</div>
	</div>
</h1>


<div class="row">

	<div class="col-lg-7">
		<div id="mapdiv"></div>	
	</div>
	<div class="col-lg-5">
	
		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<div id="demo-62" class="svg-pie demo-6"></div>
			<div style="height:500px">
				<div class="progress vertical bottom">
					<div class="progress-bar" role="progressbar" data-transitiongoal="<?php echo $min[0]->usage_level ?>"></div>
				</div>
			</div>
		</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			
			<h2>เขื่อนที่วิกฤตที่สุด</h2>
			<div class="damDesc" style="margin-bottom:30px">
			<div class="dam_title" style="color:<?php echo $minColor[1] ?>"><?php echo $min[0]->dam_name?></div>
			<p class="damProvince bm">จังหวัด <?php 
						if($min[0]->province_id != "" && $min[0]->province_id != 0){ 
							$exProvince = explode(',',$min[0]->province_id);
							$prowArray = array();
							foreach($exProvince as $prow){
								$province_list = $wpdb->get_results( "SELECT PROVINCE_NAME FROM province WHERE PROVINCE_ID = ".$prow ); 
								$prowArray[] = $province_list[0]->PROVINCE_NAME;
							}
							
							echo implode(',',$prowArray);
						}
						else{
							echo '-';
						}
						?>
			</p>
			<p class="lead bm" style="color:<?php echo $minColor[1] ?>"><span>ปริมาณน้ำใช้การได้ : </span><?php echo $min[0]->usage_level?> %<p>
			<p class="lead bm"><span>ใช้การได้ถึงวันที่ : </span><?php echo dateth($min[0]->usage_period)?><p>
			<p class="lead bm" style="color:<?php echo $minColor[1] ?>"><span>คาดว่าจะหมดภายใน : </span><?php echo $min[0]->usage_date > 0 ? $min[0]->usage_date : 0?> วัน</p>
			<p class="lead "><span>จังหวัดที่ได้รับผลกระทบ</span></p>
			<p class="lead bm">
			<?php 
						if($min[0]->effect_province != "" && $min[0]->effect_province != 0){ 
							$exProvince = explode(',',$min[0]->effect_province);
							$prowArray = array();
							foreach($exProvince as $prow){
								$province_list = $wpdb->get_results( "SELECT PROVINCE_NAME FROM province WHERE PROVINCE_ID = ".$prow ); 
								$prowArray[] = $province_list[0]->PROVINCE_NAME;
							}
							
							echo implode(',',$prowArray);
	
						}
						else{
							echo '-';
						}
						?>
			</p>
			</div>
			
			<div class="row">
			<div class="col-sm-12">
				<?php
		/*
				$data = $wpdb->get_results( "SELECT dam_level.*,dam.dam_name,DATEDIFF(usage_period,CURDATE()) AS usage_date FROM dam_level,dam
												  WHERE dam_level.collect_date = '".$damSearchID."'  
												  AND dam_level.dam_id = dam.dam_code
												  ORDER BY dam_level.create_time DESC
												  " ); 
				*/
				?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
						  <tr>
							<th class="text-center" colspan="2"></th>
							<th class="text-center" >จำนวน</th>
						  </tr>
						 
						</thead>
						<tbody>
							<tr>
								<td width="15%"><img src="<?php echo get_template_directory_uri(); ?>/images/map-rule-blue.png"/></td>
								<td width="70%"><div class="strong">มากกว่า 81%</div><div>ดีมาก</div></td>
								<td width="15%" class="text-center">
								<span class="usage">
								<?php										  
								echo $hightCount[0]->total;
								?>
								</span>
								</td>
							</tr>
							<tr>
								<td><img src="<?php echo get_template_directory_uri(); ?>/images/map-rule-green.png"/></td>
								<td><div class="strong">51-80%</div><div>ดี</div></td>
								<td class="text-center">
								<span class="usage">
								<?php
								echo $mediumCount[0]->total;
								?>
								</span>
								</td>
							</tr>
							<tr>
								<td><img src="<?php echo get_template_directory_uri(); ?>/images/map-rule-yellow.png"/></td>
								<td><div class="strong">31-50%</div><div>พอใช้</div></td>
								<td class="text-center">
								<span class="usage">
								<?php
									echo $lowCount[0]->total;
								?>
								</span>
								</td>
							</tr>
							<tr>
								<td><img src="<?php echo get_template_directory_uri(); ?>/images/map-rule-red.png"/></td>
								<td><div class="strong">น้อยกว่า 30%</div><div>น้อย</div></td>
								<td class="text-center">
									<span class="usage">
									<?php
										echo $lowestCount[0]->total;
									?>
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
	</div>
	
	</div>
</div>
</div>
</div>
<div class="source">ที่มา : ศูนย์ประมวลวิเคราะห์สถานการณ์น้ำ กรมชลประทาน  <a href="http://wmsc.rid.go.th" target="_blank">http://wmsc.rid.go.th</a></div>
</section>

<section id="mapsReport">
<h1 class="dam_head">สรุปปริมาณการร้องเรียนทั่วประเทศ<span class="dam_date">(ข้อมูล ณ วันที่ )</span></h1>
<div class="row">
	<div class="col-lg-5">
	
	</div>
	<div class="col-lg-7">
	
	</div>
</div>
</section>

<?php get_footer();?>

        <script src="<?php echo get_template_directory_uri(); ?>/js/ammap/ammap.js" type="text/javascript"></script>
		 <script src="<?php echo get_template_directory_uri(); ?>/js/ammap/plugins/responsive/responsive.js" type="text/javascript"></script>
        <!-- map file should be included after ammap.js -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/ammap/maps/js/thailandHigh.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ammap/themes/black.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/Pie-style-Loading/jquery-pie-loader.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-progressbar-master/bootstrap-progressbar.js"></script>
<script type="text/javascript">

			var map;
			var minBulletSize = 3;
			var maxBulletSize = 70;
			var min = Infinity;
			var max = -Infinity;

			AmCharts.theme = AmCharts.themes.black;

			// build map
			AmCharts.ready(function() {
				map = new AmCharts.AmMap();
				map.responsive = {
				  "enabled": true,
				  "minWidth": 200,
				  "maxWidth": 400,
				  "maxHeight": 800,
				  "minHeight": 200,
				};
				map.zoomControl = false;
				map.areasSettings = {
					unlistedAreasAlpha: 0.1,
					outlineColor:"#7b7c80",
					color:"#7b7c80",
					rollOverColor : "#0090ec",
					rollOverOutlineColor : "#0090ec",
					autoZoom: false,
					selectedColor: "red"
				};
				
				map.showBalloonOnSelectedObject=false;
				var dataProvider = {
					mapVar: AmCharts.maps.thailandHigh,
					getAreasFromMap: true,
					
					images: [ 
					<?php
					$data = $wpdb->get_results( "SELECT dam_level.*,dam.*,DATEDIFF(usage_period,CURDATE()) AS usage_date 
												  FROM dam_level,dam
												  WHERE dam_level.collect_date = '".$curdate[0]->max_date."'  
												  AND dam_level.dam_id = dam.dam_code
												  " ); 
					foreach($data as $key=>$row){
					?>
					{
					  latitude: <?php echo $row->lat+0.4?>,
					  longitude: <?php echo $row->long?>,
					  imageURL: "<?php echo get_template_directory_uri(); ?>/images/dam-icon-<?php $cColor = map_damColor($row->usage_level); echo $cColor[0]; ?>.png",
					  width: 22,
					  height: 30,
					  id: <?php echo $row->level_id?>,
					  selectable: true,
					  title: '<?php echo $row->dam_name?>',
					  description : '<div class="damPv"><strong>จังหวัด</strong> <?php 
						if($row->province_id != "" && $row->province_id != 0){ 
							$exProvince = explode(',',$row->province_id);
							foreach($exProvince as $pkey=>$prow){
								$province_list = $wpdb->get_results("SELECT PROVINCE_NAME FROM province WHERE PROVINCE_ID = ".$prow ); 
								$prowMapArray[$key][$pkey] = $province_list[0]->PROVINCE_NAME;
							}
					
							echo implode(',',$prowMapArray[$key]);
						}
						else{
							echo '-';
						}
					 ?></div><div class="damLevel"><div><strong>ปริมาณน้ำใช้การได้</strong></div><div class="progress progress-in"><div class="progress-bar" data-transitiongoal="<?php echo $row->usage_level?>"></div></div><div id="demo-7" class="svg-pie"></div></div>'
					},
					<?php } ?>
					]
				}
				
				
				map.dataProvider = dataProvider;
				map.write("mapdiv");
				map.addListener("clickMapObject", function (event) {
					$.ajax({
						url :'<?php bloginfo('url'); ?>/submit?fn=getDamLevel&id='+event.mapObject.id,
						type : 'GET',
						dataType : 'JSON',
						beforeSend : function(){
							$('#demo-7').html('<img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif"/>');
							var $top = parseInt($('.ammapDescriptionWindow').css('top'),10);
							console.log($top);
							if($top >= 500){
								$('.ammapDescriptionWindow').css('top',$top-300+'px');
							}
						},
						success:function(data){
							
							var colorCode;
							if(data[1].usage_level > 81){
								colorCode = '#0090ec';
							}
							else if(data[1].usage_level > 50){
								colorCode = '#5cb85c';
							}
							else if(data[1].usage_level > 30){
								colorCode = '#f4e877';
							}
							else{
								colorCode = '#f4274c';
							}
							$('.progress-in .progress-bar').css('background-color',colorCode);
							$('.progress-in .progress-bar').progressbar({
								 transition_delay: 500
							}); 
							$('#demo-7').css('border','4px solid '+colorCode);
							$('#demo-7').svgPie({ percentage: data[1].usage_level,dimension:100 });
						
						}
					})
					
				})
			});
		jQuery(document).ready(function ($) {	
			$('#demo-6,#demo-62').svgPie({ percentage: <?php echo $min[0]->usage_level?> });
			 $('.progress .progress-bar').progressbar();
			 $('#datetimepicker2').datetimepicker({
                    locale: 'th',
					format : 'DD/MM/YYYY',
					useCurrent : false,
					 enabledDates: [
						<?php foreach($allDate as $row){?>
                        new Date(<?php echo date('Y',strtotime($row->collect_date))?>, <?php echo date('m',strtotime($row->collect_date))?> - 1, <?php echo date('d',strtotime($row->collect_date))?>),
						<?php } ?> 
                    ]
                }).on('dp.change',function(e){
					 var cdate = new Date(e.date.toString());
					 var throwDate = cdate.getFullYear()+'-'+(cdate.getMonth()+1)+'-'+(cdate.getDate());
					 
					window.location = '<?php bloginfo('url'); ?>/area_test?damD='+throwDate;
				});
		})
</script>
