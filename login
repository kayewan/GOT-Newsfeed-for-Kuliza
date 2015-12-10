<?php

  $m = new MongoClient();
        $db = $m->selectDB("newsfeed");
        $collection = $db->selectCollection("user_mst");
	$uid;
	if(isset($_POST['btn_login']))
	{
		
		$uname= $_POST['txt_uname'];
		$pwd=$_POST['txt_pwd'];
		$cursor=$collection->find(array("u_name" => $uname), array("u_pwd" => $pwd));
			$cnt=$cursor->count();
			if($cnt>0){
			
			$cursor1=$collection->find(array("u_name"=>$uname));
			foreach($cursor1 as $obj)
			{
				$uid= $obj['_id'];	
				
			}
		    header("Location: Home1.php?uid=$uid"); 
			
			}else
			echo "Failure";
			
	}
	
		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Good Old Times Newsfeed</title>


<link rel="stylesheet" href="styles/layout.css" type="text/css">

</head>

<body>
<form id="form1" name="form1" method="post" >
  <table width="100%"  border="none">
    <tr>
      <td height="158" background="images/header.png" >&nbsp;</td>
    </tr>
    <tr><td>
  <table width="200"   align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="txt_login"></label>
      <input type="text" name="txt_uname" id="txt_uname" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Password</td>
      <td align="center"><label for="txt_pwd"></label>
      <input type="password" name="txt_pwd" id="txt_pwd" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="btn_login" id="btn_login" value="Login" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table></td></tr></table>
  <div align="center"></div>
</form>
</body>
</html>
