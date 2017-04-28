<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_account_tutor`;");
E_C("CREATE TABLE `dna_account_tutor` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `datetime` int(6) NOT NULL DEFAULT '0' COMMENT '年月',
  `sale` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '销售',
  `teach` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '教学',
  `advice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '咨询',
  `coin` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '浪币',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总额',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `review` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0：未结算 1：已结算',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='导师出账表'");

require("../../inc/footer.php");
?>