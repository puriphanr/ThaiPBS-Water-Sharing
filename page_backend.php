<?php
/*
Template name: backend
*/
?> 
<?php get_header();?>
<section class="content-detail">
<?php if(!is_user_logged_in()){ ?>
<div class="row form-wrap">
      <div class="col-md-12">
        <form id="login-form" class="form-signin" method="POST" action="<?php bloginfo('url'); ?>/submit?fn=login">
          <h2 class="form-signin-heading text-center">ระบบบันทึกข้อมูลเว็บไซต์ภัยแล้ง</h2>
          <p class="text-center showerror">กรุณาระบุชื่อผู้ใช้และรหัสผ่านของท่าน</p>
		  <label for="inputPassword" class="sr-only">ชื่อผู้ใช้</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="ชื่อผู้ใช้" required>
          <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" required>
		  <label for="inputPassword">ส่วนจัดการข้อมูล</label>
          <select name="func" id="func" class="form-control">
				<option value="dam">ปริมาณน้ำในเขื่อน</option>
				<option value="report">เรื่องร้องเรียน</option>
		  </select>
		  <div class="checkbox">
          <label>
            <input type="checkbox" name="rememberme" value="1"> จดจำข้อมูลของฉัน
          </label>
        </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">ลงชื่อเข้าใช้</button>
        </form>
      </div>
    </div>
<?php 
} else { 
	$current_user 	= wp_get_current_user();
	$fnArray = array('dam'=>'ปริมาณน้ำในเขื่อน','report'=>'เรื่องร้องเรียน');
?>
<h3>จัดการข้อมูลเว็บไซต์ > <?php echo $fnArray[$_GET['fn']]?></h3>
<div class="text-right">
	ยินดีต้อนรับคุณ <strong><?php echo $current_user->data->display_name ?></strong> 
	<a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></div>
<div class="row" style="margin:10px">
	
<div class="col-lg-12">
<?php if(!empty($_GET['success'])){ ?>
	<div class="alert alert-success">
  <strong>บันทึกข้อมูลเรียบร้อยแล้ว</strong>
</div>
<?php } ?>
<?php
if($_GET['fn']=='dam'){
	$province_rows = $wpdb->get_results( "SELECT PROVINCE_ID,PROVINCE_NAME FROM province" ); 
?>
<ul class="nav nav-tabs">
	<li role="presentation" <?php echo !$_GET['subfn'] ? 'class="active"' : NULL ?>><a href="<?php bloginfo('url'); ?>/backend?fn=dam">ข้อมูลเขื่อน</a></li>
	<li role="presentation" <?php echo $_GET['subfn']=='level' ? 'class="active"' : NULL ?>><a href="<?php bloginfo('url'); ?>/backend?fn=dam&subfn=level">ปริมาณน้ำในเขื่อน</a></li>
	
</ul>

	<?php 
	if(!$_GET['subfn']){ 
		$data = $wpdb->get_results( "SELECT * FROM dam ORDER BY create_time DESC" ); 
	?><div class="text-right"style="margin:20px"><a id="addDam" href="#" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</a></div>
	<div class="row">
	
	<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" width="5%"  rowspan="2">#</th>
					<th class="text-center" width="25%"  rowspan="2">ชื่อเขื่อน</th>
					<th class="text-center" width="20%" rowspan="2">จังหวัด</th>
					<th class="text-center" width="10%" rowspan="2">ระดับน้ำสูงสุด (รนส.)</th>
					<th class="text-center" width="10%" rowspan="2">ระดับน้ำกักเก็บ (รนก.)</th>
					<th class="text-center" width="20%" colspan="2" >ตำแหน่ง</th>
					<th class="text-center" width="10%" rowspan="2" >จัดการ</th>
				  </tr>
				  <tr>
					<th class="text-center" width="5%">LAT</th>
					<th class="text-center" width="5%">LONG</th>
					
				  </tr>
				</thead>
				<tbody>
					<?php foreach($data as $key=>$row){ ?>
					<tr>
						<td class="text-center"><?php echo $key+1 ?></td>
					
						<td><?php echo $row->dam_name ?></td>
						<td class="text-center">
						<?php 
						if($row->province_id != "" && $row->province_id != 0){ 
							$exProvince = explode(',',$row->province_id);
							foreach($exProvince as $prow){
								$province_list = $wpdb->get_results( "SELECT PROVINCE_NAME FROM province WHERE PROVINCE_ID = ".$prow ); 
								$prowArray[$key][] = $province_list[0]->PROVINCE_NAME;
							}
							
							echo implode(',',$prowArray[$key]);
						}
						else{
							echo '-';
						}
						?>
						</td>
						<td class="text-center"><?php echo $row->cap_over ?></td>
						<td class="text-center"><?php echo $row->cap_limit ?></td>
						<td class="text-center"><?php echo $row->lat ?></td>
						<td class="text-center"><?php echo $row->long ?></td>
						<td class="text-center">
							<a href="<?php bloginfo('url'); ?>/submit?fn=getDam&id=<?php echo $row->dam_id?>" class="btn btn-warning btn-xs editDam" title="แก้ไข"><i class="fa fa-edit"></i></a>
							<a href="<?php bloginfo('url'); ?>/submit?fn=removeDam&id=<?php echo $row->dam_id?>" class="btn btn-danger btn-xs delDam" title="ลบ"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
	</div>
	
	<!-- Modal Form -->
	<div class="modal fade modal-form" id="dam-modal" role="dialog" 
		 aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal">
						   <span aria-hidden="true">&times;</span>
						   <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
							ปรับปรุงข้อมูลเขื่อน
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					<div id="formerror"></div>
					<form class="form-horizontal" role="form" id="dam-form"  action="<?php bloginfo('url'); ?>/submit?fn=updateDam" method="POST">
						<input type="hidden" name="dam_id" id="dam_id" value="" />
						
					  <div class="form-group">
						<label  class="col-sm-2 control-label">ชื่อเขื่อน</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="dam_name" id="dam_name"/>
						</div>
					  </div>
					  
					   <div class="form-group">
						<label  class="col-sm-2 control-label">จังหวัดที่ตั้ง</label>
						<div class="col-sm-10">
							<select name="province_id[]" class="form-control select2" id="province_id" multiple="multiple">
								
								<?php foreach($province_rows as $key=>$row){ ?>
									<option value="<?php echo $row->PROVINCE_ID?>"><?php echo $row->PROVINCE_NAME?></option>
								<?php } ?>
							</select>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-2 control-label">จังหวัดที่ได้รับผลกระทบ</label>
						<div class="col-sm-10">
							<select multiple="multiple" name="effect_province[]" class="form-control select2" id="effect_province">
							
								<?php foreach($province_rows as $key=>$row){ ?>
									<option value="<?php echo $row->PROVINCE_ID?>"><?php echo $row->PROVINCE_NAME?></option>
								<?php } ?>
							</select>
						</div>
					  </div>
					  
					    <div class="form-group">
						<label  class="col-sm-2 control-label">ความจุ</label>
						<label  class="col-sm-4 control-label">ระดับน้ำสูงสุด</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="cap_over" id="cap_over"/>
						</div>
					
					  </div>
					    <div class="form-group">
					  	<label  class="col-sm-4 control-label">ระดับน้ำกักเก็บ</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="cap_limit" id="cap_limit"/>
						</div>
						</div>
					   <div class="form-group">
						<label  class="col-sm-2 control-label">ตำแหน่ง</label>
						<label  class="col-sm-1 control-label">LAT</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="lat" id="lat"/>
						</div>
						<label  class="col-sm-1 control-label">LONG</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="long" id="long"/>
						</div>
					  </div>
					</form>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" onclick="$('#dam-form').submit();" class="btn btn-primary">บันทึก</button>
					<button type="button" class="btn btn-default"data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>
	<?php }else{ ?>
		
		<?php 
		if($_GET['subfn']=='level'){
			if(!$_GET['d']){
				$damSearchID = date('Y-m-d');
			}
			else{
				$damSearchID = $_GET['d'];
			}
			$dam = $wpdb->get_results( "SELECT * FROM dam ORDER BY create_time DESC" ); 
		?>
		<div class="row" style="padding:20px">
			<form class="form-horizontal" role="form">
						<input type="hidden" id="sel_dam_val" value="<?php echo $damSearchID?>" />
						   <div class="form-group">
							<label  class="col-sm-2 control-label">วันที่</label>
							<div class="col-sm-4">

									<input type="text" class="form-control datepicker" value="<?php echo date('d/m',strtotime($damSearchID)).'/'.(date('Y',strtotime($damSearchID))+543)?>" id="sel_dam"/>

							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-default" id="searchDamLevel">ดูข้อมูล</button>
							</div>
						  </div>
			</form>
			
		</div>
		<div class="row" style="padding:20px">
			<div class="col-sm-12">
				<?php
		
				$data = $wpdb->get_results( "SELECT dam_level.*,dam.dam_name,DATEDIFF(usage_period,CURDATE()) AS usage_date FROM dam_level,dam
												  WHERE dam_level.collect_date = '".$damSearchID."'  
												  AND dam_level.dam_id = dam.dam_code
												  ORDER BY dam_level.create_time DESC
												  " ); 
				
				?>
					<div class="col-lg-4">
					<table class="table table-bordered">
						<thead>
						  <tr>
							<th class="text-center" colspan="3">เกณฑ์</th>
							<th class="text-center" >จำนวน</th>
						  </tr>
						 
						</thead>
						<tbody>
							<tr>
								<td style="background:#0090ec" width="15%"></td>
								<td> > 81% </td>
								<td>ดีมาก</td>
								<td class="text-right">
								<?php
								$count = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
												  WHERE collect_date = '".$damSearchID."'
												  AND usage_level > 81" ); 
								echo $count[0]->total;
								?>
								</td>
							</tr>
							<tr>
								<td style="background:#5cb85c"></td>
								<td> 51-80% </td>
								<td>น้ำดี</td>
								<td class="text-right">
								<?php
								$count = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
												  WHERE collect_date = '".$damSearchID."'
												  AND  usage_level > 50 AND usage_level < 81" ); 
								echo $count[0]->total;
								?>
								</td>
							</tr>
							<tr>
								<td style="background:#f4e877"></td>
								<td> 31-50 % </td>
								<td>พอใช้</td>
								<td class="text-right">
								<?php
								$count = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
												  WHERE collect_date = '".$damSearchID."'
												  AND  usage_level > 30 AND usage_level < 51" ); 
								echo $count[0]->total;
								?>
								</td>
							</tr>
							<tr>
								<td style="background:#f4274c"></td>
								<td> <= 30% </td>
								<td>น้ำน้อย</td>
								<td class="text-right">
								<?php
								$count = $wpdb->get_results( "SELECT COUNT(*) AS total FROM dam_level
												  WHERE collect_date = '".$damSearchID."'
												  AND  usage_level < 31" ); 
								echo $count[0]->total;
								?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="text-right"style="margin:5px"><a id="addDamLevel" href="#" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</a></div>
			
				<table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" width="5%" >#</th>
					<th class="text-center" width="15%">เขื่อน</th>
					<th class="text-center" width="10%">ปริมาณทั้งหมด (%)</th>
					<th class="text-center" width="10%">ปริมาณ<br/>ทั้งหมด <br/>(ล้าน ม<sup>3</sup>)</th>
					<th class="text-center" width="10%">ปริมาณ<br/> น้ำใช้การ (%)</th>
					<th class="text-center" width="10%">ปริมาณ<br/> น้ำใช้การ (ล้าน ม<sup>3</sup>)</th>
					<th class="text-center" width="10%">เข้า<br/> (ล้าน ม<sup>3</sup>)</th>
					<th class="text-center" width="10%">ระบาย <br/> (ล้าน ม<sup>3</sup>)</th>
					<th class="text-center" width="10%">ส่วนต่าง <br/> (ล้าน ม<sup>3</sup>)</th>
					<th class="text-center" width="1%">เกณฑ์</th>
					<th class="text-center" width="10%">จัดการ</th>
				  </tr>
				 
				</thead>
				<tbody>
					<?php foreach($data as $key=>$row){ ?>
					<tr>
						<td class="text-center"><?php echo $key+1 ?></td>
						<td><?php echo $row->dam_name?></td>
						<td class="text-center"><?php echo $row->all_level ?></td>
						<td class="text-center"><?php echo $row->all_level2 ?></td>
						<td class="text-center"><?php echo $row->usage_level ?></td>
						<td class="text-center"><?php echo $row->usage_level2?></td>
						<td class="text-center"><?php echo $row->water_in?></td>
						<td class="text-center"><?php echo $row->water_out?></td>
						<td class="text-center"><?php echo $row->water_in - $row->water_out?></td>
						<td  style="background:
						<?php 
						if($row->usage_level > 81){
							echo '#0090ec';
						}
						elseif($row->usage_level > 50){
							echo '#5cb85c';
						}
						elseif($row->usage_level > 30){
							echo '#f4e877';
						}
						else{
							echo '#f4274c';
						}
						?>
						"
						>&nbsp;</td>
						<td class="text-center">
							<a href="<?php bloginfo('url'); ?>/submit?fn=getDamLevel&id=<?php echo $row->level_id?>" class="btn btn-warning btn-xs editDamLevel" title="แก้ไข"><i class="fa fa-edit"></i></a>
							<a href="<?php bloginfo('url'); ?>/submit?fn=removeDamLevel&id=<?php echo $row->level_id?>&d=<?php echo $searchDamLevel?>" class="btn btn-danger btn-xs delDamLevel" title="ลบ"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
		
		<!-- Modal Form -->
	<div class="modal fade modal-form" id="damLevel-modal" role="dialog" 
		 aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal">
						   <span aria-hidden="true">&times;</span>
						   <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">
							ปรับปรุงปริมาณน้ำ
					</h4>
				</div>
				
				<!-- Modal Body -->
				<div class="modal-body">
					<div id="formerror"></div>
					<form class="form-horizontal" role="form" id="damLevel-form"  action="<?php bloginfo('url'); ?>/submit?fn=updateDamLevel" method="POST">
						<input type="hidden" name="level_id" id="level_id" value="" />
						<input type="hidden" name="collect_date" id="collect_date" value="<?php echo $damSearchID?>" />
					
					 <div class="col-lg-12">	
					   <div class="form-group">
							<label  class="col-sm-2 control-label">เขื่อน</label>
							<div class="col-sm-10">
								<select name="dam_id" class="form-control select2" id="dam_id">
									
									<?php foreach($dam as $key=>$row){ ?>
										<option value="<?php echo $row->dam_code?>" <?php echo $row->dam_code==$damSearchID ? 'selected' : NULL ?>><?php echo $row->dam_name?></option>
									<?php } ?>
								</select>
							</div>
							
					</div>
					</div>
					  <div class="col-lg-6">
					    <div class="form-group">
						
						<div class="col-sm-12">
							<label  class="control-label">ปริมาณทั้งหมด (ล้าน ม <sup>3</sup>)</label>
							<input type="text" class="form-control" name="all_level2" id="all_level2"/>
						</div>
					  </div>
					  </div>
					  
					 <div class="col-lg-6">
					  <div class="form-group">
						<div class="col-sm-12">	
							<label  class="control-label">ปริมาณทั้งหมด (%)</label>
							<input type="text" class="form-control" name="all_level" id="all_level"/>
						</div>
					  </div>
					  </div>
						  <div class="col-lg-6">
					   <div class="form-group">
						
						<div class="col-sm-12">
							<label  class="control-label">ปริมาณน้ำใช้การได้ (ล้าน ม <sup>3</sup>)</label>
							<input type="text" class="form-control" name="usage_level2" id="usage_level2"/>
						</div>
					  </div>
					  </div>
					 <div class="col-lg-6">  
					<div class="form-group">
						
						<div class="col-sm-12">
							<label  class="control-label">ปริมาณน้ำใช้การได้ (%)</label>
							<input type="text" class="form-control" name="usage_level" id="usage_level"/>
						</div>
					 </div>
					 </div>
					<div class="col-lg-12">
					   <div class="form-group">
						<label  class="col-sm-2 control-label">ปริมาณน้ำเปลี่ยนแปลง</label>
						<label  class="col-sm-1 control-label">เข้า</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="water_in" id="water_in"/>
						</div>
						<label  class="col-sm-1 control-label">ระบาย</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="water_out" id="water_out"/>
						</div>
					  </div>
					 </div>
					  <div class="col-lg-12">
					   <div class="form-group">
							<label  class="col-sm-2 control-label">ใช้การได้ถึงวันที่</label>
							<div class="col-sm-4">

									<input type="text" class="form-control datepicker" value="" id="usage_period_show"/>
									<input type="hidden" name="usage_period" id="usage_period" value="" />
							</div>
						
						  </div>
					</div>
					</form>
				</div>
				<div style="clear:both"></div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" onclick="$('#damLevel-form').submit();" class="btn btn-primary">บันทึก</button>
					<button type="button" class="btn btn-default"data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>
		<?php } else { ?>
		
		
		<?php } ?>
	
	<?php } ?>

<?php } ?>
	
<?php 
if($_GET['fn']=='report'){ 
	$data = $wpdb->get_results( "SELECT complaint.*,province.*
								 FROM complaint,province
								 WHERE complaint.province_id = province.PROVINCE_ID
								 ORDER BY complaint.create_time DESC" ); 
?>
<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" width="5%">#</th>
					<th class="text-center" width="15%">วันที่แจ้ง</th>
					<th class="text-center" width="30%">เรื่อง</th>
					<th class="text-center" width="20%">ผู้แจ้ง</th>
					<th class="text-center" width="20%">จังหวัด</th>
					<th class="text-center" width="10%">จัดการ</th>
				  </tr>
				</thead>
				<tbody>
					<?php foreach($data as $key=>$row){ ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $row->create_time ?></td>
						<td><?php echo $row->comp_title ?></td>
						<td><?php echo $row->fullname ?></td>
						<td><?php echo $row->PROVINCE_NAME ?></td>
						<td class="text-center">
							<a href="<?php bloginfo('url'); ?>/submit?fn=getDamLevel&id=<?php echo $row->level_id?>" class="btn btn-warning btn-xs editDamLevel" title="แก้ไข"><i class="fa fa-edit"></i></a>
							<a href="<?php bloginfo('url'); ?>/submit?fn=removeDamLevel&id=<?php echo $row->level_id?>&d=<?php echo $searchDamLevel?>" class="btn btn-danger btn-xs delDamLevel" title="ลบ"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
<?php } ?>


</div>

</div>
<?php } ?>
</section>
<?php get_footer();?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	$('#login-form').submit(function(e){
				e.preventDefault();
				$.ajax({
					url : $(this).attr('action'),
					type : 'POST',
					dataType : 'JSON',
					data : new FormData(this),
					processData: false,
					contentType: false,
					beforeSend : function(){
						$('#modal-wait').modal('show');
					},
					success : function(data){
						$('#modal-wait').modal('hide');
						if(data[0]){
							window.location.href = '<?php bloginfo('url'); ?>/backend?fn='+$('#func').val();
						}
						else{
							$('#login-form .showerror').html('<div class="notice error"><p>'+data[1]+'</p></div>').css('color','#ea4444');
						}
					}
				})
	})
	
	$('.select2').select2({ width: '100%' }); 
	
	$("#sel_dam,#usage_period_show").datepicker({
					buttonText: "เลือกวันที่",
					inline: true,
					dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส']
	});
	
	

	 $('.modal-form').on('hidden.bs.modal', function(){
					$(this).find('form')[0].reset();
	});
	
	$('#addDam').click(function(){
		$('#dam-modal').modal('show');
	})
	
	$('.editDam').click(function(e){
		e.preventDefault();
		$.ajax({
			url : $(this).attr('href'),
			type : 'GET',
			dataType : 'JSON',
			beforeSend : function(){
						$('#modal-wait').modal('show');
					},
			success : function(data){
				$('#modal-wait').modal('hide');
				if(data[0]){
					$('#dam_id').val(data[1].dam_id);
					$('#dam_name').val(data[1].dam_name);
					$('#province_id').val(data[1].province_id.split(',')).trigger("change");
					$('#effect_province').val(data[1].effect_province.split(',')).trigger("change");
					$('#lat').val(data[1].lat);
					$('#long').val(data[1].long);
					$('#cap_over').val(data[1].cap_over);
					$('#cap_limit').val(data[1].cap_limit);
					$('#dam-modal').modal('show');
				}
			}
		});
	})
	
	$('#dam-form').submit(function(e){
				e.preventDefault();
				$.ajax({
					url : $(this).attr('action'),
					type : 'POST',
					dataType : 'JSON',
					data : new FormData(this),
					processData: false,
					contentType: false,
					beforeSend : function(){
						$('#dam-modal').modal('hide');
						$('#modal-wait').modal('show');
					},
					success : function(data){
						$('#modal-wait').modal('hide');
						if(data[0]){
							window.location.href = '<?php bloginfo('url'); ?>/backend?fn=dam&success=1';
						}
						else{
							$('#formerror').text(data[1]).css('color','#ea4444');
						}
					}
				})
	})
	
	$('.delDam').click(function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$('#confirm-delete').modal('show');
		$('#confirm-delete-btn').click(function(){
			window.location = url;
		})
	})
	
	$('#searchDamLevel').click(function(){
		window.location.href = '<?php bloginfo('url'); ?>/backend?fn=dam&subfn=level&d='+$('#sel_dam_val').val();
	})
	
	$('#sel_dam').change(function(){ 
				$('#sel_dam_val').val($(this).val());
				 var split_date = $(this).val().split('-');
				 var show_date = split_date[2]+'/'+split_date[1]+'/'+(parseInt(split_date[0])+543);
				 $(this).val(show_date);
	})
	
	$('#usage_period_show').change(function(){ 
				$('#usage_period').val($(this).val());
				 var split_date = $(this).val().split('-');
				 var show_date = split_date[2]+'/'+split_date[1]+'/'+(parseInt(split_date[0])+543);
				 $(this).val(show_date);
	})

	
	$('#addDamLevel').click(function(){
		$('#damLevel-modal').modal('show');
	})
	
	$('.editDamLevel').click(function(e){
		e.preventDefault();
		$.ajax({
			url : $(this).attr('href'),
			type : 'GET',
			dataType : 'JSON',
			beforeSend : function(){
						$('#modal-wait').modal('show');
					},
			success : function(data){
				$('#modal-wait').modal('hide');
				if(data[0]){
					$('#level_id').val(data[1].level_id);
					$('#dam_id').val(data[1].dam_id).trigger("change");
					$('#all_level').val(data[1].all_level);
					$('#usage_level').val(data[1].usage_level);
					$('#all_level2').val(data[1].all_level2);
					$('#usage_level2').val(data[1].usage_level2);
					$('#usage_period').val(data[1].usage_period);
					$('#water_in').val(data[1].water_in);
					$('#water_out').val(data[1].water_out);
					if(data[1].usage_period != '0000-00-00'){
						var split_date = data[1].usage_period.split('-');
						var show_date = split_date[2]+'/'+split_date[1]+'/'+(parseInt(split_date[0])+543);
					}
					$('#usage_period_show').val(show_date);
					$('#damLevel-modal').modal('show');
				}
			}
		});
	})
	
	$('.delDamLevel').click(function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$('#confirm-delete').modal('show');
		$('#confirm-delete-btn').click(function(){
			window.location = url;
		})
	})
	
	$('#damLevel-form').submit(function(e){
				e.preventDefault();
				$.ajax({
					url : $(this).attr('action'),
					type : 'POST',
					dataType : 'JSON',
					data : new FormData(this),
					processData: false,
					contentType: false,
					beforeSend : function(){
						$('#damLevel-modal').modal('hide');
						$('#modal-wait').modal('show');
					},
					success : function(data){
						$('#modal-wait').modal('hide');
						if(data[0]){
							window.location.href = '<?php bloginfo('url'); ?>/backend?fn=dam&subfn=level&d=<?php echo $damSearchID?>&success=1';
						}
						else{
							$('#formerror').text(data[1]).css('color','#ea4444');
						}
					}
				})
	})
})
</script>