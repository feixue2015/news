﻿<?php
include 'header.php';

echo <<<END

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">新闻管理</li>
              <li><a href="addnews.php">新建新闻</a></li>
              <li class="active"><a href="newslist.php">新闻列表</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">

<div class="btn-toolbar">
    <a class="btn btn-primary" href="addnews.php" >新 建</a>
    <!--button class="btn">导 入</button>
    <button class="btn">导出</button-->
</div>
END;

echo <<<END
		
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>标题</th>
          <th>简介</th>
		  <th>时间</th>
          <th>新闻类型</th>
		  <th>来源</th>
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
END;



$result = queryMysql(" select id,title,description,datetime,type,laiyuan from news ORDER BY id desc ");
$num    = mysqli_num_rows($result);

for ($j = 0 ; $j < $num ; ++$j)
{
    $row = mysqli_fetch_row($result);

    echo <<<END
       <tr>
          <td>$row[1]</td>
          <td>$row[2]</td>
          <td>$row[3]</td>
          <td>$row[4]</td>
		      <td>$row[5]</td>
          <td>
              <a href="modifynews.php?id=$row[0]"><i class="icon-pencil"></i></a>
          	  <a href="deletenews.php?id=$row[0]"><i class="icon-remove"></i></a>
              <!--<a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>-->
          </td>
        </tr>
END;
    
}


echo <<<END

      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">确认</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">您确认删除这个新闻吗?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" data-dismiss="modal">删除</button>
    </div>
</div>

END;

include 'bottom.php';
?>