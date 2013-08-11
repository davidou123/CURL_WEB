<?
$start=$_GET['start'];

for($i=1;$i<=20;$i++){
$num= $start+$i;

$url = 'http://ticket.7net.com.tw/index.php?class=activity&func=activity&work=detail&activity_id='.$num.'&category=ibon';
$lines_array = file($url);
$lines_string = implode('', $lines_array);
eregi("<title>(.*)</title>", $lines_string, $head);
$output.=$num." ".$head[1]."\r\n";

}

$fp = fopen('7.txt', 'a');
fwrite($fp, $output);
fclose($fp);
$nextime=$num+1;
?>

<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw"></meta>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
<?php if($nextime<20530){
echo '<meta http-equiv="refresh" content="1; url=7.php?start='.$nextime.'">';
}?>
<title>網站名稱</title>
</meta></head>
<body>
現在跑到 <?php echo $nextime;?>
</body>
</html>