<?php session_start();
	if(isset($_SESSION['pagesview']))
	{
		$_SESSION['pagesview'] = $_SESSION['pagesview']+ 1;
	}
	else
	{
		$_SESSION['pagesview'] = 1;
	}
//---------------page counter end-----------
	 $ip = getenv("REMOTE_ADDR");
	 
// ------------counter -----START------	 
	 $sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$counter=$rows['counter'];
// if have no counter value set counter = 1
if(empty($counter)){
$counter=1;
$sql1="INSERT INTO $tbl_name(counter) VALUES('$counter')";
$result1=mysql_query($sql1);
}
// count more value
$addcounter=$counter+1;
$sql2="update $tbl_name set counter='$addcounter'";
$result2=mysql_query($sql2);
	
// ------------counter ------END-----

	
			if (isset($_POST['ok']))
			{ //include 'db.php';
	{
		
		$roll=$_POST['roll']; 
		$year=substr($roll, 0, 4);

		$link1 = 'http://172.61.25.110/ois/StudentInformationSystem/pic'.$year.'/'.$roll.'.JPG';
		$link2 = 'http://172.61.25.110/ois/StudentInformationSystem/pic'.$year.'/'.$roll.'.jpg';
        $emp1 = 'http://172.61.25.110/ois/HumanResourceDevelopment/UploadedImages/'.$roll.'.jpg';
        $emp2 = 'http://172.61.25.110/ois/HumanResourceDevelopment/UploadedImages/'.$roll.'.JPG';        
				$file_link1 = @get_headers($link1);
                $file_link2 = @get_headers($link2);
                $file_link3 = @get_headers($emp1);
                
				if($file_link1[0] == 'HTTP/1.1 200 OK') 
					{
    					$target = $link1;
                        $posi='STUDENT';
					}
				else if($file_link2[0] == 'HTTP/1.1 200 OK') 
					{
						$target = $link2;
                        $posi='STUDENT';
					}
                else  if($file_link3[0] == 'HTTP/1.1 200 OK')
					{
						$target = $emp1;
                        $posi='EMPLOYEE';
					}
                else
                {
                    $target = $emp2;
                }
					
									
					
					
			$h= '504.21052631579';
			$w= '436.84210526316';
	
		$height = $h;
		$width = $w;
				}
	 
	 
			}
?>
<html>
<head>
<style>
h1 {
	color: #09F;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: 100;
	line-height: 10px;
}
h202 {
	color:#69F;
}
a {
	color: #666;
	font-size: 20px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	line-height: 5px;
	text-decoration:none;
}
p.head {
    background-color: #F5F5F5;
    border-bottom: 1px solid #E9E9E9;
	font-family: Arial, Helvetica, sans-serif;
    color: #343434;
    font-size: 0.8em;
    margin: 3px 0;
    padding: 3px 0;
	width:128px;
}
p.foot {
	font-size: 14px;
	font-family: Arial,Helvetica,sans-serif;
	line-height: 5px;
}
div.ois {
	height: 560px;
	width: 800px;
}
div.info {
	height: 560px;
	width: 564px;
	margin-right: 20px;
	float: right;
}
#footer {
	font-size: 16px;
	color: #03F;
	font-family: Arial, Helvetica, sans-serif;
	padding: 0 0 0 0;
}
div.frame {
	background-color:transparent;
   height:504px;
  margin-top:74px;
  position:absolute;
  right: 300px;
  top:37px;
  width:468px;
}

div.img.pose {
	height:504px;
  margin-top:74px;
  position:absolute;
  right: 300px;
  top:37px;
  width:468px;
}

#conterner {
	height: 570px;
	 margin-top: 0px;
	 float:left;
}

#left-bar {
	height: 560px;
	 margin-top: 8px;
	margin-right: 20px;
	float:left;
}

div.frame {
	background-color:transparent;
   height:525px;
  margin-top:74px;
  position:absolute;
  right: 168px;
    top: 26px;
    width: 468px;
}


</style>
</head>
<body>
<div id="conterner">

<div id="left-bar">
			<p class="head" align="center"> People Status</p>
                    <p class="foot"> NIST Rank: <h202><?php echo $nistrank; ?></h202></p>
                    <p class="foot"><img src="icon/like.png" height="12" width="12"><h202><?php echo $likes; ?></h202> Likes</p>
                    <p class="foot"><img src="icon/dislike.png" height="12" width="12"><h202><?php echo $dislikes; ?></h202> Dislikes</p>
                    <p class="foot"><img src="icon/intrested.png" height="12" width="12"><h202><?php echo $interested; ?></h202> Interested</p>
                    <p class="foot"> Total Views: <h202><?php ?></h202></p>
                    <p class="foot"> IP View: <h202><?php  ?></h202></p>
                    
                    
			<p class="head" align="center"> Search Information</p>
                    <p class="foot"> CAT: <h202><?php echo $posi; ?></h202></p>
                    <p class="foot"> Roll: <h202><?php if (is_numeric($roll)) { echo $roll; } else { echo "Not Found"; } ?></h202></p>
                    <p class="foot"> Year: <h202><?php if (is_numeric($year)) { echo $year; } else { echo "Not Define"; } ?></h202></p>                  
                    
	<p class="head" align="center"> My Status</p>
        	<p class="foot"> My IP: <h202><?php echo $ip; ?></h202></p>
            	
                	<p class="foot"> My rank <h202><?php echo $counter; ?></h202></p>
                    <p class="foot">I like <h202><?php echo $likes; ?></h202></p>
                    <p class="foot">I dislike <h202><?php echo $dislikes; ?></h202></p>
                    <p class="foot">Interested in <h202><?php echo $interested; ?></h202></p>
                    <p class="foot">Person view <h202><?php echo $_SESSION[$target]; ?></h202></p>
                    <p class="foot">Page view <h202><?php echo $_SESSION['pagesview']; ?></h202></p>
                    
                    
</div>
<div class="info">
  <form method="post">
    <table>
      <div align="center"><a>Roll : </a>
        <input required type="number" name="roll" maxlength="9" size="9" />
        <input name="ok" type="submit" value="SHOW" /></div>
    </table>
   
  </form>
  <div class="frame"></div>
  <table border="1">
    <div align="center"> 
    		<img class="pose" src="<?php echo $target; ?>" height="<?php echo $height; ?>" width="<?php echo $width; ?>" alt="<?php echo $roll; ?>">
    </div>
  </table>
 </div>
 </div>
</body>
</html>
