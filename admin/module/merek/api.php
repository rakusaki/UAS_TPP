<?php
include "../../../lib/kon.php";

$result = mysqli_query($con, "SELECT * FROM tbl_merek");          //query                          //fetch result    
$data = array();
while ( $row = mysqli_fetch_array($result) )
{
  $data[] = $row;
}
echo json_encode( $data );
  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
?>