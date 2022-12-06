<?php
session_start();
include('../connect.php');
if(isset($_POST["submit_file"]))
{
	var_dump($_FILES['file']);
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 $i=0;
 while(($csv = fgetcsv($file_open, 5000, ",")) !== false)
 {
	 if($csv[0] != NULL){
	 print "<pre>";
	 print_r ($csv);
	 print "</pre>";
  $a = $csv[0];
  $b = $csv[1];
  $c = "10/11/2023";
   
  $e=$csv[3]; 
  $f=1;
  $g = ltrim($csv[2], 'R');
  $h = $g * 0.25;
  $i = $csv[1];
  $d=$g + $h;
  $j= date('m/d/Y');//date("d/m/Y", strtotime($str));
  $k=1;
  
  $sql = "INSERT INTO products (product_code,product_name,expiry_date,price,supplier,qty,o_price,profit,gen_name,date_arrival,qty_sold) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k));
$i++;
header("location: products.php");
 }
}
}
?>
