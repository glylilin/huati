<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_claim`;");
E_C("CREATE TABLE `dna_claim` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `attach_id` int(10) NOT NULL DEFAULT '0' COMMENT '截图',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='认领表'");
E_D("replace into `dna_claim` values('1','0','0','0','','1473151218','1','0','0');");
E_D("replace into `dna_claim` values('2','0','0','0','','1473151220','1','0','0');");
E_D("replace into `dna_claim` values('3','0','0','0','','1473151221','1','0','0');");

require("../../inc/footer.php");
?>