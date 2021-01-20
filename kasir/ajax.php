<?php
//Including Database configuration file.
include "../lib/kon.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $kpro = mysqli_query($con, "SELECT barcode,nama_produk FROM tbl_produk WHERE barcode LIKE '%$Name%' LIMIT 5");
   // $Query = "SELECT Name FROM search WHERE Name LIKE '%$Name%' LIMIT 5";
//Query execution
   // $ExecQuery = MySQLi_query($con, $Query);
//Creating unordered list to display result.
   echo '
<ul>
   ';
   ?>
   <table border="0" bgcolor="white" width="100%">
   <?php
   //Fetching result from database.
   while($pro = mysqli_fetch_array($kpro)) {
   // while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <tr>
   <td class="form-control" onclick='fill("<?php echo $pro['barcode']; ?>")'>
   <!-- <a>   -->
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
   <?php echo $pro['nama_produk']; ?>
   </td>
   </tr>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
   </table>
</ul>