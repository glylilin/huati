<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_user_config`;");
E_C("CREATE TABLE `dna_user_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '名称',
  `content` text NOT NULL COMMENT '配置参数',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户配置表'");
E_D("replace into `dna_user_config` values('1','1','1',0x77656978696e746f6b656e,0x7b226b6579223a5b226170706964222c22617070736563726574222c22746f6b656e225d2c2276616c7565223a5b22777864643263313531313361393131366361222c223335373230616135353565383631303265393262346131386431323537623439222c2277656978696e746f6b656e225d7d,'0','1','1');");
E_D("replace into `dna_user_config` values('2','1','2','',0x7b226b6579223a5b226170706964222c22736563726574225d2c2276616c7565223a5b226170706964313233222c22736563726574343536225d7d,'0','1','1');");

require("../../inc/footer.php");
?>