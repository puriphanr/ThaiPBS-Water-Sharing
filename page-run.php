<?php get_header();?>

<section class="content-detail">
<div class="col-lg-12">
<h2><?php the_title()?></h2>
<div class="description hidden">ประกาศรายชื่อกิจกรรมเดินวิ่งการกุศล “แบ่งน้ำใช้ ปันน้ำใจ สู้ภัยแล้ง มินิมาราธอน”</div>
<table class="table  table-bordered">
<?php 
$file = get_template_directory_uri()."/files/runner.csv";
$myfile = fopen($file, "r") or die("Unable to open file!");
if ($myfile) {
$i = 0;
    while (($line = fgets($myfile)) !== false) {

				$data = explode(",", $line);
				$length = sizeof($data);
			if($i==0){
				echo "<thead><tr>";
				foreach($data as $key=>$val){
					if($key == 0){
						echo "<th> ลำดับ </th>";
					}
					if($key == 1){
						echo "<th>ชื่อ - สกุล";

					}else if($key == 2){
						echo "</th>";
						
					}else if($key == 3){
						
					}else{
						echo "<th>".$val."</th>";

					}
				}
				echo "</tr></thead>";
			}else{
				echo "<tbody><tr ";
				if($i%2 == 0 && $i > 1){echo"class='active'";}
				echo ">";
				foreach($data as $key=>$val){
					if($key == 0){
						echo "<th>".$i."</th>";
					}
					if($key == 1){
						echo "<th>".$val." ";

					}else if($key ==2){
						echo $val."</th>";
						
					}else if($key == 3){
						
					}else{
					echo "<td>".$val."</td>";
					}
				}
				echo "</tr></tbody>";
			}
		$i++;
    }

    fclose($myfile);
} else {
    // error opening the file.
	echo "cann't open file";
} 
?>
</table>
</div>
</section>



<?php get_footer();?>

<style>
.post-views-count{display:none;}

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