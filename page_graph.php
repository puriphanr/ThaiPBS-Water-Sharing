<?php
/*
Template name: graph
*/
?> 
<?php get_header();?>
<?php
$orgInfo 		= getPost('org',array('title','icon'),'desc');
$metaQuery =  array(
								array(
									'key' => 'parent', 
									'value' => '',
									'compare' => '!='
								)
				);
$getUsageRange 	= getPost('usage_water_date',array('title'),'asc','',$metaQuery);
?>
<section id="graph">
	<h2>ปริมาณการใช้น้ำ <span>ระดับองค์กร</span></h2>
	<div id="container" style="min-width: 310px; max-width: 100%; height: 600px; margin: 0 auto"></div>

	<div class="time-btn">
		<input id="ex1" data-slider-id='ex1Slider' type="text"/>
		
	
	</div>
</section>

<?php get_footer();?>
<script type="text/javascript">
function initHighchart(weekID){
	var logo = new Array();
	var title = new Array();
	<?php foreach($orgInfo as $key=>$row){?>
		logo[<?php echo $row['id']?>] = '<?php echo $row['icon']['sizes']['thumbnail']?>';
		title[<?php echo $row['id']?>] = '<?php echo $row['title']?>';
	<?php } ?>
	
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: [
			<?php foreach($orgInfo as $key=>$row){?>
				'<?php echo $row['id']?>',
			<?php } ?>
			],
            title: {
                text: null
            },
			labels: {
				enabled:false
			}
        },
		plotOptions: {
           bar: {
				colorByPoint: true,
		colors: [
'#1E90FF', 
'#458B00', 
'#000080', 
'#CDCD00', 
'#B22222', 
'#FF69B4', 
'#008080', 
'#FF8C00', 
'#68228B'
],
                dataLabels: {
                    enabled: true,
                    useHTML: true,
                    formatter: function() {
						
                        return '<div class="graph-label box-shade"><div class="triangle-down-right"></div><div class="point">'+this.point.y+'%</div><div class="title">'+title[this.x]+'</div>  <div class="img box-shade"><img src="'+logo[this.x]+'" /> </div></div>'; 
                    }
                }
            }
        },
        yAxis: {
			allowDecimals:false,
            min: 0,
            title: {
                text: ''
            },
            labels: {
				formatter : function(){
					return this.axis.defaultLabelFormatter.call(this) + '%';
				}
            },
			max:50,
			tickInterval: 10,
			opposite:true
        },
        tooltip: {
            enabled:false
        },
        credits: {
            enabled: false
        },
        series: [{
			 showInLegend: false,        
            name: 'ปริมาณการใช้น้ำ',
			color: '#0090ec',
            data: [7, 15, 25, 8, 16,35,5,30,10]
        }]
    });

}
$(function () {
	//initHighchart(1);
	//$('.graph-label').css('margin-top','-7px');
	$('.time-click').click(function(e){
		e.preventDefault();
		initHighchart(1);
	})
	$('#ex1').slider({
		tooltip: 'always',
			ticks: [<?php foreach($getUsageRange as $key=>$row){ ?>
				'<?php echo $key?>',
			<?php } ?>],
		 
		 ticks_labels: [<?php foreach($getUsageRange as $key=>$row){ ?>
				'<?php echo $row['title']?>',
			<?php } ?>],
		 ticks_snap_bounds: 1
	});
	
	$("#ex1").on("slideStop", function(slideEvt) {
		initHighchart(slideEvt.value);
	});

});
$(window).load(function(){
initHighchart(1);
});
</script>