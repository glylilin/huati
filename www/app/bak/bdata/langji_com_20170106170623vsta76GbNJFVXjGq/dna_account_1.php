<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_account`;");
E_C("CREATE TABLE `dna_account` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `datetime` int(6) NOT NULL DEFAULT '0' COMMENT '年月',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '销售额',
  `sale_out` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '销售提成',
  `teach_out` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '教学提成',
  `coin_in` int(10) NOT NULL DEFAULT '0' COMMENT '浪币收入',
  `coin_out` int(10) NOT NULL DEFAULT '0' COMMENT '浪币支出',
  `deposit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值',
  `encash` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现',
  `profit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '利润',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `review` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='财务管理表'");

require("../../inc/footer.php");
?>