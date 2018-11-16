<?php
/*
Template name: complaint
*/
?> 
<?php get_header();?>
<?php
 $province_rows = $wpdb->get_results( "SELECT PROVINCE_ID,PROVINCE_NAME FROM province" ); 
?>
<section class="content-detail">
<h2>แจ้งร้องเรียนปัญหาภัยแล้ง </h2>
<form class="form-horizontal" method="post" action="<?php bloginfo('url'); ?>/submit?fn=updateComplaint">
<input type="hidden" name="id" value="" />
<div class="form-content">
<?php if($_GET['success']){ ?>
<div class="alert alert-success">
  <strong>ทีมงานได้รับข้อมูลการแจ้งปัญหาของท่านเรียบร้อยแล้ว และจะดำเนินการประสานงานให้เร็วที่สุด</strong>
</div>
<?php } ?>
<fieldset>
	 <legend>ข้อมูลส่วนตัว :</legend>
	<div class="form-group">
		<label class="col-lg-2">ชื่อ-นามสกุล</label>
		<div class="col-lg-10">
		<input type="text" name="fullname" value="" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2">อีเมล</label>
		<div class="col-lg-10">
		<input type="text" name="email" value="" class="form-control" placeholder="example@mail.com" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2">เบอร์โทรศัพท์</label>
		<div class="col-lg-4">
		<input type="text" name="phone" value="" class="form-control" placeholder="08XXXXXXXX" />
		</div>
	</div>
</fieldset>
<fieldset>
	 <legend>ที่อยู่ผู้แจ้ง :</legend>
	 <div class="form-group">
		<label class="col-lg-2">บ้านเลขที่</label>
		<div class="col-lg-2">
		<input type="text" name="houseno" value="" class="form-control" />
		</div>
		<label class="col-lg-1">หมู่ที่</label>
		<div class="col-lg-1">
		<input type="text" name="villegeno" value="" class="form-control" />
		</div>
		<label class="col-lg-1">อาคาร</label>
		<div class="col-lg-5">
		<input type="text" name="building" value="" class="form-control" />
		</div>
	</div>
	 <div class="form-group">
		<label class="col-lg-2">ซอย</label>
		<div class="col-lg-4">
			<input type="text" name="soi" value="" class="form-control" />
		</div>
		<label class="col-lg-1">ถนน</label>
		<div class="col-lg-5">
			<input type="text" name="road" value="" class="form-control" />
		</div>
	 
	 </div>
	  <div class="form-group">
			<label class="col-lg-2">จังหวัด</label>
			<div class="col-lg-4">
				<select name="province_id" class="form-control" id="comp_province">
					<option value="" selected="selected">-----เลือก-----</option>
					<?php foreach($province_rows as $key=>$row){ ?>
						<option value="<?php echo $row->PROVINCE_ID?>"><?php echo $row->PROVINCE_NAME?></option>
					<?php } ?>
				</select>
			</div>
	</div>
	 <div class="form-group">
			<label class="col-lg-2">อำเภอ/เขต</label>
			<div class="col-lg-4">
				<select name="amphur_id" class="form-control" id="comp_amphur">
					<option value="" selected="selected">-----เลือก-----</option>
				
				</select>
			</div>
	</div>
	 <div class="form-group">
			<label class="col-lg-2">ตำบล/แขวง</label>
			<div class="col-lg-4">
				<select name="district_id" class="form-control" id="comp_district">
					<option value="" selected="selected">-----เลือก-----</option>
				
				</select>
			</div>
	  </div>
	   <div class="form-group">
			<label class="col-lg-2">รหัสไปรษณีย์</label>
			<div class="col-lg-3">
				<input type="hidden" id="comp_zipcode_id" name="zipcode_id" />
				<input type="text" id="comp_zipcode" name="zipcode_name" value="" class="form-control" readonly="readonly" />
			</div>
	  </div>
</fieldset>
<fieldset>
	 <legend>เรื่องร้องเรียน  :</legend>
	 <div class="form-group">
		<label class="col-lg-2">เรื่อง</label>
		<div class="col-lg-10">
				<input type="text" name="comp_title" class="form-control" />
		</div>
	 </div>
	 <div class="form-group">
		<label class="col-lg-12">รายละเอียด</label>
		<div class="col-lg-12">
				<textarea name="comp_desc" rows="15" class="form-control"></textarea>
		</div>
	 </div>
</fieldset>	
<div class="form-button">
	<button type="submit" class="btn btn-lg btn-primary">แจ้งข้อมูล</button>
	<button type="reset" class="btn btn-lg btn-default">ยกเลิก</button>
</div>
</div>
</form>
</section>

<?php get_footer();?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	$('#comp_province').change(function(){
		$.ajax({
			url : '<?php bloginfo('url'); ?>/submit?fn=getAmphurOption',
			type : 'GET',
			data : 'pv='+$(this).val(),
			dataType : 'JSON',
			success : function(data){
				if(data[0]){
					$('#comp_amphur').find('option:not(:first)').remove();
					$('#comp_amphur').append(data[1]);
					$('#comp_district,#comp_zipcode').val('');
				}
			}
		})
	})
	$(document).on('change','#comp_amphur',function(){
		$.ajax({
			url : '<?php bloginfo('url'); ?>/submit?fn=getDistrictOption',
			type : 'GET',
			data : 'ap='+$(this).val(),
			dataType : 'JSON',
			success : function(data){
				if(data[0]){
					$('#comp_district').find('option:not(:first)').remove();
					$('#comp_district').append(data[1]);
					$('#comp_zipcode').val('');
				}
			}
		})
	})
	$(document).on('change','#comp_district',function(){
		$.ajax({
			url : '<?php bloginfo('url'); ?>/submit?fn=getZipcode',
			type : 'GET',
			data : 'dt='+$(this).val(),
			dataType : 'JSON',
			success : function(data){
				if(data[0]){
					$('#comp_zipcode_id').val(data[1]);
					$('#comp_zipcode').val(data[2]);
				}
			}
		})
	})
	 $('form').submit(function(e){
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
							window.location.href = '<?php bloginfo('url'); ?>/complaint?success=1';
						}
						else{
							$('#formerror').text(data[1]).css('color','#ea4444');
						}
					}
				})
	})
});
</script>