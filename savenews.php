<?php
include 'functions.php';
header("Content-type: text/html; charset=UTF-8");
//echo $ss=$_POST; 
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



//$result = array();
 $result = array();
 $sql="";
 $isUpdate = false;
$new = new news();
// 获得原始输入内容
$json = file_get_contents("php://input");
//var_dump($input_str);

// JSON转换为PHP对象
$obj = json_decode($json);
// $a = $obj->title;

//  $result["result"] = $a;
// echo json_encode($result, JSON_NUMERIC_CHECK);
//$result = array();
//$result["result"] = $obj->title;
//echo json_encode($result, JSON_NUMERIC_CHECK);

 if(property_exists($obj, 'id'))
    {
   	$new->id = $obj->id;
    	$isUpdate = true;
    }
 $new->title = $obj->title;
 $new->Content = $obj->news;
 $new->Source = $obj->laiyuan;
 $new->description = $obj->description;
//$new->datetime = $obj->datetime;
 $new->image = $obj->images;
 $new->image1 = $obj->images2;
 $new->image2 = $obj->images3;
 $new->type = intval($obj->type);//貌似会自动转，这个type就没问题
 $new->topnews = intval($obj->topnews);
 
 if($isUpdate){
    $sql="update news set title = '".$new->title."',laiyuan ='".$new->Source."',description ='".$new->description."',images='".$new->image."',images2='".$new->image1."',images3='".$new->image2."',topnews=".$new->topnews.",type=".$new->type." where id=".$new->id;
 }else{
    $sql="INSERT INTO news(type,datetime,title,news,laiyuan, description,images,images2,images3,topnews) VALUES(".$new->type.", now(),'".$new->title."','".$new->Content."','".$new->Source."','".$new->description."','".$new->image."','".$new->image1."','".$new->image2."',".$new->topnews.")";}
// //$sql='update news set title = '.$new->title;//.',news='.$new->Content.',type='.$new->type.',laiyuan ='.$new->laiyuan.',description ='.$new->description.',images='.$new->images.',images2='.$new->images2.',images3='.$new->images3.', topnews='.$new->topnews.' where id='.$new->id;
// //echo $sql;
 queryMysql ($sql);
 //$result = array();
 $result["result"] = $sql;
echo json_encode($result, JSON_NUMERIC_CHECK);
//echo $sql;//$error = "新闻修改成功";
 //echo  var_dump(json_decode($json, true));
 
// if (isset ( $_GET ['title'] ) )
//  {
//  	$data=$_GET ['title'] ;
//  	$data=json_decode($data);//把接受到的 json 变成数组。
// 	echo var_dump($data);
// echo "sdsds";
//  }
//$data=$_POST[];//接收 post

//$data=json_decode($data);//把接受到的 json 变成数组。


?>