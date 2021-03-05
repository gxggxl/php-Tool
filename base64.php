<?php
/**
 * @author   ：gxggxl
 * @BlogURL  : https://gxusb.com
 * @DateTime : 2020/11/12 10:18
 * @FilePath : base64.php
 */
$base64en = $_POST['base64encode'];
$base64de = $_POST['base64decode'];
if (!empty($base64en)) {
	$base64encode = base64_encode($base64en);
}
if (!empty($base64de)) {
	$base64decode = base64_decode($base64de);
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="base64,base64解密,base64加密">
    <meta name="description" itemprop="description" content="一个用PHP+html5+bootstrap3+JQ写的base64加密解密页面。">
    <title>base64加密🔒解密🔓</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
		form .input-group {
			margin: 15px auto;
		}
    </style>
</head>

<body>

<div class="container">
    <form action="" method="post" class="col-md-10 col-md-offset-1">
        <h3 class="text-center">base64加密🔒</h3>
        <div class="input-group">
            <label for="base64encode" class="input-group-addon" id="sizing-addon1">base64🔒</label>
            <textarea rows="3" id="base64encode" name="base64encode" class="form-control" placeholder="请输入要加密的字符串"
                      aria-describedby="sizing-addon1"><?php echo $base64en; ?></textarea>
        </div>
        <div class="input-group">
            <label for="base64end" class="input-group-addon" id="sizing-addon1">base64🔒</label>
            <textarea rows="3" id="base64end" class="form-control" placeholder="base64加密结果"
                      aria-describedby="sizing-addon1"><?php echo $base64encode; ?></textarea>
        </div>
        <input type="button" class="btn btn-block btn-primary" id="Copy1" value="copy">
        <input type="submit" class="btn btn-success btn-block" value="提交">

        <h3 class="text-center">base64解密🔓</h3>
        <div class="input-group">
            <label for="base64d" class="input-group-addon" id="sizing-addon1">base64🔓</label>
            <textarea rows="3" id="base64d" name="base64decode" class="form-control" placeholder="请输入要解密的字符串"
                      aria-describedby="sizing-addon1"><?php echo $base64de; ?></textarea>
        </div>
        <div class="input-group">
            <label for="base64decode" class="input-group-addon" id="sizing-addon1">base64🔓</label>
            <textarea rows="3" id="base64decode" class="form-control" placeholder="base64解密结果"
                      aria-describedby="sizing-addon1"><?php echo $base64decode ?></textarea>
        </div>
        <input type="button" class="btn btn-block btn-primary" id="Copy" value="copy">
        <input type="submit" class="btn btn-success btn-block" value="提交">

    </form>

</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$("#Copy").click(function () {
		const copyText = $("#base64decode");//获取对象
		copyText.select();//选择
		document.execCommand("Copy");//执行复制
		alert("复制成功！");
	})

	$("#Copy1").click(function () {
		const copyText = $("#base64end");//获取对象
		copyText.select();//选择
		document.execCommand("Copy");//执行复制
		alert("复制成功！");
	})
</script>

</body>
</html>
