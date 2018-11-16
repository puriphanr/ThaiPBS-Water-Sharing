<?php
add_action( 'wp_logout', 'auto_redirect_external_after_logout');
function auto_redirect_external_after_logout(){
  wp_redirect( home_url());
  exit();
}

function getPost($post_type,$field = array(),$order = 'asc',$tag_id = '',$meta_query = array()){
		$args = array( 
						'post_type' => $post_type, 
						'order' => $order,
						'meta_query' => $meta_query

					);
		if(!empty($tag_id)){
			$args['p'] = $tag_id;
		}
		
		$loop = new WP_Query( $args );
		$i = 0;
		$result = array();
		while ( $loop->have_posts() ) : $loop->the_post();
			foreach($field as $key=>$row){
				$result[$i]['id'] = get_the_ID();
				$result[$i]['date'] = get_the_date();
				if($row == 'title'){
					$result[$i][$row] = get_the_title();
				}
				elseif($row == 'desc'){
					$result[$i][$row] = get_the_content();
				}
				else{
					$result[$i][$row] = get_field($row);
				}
			}
			$i++;
		endwhile;
		return $result;
}

function moretext($message,$length = 200){
		
		if(mb_strlen($message) > $length){
			return mb_substr($message, 0, $length). "..." ;
		}
		else{
			return $message;
		}
}
function format_date($date,$delimiter= ' '){
	$month_th = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$subday = substr($date,0,2);
	$submonth = (int) substr($date,3,2);
	$subyear =  substr(substr($date,6,4)+543,2,2);
	echo $subday.$delimiter.$month_th[$submonth-1].$subyear;
}


function my_update_attachment($f,$pid,$t='',$c='') {
  wp_update_attachment_metadata( $pid, $f );
  if( !empty( $_FILES[$f]['name'] )) { //New upload
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
 include( ABSPATH . 'wp-admin/includes/image.php' );
    // $override['action'] = 'editpost';
    $override['test_form'] = false;
    $file = wp_handle_upload( $_FILES[$f], $override );
 
    if ( isset( $file['error'] )) {
      return new WP_Error( 'upload_error', $file['error'] );
    }
 
    $file_type = wp_check_filetype($_FILES[$f]['name'], array(
      'jpg|jpeg' => 'image/jpeg',
      'gif' => 'image/gif',
      'png' => 'image/png',
    ));
    if ($file_type['type']) {
      $name_parts = pathinfo( $file['file'] );
      $name = $file['filename'];
      $type = $file['type'];
      $title = $t ? $t : $name;
      $content = $c;
 
      $attachment = array(
        'post_title' => $title,
        'post_type' => 'attachment',
        'post_content' => $content,
        'post_parent' => $pid,
        'post_mime_type' => $type,
        'guid' => $file['url'],
      );
 
      foreach( get_intermediate_image_sizes() as $s ) {
        $sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => true );
        $sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
        $sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
        $sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
      }
 
      $sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );
 
      foreach( $sizes as $size => $size_data ) {
        $resized = image_make_intermediate_size( $file['file'], $size_data['width'], $size_data['height'], $size_data['crop'] );
        if ( $resized )
          $metadata['sizes'][$size] = $resized;
      }
 
      $attach_id = wp_insert_attachment( $attachment, $file['file'] /*, $pid - for post_thumbnails*/);
 
      if ( !is_wp_error( $attach_id )) {
        $attach_meta = wp_generate_attachment_metadata( $attach_id, $file['file'] );
        wp_update_attachment_metadata( $attach_id, $attach_meta );
      }
   
   return array(
  'pid' =>$pid,
  'url' =>$file['url'],
  'file'=>$file,
  'attach_id'=>$attach_id
   );
    }
  }
}

function getJson($url){
	$json = file_get_contents($url);
	$getData = json_decode($json,true);
	return $getData['data'];
}

function prepare_data($data){
		$result_array = array();
        $excepted = array("id","step");
		foreach($data as $key=>$row){
			if(!in_array($key,$excepted)){
				$result_array[$key] = $row;
			}
		}
		return $result_array;
}

function db_result($result){
	   sleep(1);
		if($result){
            $callback[] = true;
		}
		else{
            $callback[] = false;
            $callback[] = "ไม่สามารถอัพเดทข้อมูลในฐานข้อมูลได้ !";
		}
        echo json_encode($callback);
}

function map_damColor($val){
	$colorArray = array(
						array('blue','#0090ec'),
						array('green','#5cb85c'),
						array('yellow','#F9A433'),
						array('red','#f4274c')
					   );

						if($val > 81){
							return $colorArray[0];
						}
						elseif($val > 50){
							return $colorArray[1];
						}
						elseif($val > 30){
							return $colorArray[2];
						}
						else{
							return $colorArray[3];
						}		
}

function dateth($strDate,$longMonth = false,$longYear = false){
		if($strDate <> '0000-00-00'){
			$convertYear = date("Y",strtotime($strDate))+543;
			if($longYear){
				$strYear = $convertYear;
			}
			else{
				$strYear = substr($convertYear,2,4);
			}
			
			$convertMonth = date("n",strtotime($strDate));
			$strMonthCutShort = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			$strMonthCutLong = array("","มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			if($longMonth){
				$strMonth = $strMonthCutLong[$convertMonth];
			}
			else{
				$strMonth = $strMonthCutShort[$convertMonth];
			}
			
			$strDay= date("j",strtotime($strDate));
			return "$strDay $strMonth $strYear";
		}
		else{
			return '-';
		}
}
function do_curl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);
	return json_decode($result, true);
}
function fbPhoto($id,$limit = 100,$next='',$prev=''){
	$access_token 	= '1444762879177941|Wc0tNcW_RVe2gJPtYibZa_CTlAQ';
	$albumID		= $id;
	
	$getAlbumUrl	= 'https://graph.facebook.com/'.$albumID.'/photos?limit='.$limit.'&access_token='.$access_token.'&after='.$next.'&before='.$prev;
	$AlbumObj		= do_curl($getAlbumUrl);
	
	$photoObj = array();
	foreach($AlbumObj['data'] as $key=>$row){
		$photoObj[$key]['source'] = $row['images'][0]['source'];
		$photoObj[$key]['thumb'] = $row['images'][2]['source'];
		$photoObj[$key]['title'] = $row['name'];
	}

	$photoObj['next']['title'] = $AlbumObj['paging']['next'];
	$photoObj['next']['soure']=1;
	$photoObj['prev']['title'] = $AlbumObj['paging']['previous'];
	$photoObj['prev']['soure']=1;

	return array_reverse($photoObj);

}
?>