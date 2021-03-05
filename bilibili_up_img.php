<?php
/**
 * @author   ：gxggxl
 *           UP主投稿相簿api解析
 * @BlogURL  : https://gxusb.com
 * @DateTime : 2020/11/1 21:54
 * @FilePath : bilibili_up_img.php
 */

header('content-type:text/html;charset=utf-8');

//uid num 目标用户UID 必要
$uid = 1711589;
//page_num num 页码 非必要 默认为0
$page_num = 0;
//page_size num 每页项数 非必要 默认为20
$page_size = 99;
//biz str 查询类型 非必要 全部：all 绘画：draw 摄影：photo 日常：daily 默认为all
$biz = 'all';
$up_url = 'https://api.vc.bilibili.com/link_draw/v1/doc/doc_list'
          . '?uid=' . $uid
          . '&page_size=' . $page_size
          . '&page_num=' . $page_num
          . '&biz=' . $biz;

/**
 * 计算文件大小
 * https://www.bejson.com/convert/filesize
 *
 * @param $num
 * @return string
 */
function getFilesize($num): string {
	$p = 0;
	$format = 'bytes';
	if ($num > 0 && $num < 1024) {
		return number_format($num) . ' ' . $format;
	}
	if ($num >= 1024 && $num < (1024**2)) {
		$p = 1;
		$format = 'KB';
	}
	if ($num >= (1024**2) && $num < (1024**3)) {
		$p = 2;
		$format = 'MB';
	}
	if ($num >= (1024**3) && $num < (1024**4)) {
		$p = 3;
		$format = 'GB';
	}
	if ($num >= (1024**4) && $num < (1024**5)) {
		$p = 3;
		$format = 'TB';
	}
	$num /= 1024**$p;
	return number_format($num, 3) . ' ' . $format;
}

$data = file_get_contents($up_url);// 获取数据
try {
	//json_decode() 函数用于对 JSON 格式的字符串进行解码，并转换为 PHP 变量
	$arr = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
	//JSON_THROW_ON_ERROR 为PHP7.3新增特性，不兼容php7.3以下版本
} catch (JsonException $e) {
}

// 将获取到的 JSON 数据解析成数组
foreach ($arr['data']['items'] as $t => $tValue) {
	//循环用户投稿相簿个数
	$arr['data']['items'][$t];
	$a ='';
	echo '序号：' . $a = $a + 1 . "<br>";
	echo '相簿ID：' . $arr['data']['items'][$t]['doc_id'] . '<br>';
	echo '上传用户UID：' . $arr['data']['items'][$t]['poster_uid'] . '<br>';
	echo '简介：' . $arr['data']['items'][$t]['description'] . '<br>';

	for ($i = 0, $iMax = count($tValue['pictures']); $i < $iMax; $i++) {
		//循环图片
		echo '图片地址：' . $tValue['pictures'][$i]['img_src'] . "<br>";
		echo '图片宽度：' . $tValue['pictures'][$i]['img_width'] . "<br>";
		echo '图片高度：' . $tValue['pictures'][$i]['img_height'] . "<br>";
		echo "图片大小：" . getFilesize($tValue['pictures'][$i]['img_size']*1024) . '<br><br>';
	}
	echo '图片数量：' . $arr['data']['items'][$t]['count'] . '<br>';
	echo '浏览数量：' . $arr['data']['items'][$t]['view'] . '<br>';
	echo '点赞数量：' . $arr['data']['items'][$t]['like'] . '<br>';
	echo '发布时间：' . date('Y-m-d H:i:s', $arr['data']['items'][$t]['ctime']) . '<br><hr>';
}