<?php
/*
Template name: submit
*/
?> 
<?php 
function login(){
	sleep(1);
	if(empty($_POST['email']) || empty($_POST['password'])){
		$result[] = false;
		$result[] = 'กรุณาระบุชื่อผู้ใช้หรือรหัสผ่านของท่าน';
	}
	else{
		$creds = array();
		$creds['user_login'] 	= $_POST['email'];
		$creds['user_password'] = $_POST['password'];
		$creds['remember'] = $_POST['rememberme'];
		$user = wp_signon( $creds, false );
		
		
		if (!is_wp_error($user)){
			$result[] = true;
		}
		else{
			$result[] = false;
			$result[] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
		}
	}
	
	echo json_encode($result);
}

function updateUsage(){
	if($_POST['usage_water_value'] == "" || $_FILES['image_file']['name'] == ""){
		$result[] = false;
		$result[] = 'กรุณากรอกเลขมิเตอร์และอัพโหลดภาพมิเตอร์ให้ครบถ้วน';
	}
	else{
			sleep(1);
			// Create post object
			$my_post = array(
			 'post_title' => '',
			 'post_content' => '',
			 'post_status' => 'publish',
			 'post_type' => 'org_water',
			);

			// Insert the post into the database
			$post_id = wp_insert_post( $my_post );

			// Add field value
			update_field( "field_56d55a5dc00ae", $_POST['org_id'] , $post_id );
			update_field( "field_56d7bea10b033", $_POST['week_id'] , $post_id );
			update_field( "field_56d55a71c00af", $_POST['usage_water_value'] , $post_id );
			$att = my_update_attachment('image_file',$post_id);
			update_field('field_56d55a99c00b0',$att['attach_id'],$post_id);
			$result[] = true;
	}

	echo json_encode($result);
}

function getAmphurOption(){
	
	global $wpdb;
	$amphur_rows = $wpdb->get_results( "SELECT AMPHUR_ID,AMPHUR_NAME FROM amphur WHERE PROVINCE_ID = ".$_GET['pv']); 
	
	foreach($amphur_rows as $key=>$row){
		$option .= '<option value="'.$row->AMPHUR_ID.'">'.$row->AMPHUR_NAME.'</option>';
	}
	
	$result[] = true;
	$result[] = $option;
	echo json_encode($result);
}

function getDistrictOption(){
	
	global $wpdb;
	$amphur_rows = $wpdb->get_results( "SELECT DISTRICT_ID,DISTRICT_NAME FROM district WHERE AMPHUR_ID = ".$_GET['ap']); 
	
	foreach($amphur_rows as $key=>$row){
		$option .= '<option value="'.$row->DISTRICT_ID.'">'.$row->DISTRICT_NAME.'</option>';
	}
	
	$result[] = true;
	$result[] = $option;
	echo json_encode($result);
}

function getZipcode(){
	
	global $wpdb;
	$zipcode_rows = $wpdb->get_results( "SELECT ZIPCODE_ID,ZIPCODE FROM zipcode WHERE DISTRICT_ID = ".$_GET['dt']); 
	
	$result[] = true;
	$result[] = $zipcode_rows[0]->ZIPCODE_ID;
	$result[] = $zipcode_rows[0]->ZIPCODE;
	echo json_encode($result);
}


function updateComplaint(){
	global $wpdb;
	
	$data = prepare_data($_POST);
	unset($data['zipcode_name']);
	if($_POST['id']==""){
		$data['status'] = 1;
		$data['create_time'] = date('Y-m-d H:i:s');
		$insert = $wpdb->insert('complaint',$data);
		db_result($insert);
	}
	else{
		
	}
	
}

//==========================Dam================================//
function getDam(){
	global $wpdb;
	$data = $wpdb->get_results( "SELECT * FROM dam WHERE dam_id = ".$_GET['id']); 
	$result[] = true;
	$result[] = $data[0];
	echo json_encode($result);
}

function updateDam(){
	global $wpdb;
	$wpdb->show_errors();
	$data = prepare_data($_POST);
	$data['province_id'] = implode(',',$data['province_id']);
	$data['effect_province'] = implode(',',$data['effect_province']);
	
	if($_POST['dam_id']==""){
		$data['create_time'] = date('Y-m-d H:i:s');
		$insert = $wpdb->insert('dam',$data);
		$update = $wpdb->update('dam',array('dam_code' => $wpdb->insert_id),array( 'dam_id' => $wpdb->insert_id ));
		db_result($update);
	}
	else{
		$update = $wpdb->update('dam',$data,array( 'dam_id' => $data['dam_id'] ));
		db_result($update);
	}
	
}

function removeDam(){
	global $wpdb;
	$wpdb->delete( 'dam', array( 'dam_id' => $_GET['id'] ) );
	wp_redirect( home_url('backend?fn=dam'));
}

//==========================DamLevel================================//
function getDamLevel(){
	global $wpdb;
	$data = $wpdb->get_results( "SELECT * FROM dam_level WHERE level_id = ".$_GET['id']); 
	$result[] = true;
	$result[] = $data[0];
	echo json_encode($result);
}

function getDamLevelAll(){
	global $wpdb;
	$data = $wpdb->get_results("SELECT dam_level.*,dam.*,DATEDIFF(usage_period,CURDATE()) AS usage_date 
												  FROM dam_level,dam
												  WHERE dam_level.level_id = '".$_GET['id']."' 
												  AND dam_level.dam_id = dam.dam_code
												  ");
	$result[] = true;
	$result[] = $data[0];
	echo json_encode($result);
}

function updateDamLevel(){
	global $wpdb;
	$wpdb->show_errors();
	$data = prepare_data($_POST);
	
	if($_POST['level_id']==""){
		$data['create_time'] = date('Y-m-d H:i:s');
		$insert = $wpdb->insert('dam_level',$data);
		db_result($insert);
	}
	else{
		$update = $wpdb->update('dam_level',$data,array( 'level_id' => $data['level_id'] ));
		db_result($update);
	}
	
}

function removeDamLevel(){
	global $wpdb;
	$wpdb->delete( 'dam_level', array( 'level_id' => $_GET['id'] ) );
	wp_redirect( home_url('backend?fn=dam&subfn=level&d='.$_GET['d']));
}

/*function dumpDam(){
	global $wpdb;
	$getDam 	= getPost('dam',array('title','lat','long'),'asc');
	foreach($getDam as $key=>$row){
		$data = array(
						'dam_name'=>$row['title'],
						'dam_code'=>$row['id'],
						'lat'=>$row['lat'],
						'long'=>$row['long'],
						'create_time'=>date('Y-m-d H:i:s')
					 );
		$insert = $wpdb->insert('dam',$data);
	}
}

function dumpDamLevel(){
	global $wpdb;
	$getDam 	= getPost('dam_level',array('dam','record_date','current_level','usage_level'),'asc');

	foreach($getDam as $key=>$row){
		$exdate = explode('/',$row['record_date']);
		$collect_date = $exdate[2].'-'.$exdate[1].'-'.$exdate[0];
		$data = array(
						'collect_date'=>$collect_date,
						'dam_id'=>$row['dam']->ID,
						'all_level'=>$row['current_level'],
						'usage_level'=>$row['usage_level']
					 );
		$insert = $wpdb->insert('dam_level',$data);
	}
}*/

if(!empty($_GET['fn'])){
	$_GET['fn']();
}
?>