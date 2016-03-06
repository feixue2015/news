<?php
//include 'functions.php';

   class news {
     public $id = 0;
     public $title  = "";
     public $Content = "";
	   public $Source = "";
	   public $description = "";
	   public $datetime = "";
	   public $image = "";
	   public $image1 = "";
	   public $image2 = "";
	   public $type = 0;
	   public $topnews = 0;
   }

function time2Units ($time)
{
   $year   = floor($time / 60 / 60 / 24 / 365);
   $time  -= $year * 60 * 60 * 24 * 365;
   $month  = floor($time / 60 / 60 / 24 / 30);
   $time  -= $month * 60 * 60 * 24 * 30;
   $week   = floor($time / 60 / 60 / 24 / 7);
   $time  -= $week * 60 * 60 * 24 * 7;
   $day    = floor($time / 60 / 60 / 24);
   $time  -= $day * 60 * 60 * 24;
   $hour   = floor($time / 60 / 60);
   $time  -= $hour * 60 * 60;
   $minute = floor($time / 60);
   $time  -= $minute * 60;
   $second = $time;
   $elapse = '';

   $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
                    '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
                    );

   foreach ( $unitArr as $cn => $u )
   {
       if ( $$u > 0 )
       {
           $elapse = $$u . $cn;
           break;
       }
   }

   return $elapse;
}


$type=-1;
if(isset($_GET['type'])){
  $type =  ( $_GET['type'] );
}
$id=-1;
if(isset($_GET['id'])){
  $id =  ( $_GET['id'] );
}

$link = mysqli_connect('localhost', 'root', 'newpass', 'mynews');
mysqli_query($link,"SET NAMES UTF8");
// Check connection
if (mysqli_connect_errno($link))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "select id,type,datetime,title,news,laiyuan as Source,description,images,images2,images3,topnews  from news";
if ($type!=-1)
$sql = $sql ." where type = '$type'";
if ($id!=-1)
$sql = $sql ." where id = '$id'";
$result = mysqli_query($link, $sql) or die(mysql_error());

$num    = mysqli_num_rows($result);
$newslist = array();
$i=0;

while($row = mysqli_fetch_array($result))
{
   //$row = mysqli_fetch_row($result);
   $e = new news();
   $e->id      = $row['id'];
   $e->type    = $row['type'];  
   $e->title   = $row['title'];
   $e->Content = $row['news'];
   $e->Source  = $row['Source'];
   $e->description = $row['description'];
   $e->image   = $row['images'];
   $e->image1  = $row['images2'];
   $e->image2  = $row['images3'];
   $e->topnews = $row['topnews'];
   
   if ($type!=-1){
      $past = strtotime($row['datetime']); // Some timestamp in the past
      $now  = time();     // Current timestamp
      $e->datetime=time2Units($now - $past); 
   }
   else 
      $e->datetime= $row['datetime'];
   
   
   //echo json_encode($e);
   $newslist[$i++] = $e;
   //$js= $js.json_encode($e) ."," ; 
	//echo $js;
}
echo json_encode($newslist);
?>