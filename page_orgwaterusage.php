<?php
/*
Template name: orgwaterusage
*/
?> 
<?php get_header();?>

<section class="content-detail">
<h2>แจ้งข้อมูลการใช้น้ำ <?php if(is_user_logged_in()){ ?><div class="pull-right"><a href="<?php echo wp_logout_url(); ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></div><?php } ?></h2>

<?php if(!is_user_logged_in()){ ?>
<div class="row form-wrap">
      <div class="col-md-12">
        <form id="login-form" class="form-signin" method="POST" action="<?php bloginfo('url'); ?>/submit?fn=login">
          <h2 class="form-signin-heading text-center">ระบบบันทึกข้อมูลปริมาณการใช้น้ำ</h2>
          <p class="text-center showerror">กรุณาระบุชื่อผู้ใช้และรหัสผ่านของท่าน</p>
		  <label for="inputPassword" class="sr-only">ชื่อผู้ใช้</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="ชื่อผู้ใช้" required>
          <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" required>
		  <div class="checkbox">
          <label>
            <input type="checkbox" name="rememberme" value="1"> จดจำข้อมูลของฉัน
          </label>
        </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">ลงชื่อเข้าใช้</button>
        </form>
      </div>
    </div>
<?php } else {
$current_user 	= wp_get_current_user();
$getOrg 		= get_field('org', 'user_'.$current_user->data->ID);
$orgInfo 		= getPost('org',array('title','logo'),'desc',$getOrg->ID);
$metaQuery =  array(
								array(
									'key' => 'parent', 
									'value' => '',
									'compare' => '='
								)
				);
$getUsageRange 	= getPost('usage_water_date',array('title'),'asc','',$metaQuery);
	?>
<div class="form-content">
<?php if(!empty($_GET['s'])){ ?>
	<div class="alert alert-success">
  <strong>บันทึกข้อมูลเรียบร้อยแล้ว</strong>
</div>
<?php } ?>
	<div class="form-group">
		<label class="col-lg-2">องค์กร</label>
		<div class="col-lg-10">
			<img class="thumbnail" src="<?php echo $orgInfo[0]['logo']['url']?>" />
			<span class="org_name"><?php echo $orgInfo[0]['title']?></span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-12">ปริมาณการใช้น้ำ</label>
		<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" width="50%">ช่วงเวลา</th>
					<th class="text-center" width="15%">เลขมิเตอร์ (ลบ.ม.)</th>
					<th class="text-center" width="15%">ปริมาณการใช้ (ลบ.ม.)</th>
					<th class="text-center" width="10%">ภาพมิเตอร์น้ำ</th>
					<th class="text-center" width="10%">วันที่บันทึก</th>
				  </tr>
				</thead>
				<tbody>
				<?php	
				foreach($getUsageRange as $key=>$row){
				?>
				  <tr>
					<td colspan="5" style="background:#EEE;"><?php echo $row['ID']?> <strong><?php echo $row['title']?></strong></td>
				  </tr>
				  <?php 
					$monthQuery =  array(
										array(
											'key' => 'parent', 
											'value' => $row['id'],
											'compare' => '='
										)
									);
					$getMonth 	= getPost('usage_water_date',array('title','start_date','end_date','block','ordering'),'asc','',$monthQuery);
					foreach($getMonth as $skey=>$srow){
						$orgQuery =  array(
											'relation' => 'AND',
											array(
												'key' => 'org', 
												'value' => $getOrg->ID,
												'compare' => '='
											),
											array(
												'key' => 'week', 
												'value' => $srow['id'],
												'compare' => '='
											)
										);
						$getOrgWater = getPost('org_water',array('org','week','usage_water','image'),'asc','',$orgQuery);
				  ?>
				  <tr>
					 <td id="weekTitle<?php echo $srow['id']?>"><?php echo $srow['title']?> (<?php echo format_date($srow['start_date'])?> - <?php echo format_date($srow['end_date'])?>)</td>
					 
					 <?php if(!empty($getOrgWater)){ ?>
						<td class="text-right"><?php echo number_format($getOrgWater[0]['usage_water'])?></td>
						<td class="text-right">
						<?php 
						if($srow['ordering'] > 1){
									 $weekQuery =  array(
														array(
															'key' => 'ordering', 
															'value' => $srow['ordering'] - 1,
															'compare' => '='
														)
													);
								$getWeek  = getPost('usage_water_date',array('ordering'),'asc','',$weekQuery);
										$previousQuery =  array(
													'relation' => 'AND',
													array(
														'key' => 'org', 
														'value' => $getOrg->ID,
														'compare' => '='
													),
													array(
														'key' => 'week', 
														'value' => $getWeek[0]['id'],
														'compare' => '='
													)
												);
								$getPrevious = getPost('org_water',array('usage_water'),'asc','',$previousQuery);
								echo number_format($getOrgWater[0]['usage_water'] - $getPrevious[0]['usage_water']);
						 }else{
							echo "-";
						}
						?>
						</td>
						<td class="text-center"><a href="<?php echo $getOrgWater[0]['image']['url']?>" class="colorbox btn btn-xs btn-default"><i class="fa fa-file-image-o"></i> รูปภาพ</a></td>
						<td class="text-center"><?php echo format_date(date('d/m/Y',strtotime($getOrgWater[0]['date'])))?></td>
					 <?php } else { ?>
						<td colspan="4"  class="text-center" >
							<button type="button" class="btn btn-primary" onclick="updateWater('<?php echo $srow['id']?>');" <?php echo $srow['block']==1 ? 'disabled="disabled"' : NULL ?>><i class="fa fa-pencil-square-o"></i> บันทึกข้อมูล</button>
						</td>
					 <?php } ?>
					
				  </tr>
				  <?php } ?>
				<?php } ?>
				</tbody>
			  </table>
		</div>
	</div>
	
	</div>

<?php } ?>
</section>

<!-- Modal Form -->
<div class="modal fade" id="water-form" tabindex="-1" role="dialog" 
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
						บันทึกข้อมูลการใช้น้ำ
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
				<div id="formerror"></div>
                <form class="form-horizontal" role="form" id="ajax-form"  action="<?php bloginfo('url'); ?>/submit?fn=updateUsage" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="org_id" value="<?php echo $getOrg->ID ?>" />
					<input type="hidden" name="week_id" id="week_id" value="" />
					<div class="form-group">
						<label  class="col-sm-2 control-label"
								  for="inputEmail3">ประจำ</label>
						<div class="col-sm-10">
							<span id="weekInfo"></span>
						</div>
					</div>
				  
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">เลขมิเตอร์ (ลบ.ม.)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="usage_water" name="usage_water_value"/>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">ภาพมิเตอร์น้ำ</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" 
                        id="image" name="image_file"/>
                    </div>
                  </div>
                
                </form>
                
                
                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                 
                <button type="button" onclick="$('#ajax-form').submit();" class="btn btn-primary">
							บันทึก
                </button>
				<button type="button" class="btn btn-default"
                        data-dismiss="modal">
								ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
<script type="text/javascript">
function updateWater(weekID){
				$('#week_id').val(weekID);
				$('#weekInfo').text($('#weekTitle'+weekID).text());
				$('#water-form').modal('show');
		}
		jQuery(document).ready(function ($) {
			 $('.datepicker').datepicker({language:'th-th',format:'dd/mm/yyyy'});
			 $('a.colorbox').colorbox({
				 maxWidth : 500,
				 overlayClose : false
			 });

				 $('#water-form').on('hidden.bs.modal', function(){
					$(this).find('form')[0].reset();
					$('#formerror').text('');
				});

			 $('#ajax-form').submit(function(e){
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
							window.location.href = '<?php bloginfo('url'); ?>/orgwaterusage?s=1';
						}
						else{
							$('#formerror').text(data[1]).css('color','#ea4444');
						}
					}
				})
			 })
			 
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
							window.location.href = '<?php bloginfo('url'); ?>/orgwaterusage';
						}
						else{
							$('#login-form .showerror').html('<div class="notice error"><p>'+data[1]+'</p></div>').css('color','#ea4444');
						}
					}
				})
			})
			
		 });
</script>