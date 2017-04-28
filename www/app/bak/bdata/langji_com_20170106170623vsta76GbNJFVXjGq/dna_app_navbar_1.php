<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_app_navbar`;");
E_C("CREATE TABLE `dna_app_navbar` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，0：推荐 1：视频 2：图文 3：帖子 4：直播',
  `hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='App导航表'");

require("../../inc/footer.php");
?>