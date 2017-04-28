<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_message`;");
E_C("CREATE TABLE `dna_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `summary` varchar(250) NOT NULL DEFAULT '' COMMENT '内容简介',
  `content` text NOT NULL COMMENT '详细内容',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `level_id` int(10) NOT NULL DEFAULT '0' COMMENT '发送对象',
  `send_time` int(10) NOT NULL DEFAULT '0' COMMENT '发送时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统消息表'");

require("../../inc/footer.php");
?>