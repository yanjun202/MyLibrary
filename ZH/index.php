<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <script type="text/javascript" src="common.js"></script>
    <script type="text/javascript" src="../Assets/common/userLogin.js"></script>
    <script>
        $(document).ready(function(){
            $("#headerContent").load("header.html");
            $("#footerContent").load("../Assets/common/footer.html");
        });
    </script>
    <?php
    require_once "../Assets/common/db.php";
    $sql = "SELECT * FROM books";
    $result=mysqli_query($db, $sql);
    while ($row=mysqli_fetch_row($result))
    {
        $count[]=$row[1];
    }
    $total=sizeof($count);
    mysqli_close($db);
    ?>
</head>
<body onload="checkLoginAndDisplayUsername()">
<div id="headerContent"></div>
<div class="container">
    <div class="row" style="font-size: 1.2em;font-family: STXingkai,serif;">
        <div class="col-md-12">
            <h2>简介</h2>
        </div>
        <div class="col-md-12">
            <img src="../Assets/image/Ruili River.jpg" style="width:20%; border-radius:20px; float:right; margin-top:5px; margin-left:20px; margin-bottom:3px;" alt="瑞丽江">
            <p>我来自中国云南，2019年起入读爱尔兰都柏林理工大学计算机科学专业。这个网站是基于大二上学期PHP课程期末作业完成的，前端页面使用Bootstrap搭建。</p>
            <p>本站只是作业项目，相关数据只为展示之用，已经很久没有更新。</p>
        </div>
        <div class="col-md-12">
            <h2>图书馆</h2>
        </div>
        <div class="col-md-12">
            <img src="../Assets/image/Dali Prefectural Museum.jpg" style="width:20%; border-radius:20px; float:right; margin-top:5px; margin-left:20px; margin-bottom:3px;" alt="大理白族自治州图书馆">
            <p>我是一名云南史地爱好者，有收集云南书籍资料的爱好。本站目前共录有<span style="text-decoration:underline; text-decoration-color:limegreen;"><?php echo $total; ?></span>本书。</p>
            <p>如您学习、研究云南地方文化历史而需要我所收集的资料，请通过本站的“互助”提交请求，也可以向我的邮箱发送邮件。</p>
        </div>
    </div>
</div>
<div id="footerContent"></div>
</body>
</html>