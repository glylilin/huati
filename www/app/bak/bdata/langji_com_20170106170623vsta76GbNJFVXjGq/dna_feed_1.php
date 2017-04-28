<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_feed`;");
E_C("CREATE TABLE `dna_feed` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，1： 图文 2：视频 3：语音                        ',
  `content` text NOT NULL COMMENT '内容',
  `attachs` text NOT NULL COMMENT '附件集',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '积分',
  `coin` int(10) NOT NULL DEFAULT '0' COMMENT '浪币',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `like` int(10) NOT NULL DEFAULT '0' COMMENT '赞',
  `dislike` int(10) NOT NULL DEFAULT '0' COMMENT '踩',
  `share` int(10) NOT NULL DEFAULT '0' COMMENT '分享次数',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='浪友圈'");

require("../../inc/footer.php");
?>