<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>所有用户</title>
    <style>
        table{
            border-collapse: collapse;
        }
        th,td{
            border:1px solid #ccccff;
            padding: 5px;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<a href="adduser.html">添加用户</a>
<table>
    <tr><th>id</th><th>名字</th><th>年龄</th><th>修改/删除</th></tr>
    <?php
    //连接数据库
    connnetDb();
    //查询数据表中的所有数据,并按照id降序排列
    $result=mysqli_query("SELECT * FROM users ORDER BY id DESC");
    //获取数据表的数据条数
    $dataCount=mysqli_num_rows($result);
    //echo $dataCount;
    //打印输出所有数据


    for($i=0;$i<$dataCount;$i++){
        $result_arr=mysql_fetch_assoc($result);
        $id=$result_arr['id'];
        $name=$result_arr['name'];
        $age=$result_arr['age'];
        //print_r($result_arr);
        echo "<tr><td>$id</td><td>$name</td><td>$age</td><td><a href='edituser.php?id=$id'>修改</a> <a href='deleteuser.php?id=$id'>删除</a></td></tr>";
    }
    ?>
</table>
</body>
</html>
