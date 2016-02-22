<?php
require_once('config.php');
//////////////////////////////////////////////////////////////
function select_all($tbl)
{
  $conn = db_connect();
  $sql = "SELECT * from $tbl";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    //create an array
    $result_array = array();
    for ($count = 0; $row = $result->fetch_assoc(); $count++)
    {
      $result_array[$count] = $row;
    }
    return $result_array;
  } else {
    return 0;
  }
  $conn->close();
}
//=============================================================
function selectById($tbl,$id)
{
  $conn = db_connect();
  $sql = "SELECT * from $tbl WHERE id = $id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    //create an array
    $result_array = array();
    for ($count = 0; $row = $result->fetch_assoc(); $count++)
    {
      $result_array[$count] = $row;
    }
    return $result_array;
  } else {
    return 0;
  }
  $conn->close();
}

function delete_user( $userId)
{
  $conn = db_connect();
  $sql = "DELETE from tblUsers WHERE  id='$userId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}

/////////////////////////////////////////////////////////////
function register_user($username,$userEmail,$userPassword,$userRole){
  $conn = db_connect();
  $sql = "INSERT INTO  `test`.`tblusers` (
`id` ,
`userName` ,
`userEmail` ,
`userPassword` ,
`userPic` ,
`userSignDate` ,
`userLastLoginDate` ,
`RoleId`)
VALUES (NULL,'$username','$userEmail','$userPassword',NULL ,NULL ,NULL ,'$userRole')";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}
/////////////////////////////////////////////////////////////
function registerNewRole($roleTitle){
  $conn = db_connect();
  $sql = "INSERT INTO `tblroles` (`id` ,`roleTitle`)
VALUES (NULL,'$roleTitle')";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}
//////////////////////////////////////////////////////////////

function DeleteRole($roleId)
{
  $conn = db_connect();
  $sql = "DELETE from tblroles WHERE  id='$roleId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}

/////////////////////////////////////////////////////////////
function select_RoleTitle_by_RoleId($roleId)
{
  $conn = db_connect();
  $sql = "SELECT roleTitle from tblroles WHERE  id = '$roleId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    //create an array
    $result_array = array();
    for ($count = 0; $row = $result->fetch_assoc(); $count++) {
      $result_array[$count] = $row;
    }
    return $result_array;
  }
}

/**
 * update user detail function
 */
function UpdateUserDetails($userId, $username, $userEmail,$userRegDate,$userLastLoginDate,$userRole) {
  $conn = db_connect();
  $sql = "UPDATE `tblusers` SET
 `userName`= '$username' ,
 `userEmail`= '$userEmail' ,
`userSignDate`= '$userRegDate' ,
`userLastLoginDate`= '$userLastLoginDate',
`RoleId`= $userRole WHERE id = '$userId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}

/**
 * check that data is unique;
 */
function isUnigue($title,$tbl){
  $conn = db_connect();
  $sql = "SELECT roleTitle
          FROM  `$tbl`
          WHERE roleTitle =  '$title'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    return false;
  }else
    return true;
}
/////////////////////////////////////////////////////////////
function update_userName_userEmail($userId,$username,$userEmail){
  $conn = db_connect();
  $sql = "UPDATE `tblusers` SET
         `userName`='$username',`userEmail`='$userEmail' WHERE id ='$userId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}
/////////////////////////////////////////////////////////////
function update_user_pic($userId,$userPic)
{
  $conn = db_connect();
  $sql = "UPDATE `tblusers` SET
         `userPic`='$userPic' WHERE id ='$userId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}
/////////////////////////////////////////////////////////////
function updateUserPassword($userId,$newPassword){
  $conn = db_connect();
  $sql = "UPDATE `tblusers` SET
         `userPassword`='$newPassword' WHERE id ='$userId'";
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
  $conn->close();
}

/////////////////////////////////////////////////////////////

function get_category()
{
	$conn = db_connect();
	$result  = $conn->query("select * from category");
	$cats = mysql_fetch_assoc($result);
	/*$cats = array();
	for ($count = 0; $row = $result->fetch_row();$count++)
	{
		$cats[$count] = $row[0];
	}*/
	return $cats;
}

//////////////////////////////////////////////////////////////
function filter_report_buyer($user_name)
{
  //extract from the database all the URLs this user has stored
  $conn = db_connect();
  $result = $conn->query( "select  Buyer,Name,Price,Categori,Date,Description
                          from shopping
                          where buyer = '$user_name' ");
  if (!$result)
    return false; 

  //create an array of the URLs 
  $url_array = array();
  for ($count = 0; $row = $result->fetch_assoc(); $count++) 
  {
    $url_array[$count] = $row;
  }  
  return $url_array;
}
////////////////////////////////////////////////////////////
function filter_report_date($date1,$date2)
{
  //extract from the database all the URLs this user has stored
  $conn = db_connect();
  $result = $conn->query( "select  Buyer,Name,Price,Categori,Date,Description
                          from shopping
                          where date BETWEEN '$date1' and '$date2' ");
  if (!$result)
    return false; 

  //create an array of the URLs 
  $url_array = array();
  for ($count = 0; $row = $result->fetch_assoc(); $count++) 
  {
    $url_array[$count] = $row;
  }  
  return $url_array;
}
 //========================================================= 
function add_shopping($buy_name,$buy_type,$buy_price,$buy_date,$buy_note)
{
	mysql_query('set character set utf8;'); 
  // Add new shopping to the database

  //echo "Attempting to add ".htmlspecialchars($new_url).'<br />';
  $valid_user = $_SESSION['valid_user'];
  
  $conn = db_connect();

  // check not a repeat shoping
  
  $result = $conn->query("select * from shopping
                         where Buyer='$valid_user' 
                         and Name ='$buy_name',
						 and Categori ='$buy_type',
						 and Price ='$buy_price',
						 and Date ='$buy_date',
						 and Description ='$buy_note'");
  if ($result && ($result->num_rows>0))
    throw new Exception('این خرید قبلا در سیستم ثبت شده است.');
//('buyer_name','buy_name','buy_type','buy_price','buy_date','buy_note')
  // insert the new shopping
 //increse id;
 $result = $conn->query("select MAX(id) from shopping");
	//create an array 
  $id_array = array();
  for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $id_array[$count] = $row[0];
  } 
  $id = $id_array[0] +1;
  $result = $conn->query( "INSERT INTO shopping 
  						  values
                          ('$id','$valid_user','$buy_name','$buy_price','$buy_type','$buy_date','$buy_note')");
	
                       

 mysql_query('set character set utf8;'); 
  
	if(!$result)					  
    throw new Exception('خطا در ثبت خرید.'); 

  return true;
} 

//==================================
function recommend_urls($valid_user, $popularity = 1)
{
  // We will provide semi intelligent recomendations to people
  // If they have an URL in common with other users, they may like
  // other URLs that these people like 
  $conn = db_connect();

  // find other matching users
  // with an url the same as you
  // as a simple way of excluding people's private pages, and 
  // increasing the chance of recommending appealing URLs, we
  // specify a minimum popularity level
  // if $popularity = 1, then more than one person must have 
  // an URL before we will recomend it
  $query = "select bm_URL
	    from shopping
	    where username in
	   	 (select distinct(b2.username)
                  from shopping b1, shopping b2
		  where b1.username='$valid_user'
                  and b1.username != b2.username
                  and b1.bm_URL = b2.bm_URL)
	    and bm_URL not in
 				  (select bm_URL
				   from shopping
				   where username='$valid_user')
            group by bm_url
            having count(bm_url)>$popularity";
 
  if (!($result = $conn->query($query)))
     throw new Exception('Could not find any shoppings to recommend.');
  if ($result->num_rows==0)
     throw new Exception('Could not find any shoppings to recommend.');

  $urls = array();
  // build an array of the relevant urls
  for ($count=0; $row = $result->fetch_object(); $count++)
  {
     $urls[$count] = $row->bm_URL; 
  }
                              
  return $urls; 
}
///////////////////////////////////////////
function change_pic($user_pic)
{
	
 
  $username = $_SESSION['valid_user'];
  
  $conn = db_connect();

 $new_pic = $_POST['user_pic'];
 
  $result = $conn->query( "UPDATE `user` SET pic = '$new_pic' WHERE username = '$username'");
	
  
	if(!$result)					  
    throw new Exception('خطا در تغییر عکس کاربری.'); 

  return true;

	
}
///////////////////////////////////////////////
function select_admin($username)
{
$conn = db_connect();
  $result = $conn->query( "SELECT LEVEL from `user`
									WHERE username = '$username' ");
  if (!$result)
    return false; 

  //create an array 
  $level_array = array();
  for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $level_array[$count] = $row[0];
  }  
  if($level_array[0] == 1)
  {
  return true;		  
}
else 
return false;
}
//////////////////////////////////////////////////////
function get_user_level()
{	
try{
	$conn = db_connect();
	$resu = $conn->query("select level from user");
	}
	catch (Exception $e)
	{	
		echo $e->getMessage();
	}
	$user_levle_array = array();
	for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $user_levle_array[$count] = $row[0];
  }  
  return $user_levle_array;
}
///////////////////////////////////////////////////////
function is_admin()
{
	try {
		
		$conn = db_connect();
		$result = $conn->query("SELECT username FROM user WHERE level = 1");
	}
		catch (Exception $e)
			{
				echo $e->getMessage();
			}

	$is_addmin_array = array();
	for($count = 0; $row = $result->fetch_row(); $count++)
		{
			$is_addmin_array[$count] = $row[0];
			
		}
		return $is_addmin_array[0];
}			
///////////////////////////////////////////////////
function select_user_pic($username)
{
	
$conn = db_connect();
  $result = $conn->query( "select pic from `images` WHERE name = '$username' ");
  if (!$result)
    return false; 

  //create an array of the URLs 
  $pic_array = array();
  for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $pic_array[$count] = $row[0];
  }  
  return $pic_array;
}
///////////////////////////////////////////////////
function select_user_email($username)
{
	
$conn = db_connect();
  $result = $conn->query( "select email from `user` WHERE username = '$username' ");
  if (!$result)
    return false; 

  //create an array of the URLs 
  $email_array = array();
  for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $email_array[$count] = $row[0];
  }  
  return $email_array;
}
////////////////////////////////////////////////////
function select_category()
{
	mysql_query('set character set utf8;'); 
	$conn = db_connect();
  $result = $conn->query( "select * from category ");
  if (!$result)
    return false; 

  //create an array 
  $cat_array = array();
  for ($count = 0; $row = $result->fetch_row(); $count++) 
  {
    $cat_array[$count] = $row[0];
  }  
  return $cat_array;
}
////////////////////////////////
function row_count($table)
{


$link = mysql_connect("localhost", "root", "");
mysql_select_db("opa", $link);

$result = mysql_query("SELECT * FROM $table", $link);
$num_rows = mysql_num_rows($result);

return $num_rows ;


}
//////////////////////////////
function add_category($cat)
{
		mysql_query('set character set utf8;'); 
  // Add new shopping to the database

  //echo "Attempting to add ".htmlspecialchars($new_url).'<br />';
  $valid_user = $_SESSION['valid_user'];
  
  $conn = db_connect();

  // check not a repeat 
  $result = $conn->query("select * from category
                         where where cat = '$cat'");
  if ($result && ($result->num_rows>0))
    throw new Exception('این دسته بندی قبلا ثبت شده است.');
//insert category
 
  $result = $conn->query( "INSERT INTO category
  						  values
                          ('$cat')");
	
                       

 
  
	if(!$result)					  
    throw new Exception('خطا در ثبت دسته بندی، این دسته بندی قبلا ثبت شده است.'); 
	?>
    

<?php
 //display_add_category_form();
?>

<?php
  return true;
}
?>
<?php
/////////////////////////////////////////////

//////////////////////////////////////////
function delete_category( $url)
{
  // delete one category
  $conn = db_connect();
  // delete the shopping
  if (!$conn->query( "delete from category 
                       where name='$url'"))
    throw new Exception('خطا در حذف دسته بندی خرید');
  return true;  
}
?>