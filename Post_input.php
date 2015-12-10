<?php

//$uid="56667e3e81af238075000029";

		$content=$_REQUEST['ta_content'];

function post_input($content,$uid)
{
		$m = new MongoClient();
        $db = $m->selectDB("newsfeed");
        $collection = $db->selectCollection("user_mst");
		$cursor=$collection->find(array("_id" => $uid));
			
			$cnt=$cursor->count();
			if($cnt>0) {
     	
				foreach($cursor as $obj)
				{
					$uname=$obj['u_name'];
					$ulogo=$obj['logo_id'];
					
				}echo $cnt;
				
		}
		
		$collection = $db->selectCollection("status_mst");
		//$uid="2.0";
		$date = date("Y-m-d H:i:s");
	
	if(isset($_POST['btn_post']))
	{
		$document=array(
		
		"content"=>$content,
		"like_cnt"=>0,
		"like_by"=>array(""),
		"comment_cnt"=>0,
		"comment_by"=>array(""),
		"uploaded_by"=>$uid,
		"time"=> $date
		
		);	
		$collection->insert($document);
   echo "Status Updated successfully";
	}
}


post_input($content,$uid);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css">
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form2" id="form1">
  <table width="200"   align="center" class="post_input">
    <tr>
      <td><input type="image" name="img_logo" id="img_logo" src="<?php if(isset($ulogo)) echo $ulogo; else echo "Logos/default.jpg"; ?>" /></td>
      <td><label for="ta_content"></label>
      <textarea name="ta_content" id="ta_content" cols="45" rows="5">Whats on your mind ???</textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>

</td>
      <td align="right"><input type="submit" name="btn_post" id="btn_post" value="Post" /></td>
      <td>&nbsp;</td>
    </tr>
    
   
  </table>
</form>
</body>
</html>
