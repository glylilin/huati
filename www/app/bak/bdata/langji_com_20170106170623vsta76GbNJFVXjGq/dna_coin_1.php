<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_coin`;");
E_C("CREATE TABLE `dna_coin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(250) NOT NULL COMMENT '名称',
  `icon_id` int(10) NOT NULL DEFAULT '0' COMMENT '图标',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '赠送积分',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='浪币表'");
E_D("replace into `dna_coin` values('1','','0','0','0.00','0','','0','0','0','0');");
E_D("replace into `dna_coin` values('2','','0','0','0.00','0','','0','1','0','0');");
E_D("replace into `dna_coin` values('3','','0','0','0.00','0','','0','1','0','0');");
E_D("replace into `dna_coin` values('4','','0','0','0.00','0','','0','1','0','0');");
E_D("replace into `dna_coin` values('5','','0','0','0.00','0','','0','1','0','0');");

require("../../inc/footer.php");
?>