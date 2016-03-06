<?php
include 'header.php';

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

$id =$type = $datetime  = $title = $news = $laiyuan = $images= $images2= $images3= $description = $error= "";
$topnews=0;
if (isset ( $_POST ['id'] ) )
 {
   $id = sanitizeString ( $_POST ['id'] );
	 $title = sanitizeString ( $_POST ['title'] );
	 $news = sanitizeString ( $_POST ['news'] );
	 $type = sanitizeString ( $_POST ['type'] );
	 $laiyuan = sanitizeString ( $_POST ['laiyuan'] );
	 $description = sanitizeString ( $_POST ['description'] );
	 $images = sanitizeString ( $_POST ['images'] );
	 $images2 = sanitizeString ( $_POST ['images2'] );
	 $images3 = sanitizeString ( $_POST ['images3'] );
  $topnews =    $_POST['topnews'];
 if ($topnews  == "true")
  $topnews = 1;
else $topnews =0;
	if ($title == "")
		$error = "存在字段不能为空";
	else {
	 {
		$sql="update news set title = '$title',news='$news',type='$type',laiyuan ='$laiyuan',description ='$description',images='$images',images2='$images2',images3='$images3', topnews=$topnews where id='$id' ";
		echo $sql;
		queryMysql (  $sql);
		$error = "新闻修改成功";
		//redirect('newslist.php');
		}
	}
}

else
{
	if(isset($_GET['id']))
	{
		$id = sanitizeString ( $_GET['id'] );
	
		if ($id == "") {
			$error = "id为空！";
		} else {
			$query = " select title,news,description,datetime,type,laiyuan,images ,images2,images3,topnews from news where id = '$id'";
	
			$result = queryMysql($query);
			if (mysqli_num_rows($result))
			{
				$row  = mysqli_fetch_row($result);
				$title = stripslashes($row[0]);
			    $news = stripslashes($row[1]);
				$description = stripslashes($row[2]);
				$datetime= stripslashes($row[3]);
				$type= stripslashes($row[4]);
				$laiyuan= stripslashes($row[5]);
				$images= stripslashes($row[6]);
				$images2= stripslashes($row[7]);
				$images3= stripslashes($row[8]);
				$topnews= stripslashes($row[9]);
			}
			else $error = "查询不到该条新闻！";
	
		}
	}
}		
		
echo <<<END
<div class="well">
<form class="form-horizontal" action='modifynews.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">创建新闻</legend>
    </div>
	 <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="id">ID</label>
      <div class="controls">
        <input type="text" id="id" name="id" value="$id" placeholder="" class="input-xlarge"  required>
        <p class="help-block">请输入新闻标题</p>
      </div>
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
      <label class="control-label" for="laiyuan">稿源</label>
      <div class="controls">
        <input type="laiyuan" id="laiyuan" name="laiyuan" value="$laiyuan" placeholder="" class="input-xlarge" required>
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
	      <label class="control-label" for="images">图片</label>
      <div class="controls">
        <input id="images2" name="images2" value="$images2" placeholder="" class="input-xlarge" type="images">
        <p class="help-block">请输入图片</p>
      </div>
	      <label class="control-label" for="images">图片</label>
      <div class="controls">
        <input id="images3" name="images3" value="$images3" placeholder="" class="input-xlarge" type="images">
        <p class="help-block">请输入图片</p>
      </div>
    </div>
     <div class="control-group">
      <label class="control-label" for="topnews" >头条</label>
          <div class="controls">
          <input type="radio" name="topnews"
END;
if($topnews == 1) 
echo <<<END
  checked="checked"
END;
echo <<<END
           value="true">是           
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