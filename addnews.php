<?php
include 'header.php';
header("content-Type: text/html; charset=Utf-8"); 
echo <<<END

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">新闻管理</li>
              <li class="active"><a href="addnews.php">新建新闻</a></li>
              <li><a href="newslist.php">新闻列表</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
END;

$type = $datetime = $title = $news = $laiyuan = $images=$images2=$images3= $description = $error= "";
$topnews=0;

//echo $_POST ['title'] ;
if (isset ( $_POST ['title'] ) && isset ( $_POST ['news']))
 {
	 $title =         sanitizeString( $_POST ['title'] );
	 $news =          ( $_POST ['news'] );
	 $type =          ( $_POST ['type'] );
	 $laiyuan =       ( $_POST ['laiyuan'] );
	 $description =   ( $_POST ['description'] );
	 $images =        ( $_POST ['images'] );
   $images2 =       ( $_POST ['images2'] );
   $images3 =       ( $_POST ['images3'] );
   $topnews =    $_POST['topnews'];
 if ($topnews  == "true")
  $topnews = 1;
else $topnews =0;
 //echo $topnews;
   //for($i=0;$i<count($_POST[topnews]);$i++)
   //   echo $topnews =$_POST[topnews][$i];
    //if (isset($_POST['topnews']))//判断元素是否存在
   // {
    //    echo $topnews=$v=$_POST['topnews'];//這樣取到的是一個數組，4個checkbox的value
     //   foreach ($v as $value)//再循環取出
     //   {
     //       echo $user_insterest.=$value."/";    
     //   }
    //}
   //$topnews =       ( $_POST ['topnews'] );
	//$datetime = date("Y-m-d h:i:sa")；
	if ($title == "")
		$error = "存在字段不能为空";
	else {
		// if (mysqli_num_rows ( queryMysql ( "SELECT * FROM news
		//       WHERE title='$title'" ) ))
		// 	$error = "标题已经存在";
		// else 
    {
			$sql = "INSERT INTO news(type,datetime,title,news,laiyuan, description,images,images2,images3,topnews) VALUES('$type', now(),'$title','$news','$laiyuan','$description','$images','$images2','$images3','$topnews')";
			//echo $sql;
			queryMysql ( $sql );
			
			$error = "新闻创建成功";
			redirect('newslist.php');
		}
	}
}
		
		
echo <<<END
<div class="well">
<form class="form-horizontal" action='addnews.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">创建新闻</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="title">新闻标题</label>
      <div class="controls">
        <input type="text" id="title" name="title" value="$title" placeholder="" class="input-xlarge"  required>
        <p class="help-block">请输入新闻标题</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="news">稿源</label>
      <div class="controls">
        <input type="text" id="laiyuan" name="laiyuan" value="$laiyuan" placeholder="" class="input-xlarge" required>
        <p class="help-block">请输入稿源</p>
      </div>
    </div>
 
	    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="description">简介</label>
      <div class="controls">
        <input id="description" name="description" value="$description" placeholder="" class="input-xlarge" type="description">
        <p class="help-block">请输入简介</p>
      </div>
    </div>

    <div class="control-group">
		  <label class="control-label" for="type" >新闻类型</label>
          <div class="controls">
            <select id="type" name="type" class="input-xlarge">
              <option value="0">推荐</option>
              <option value="1">百家</option>
			        <option value="2">本地</option>
            </select>
          </div>
	</div>
		
   <div class="control-group">
      <!-- remark -->
      <label class="control-label"  for="news">内容</label>
	  <div class="controls">
        <textarea rows="4" class="" id="news" name="news" value="$news" placeholder="" > </textarea>
		<p class="help-block">请输入内容信息</p>
      </div>
    </div>
	   <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="images">图片</label>
      <div class="controls">
        <input id="images" name="images" value="$images" placeholder="" class="input-xlarge" type="images">
        <p class="help-block">请输入图片</p>
      </div>
            <label class="control-label" for="images">图片2</label>
      <div class="controls">
        <input id="images2" name="images2" value="$images2" placeholder="" class="input-xlarge" type="images">
        <p class="help-block">请输入图片</p>
      </div>
            <label class="control-label" for="images">图片3</label>
      <div class="controls">
        <input id="images3" name="images3" value="$images3" placeholder="" class="input-xlarge" type="images">
        <p class="help-block">请输入图片</p>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="topnews" >头条</label>
          <div class="controls">
          <input type="radio" name="topnews" value="true">是           
          <input type="radio" name="topnews"  
END;
if($topnews == 0) 
echo <<<END
  checked="checked"
END;
echo <<<END
  value="false">不是      
            <!--input type="checkbox" id="topnews"   name='topnews[]' value='"$topnews"' placeholder="" class="input-xlarge" >
             <input type="checkbox" id="topnews"  name="topnews[]"  value='2' placeholder="" class="input-xlarge" --> 
          </div>
    </div>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-primary">保  存</button> &nbsp;&nbsp;
        <a class="btn" href='userlist.php'>返 回</a>
        <span class='error'>$error</span> 
      </div>
    </div>
 
  </fieldset>
</form>
</div>

END;

include 'bottom.php';
?>