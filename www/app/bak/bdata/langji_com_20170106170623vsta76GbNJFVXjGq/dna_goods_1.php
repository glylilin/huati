<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_goods`;");
E_C("CREATE TABLE `dna_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `tree_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `albums` text NOT NULL COMMENT '图片集',
  `size` varchar(250) NOT NULL DEFAULT '' COMMENT '尺寸',
  `color` varchar(250) NOT NULL DEFAULT '' COMMENT '颜色',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `coin` int(10) NOT NULL DEFAULT '0' COMMENT '赠送浪币',
  `summary` varchar(250) NOT NULL DEFAULT '' COMMENT '内容摘要',
  `content` text NOT NULL COMMENT '详细内容',
  `tag` varchar(250) NOT NULL DEFAULT '' COMMENT '标签',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品表'");
E_D("replace into `dna_goods` values('10001','0','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','','','0.00','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','1473144260','1473144260','0','0','0','0','1','0','0');");

require("../../inc/footer.php");
?>