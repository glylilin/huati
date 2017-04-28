<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_read`;");
E_C("CREATE TABLE `dna_read` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `content_id` int(10) NOT NULL DEFAULT '0' COMMENT '文章ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='阅读表'");
E_D("replace into `dna_read` values('1','0','0','1473152875','1','1','0');");
E_D("replace into `dna_read` values('2','0','0','1473152878','1','0','0');");

require("../../inc/footer.php");
?>