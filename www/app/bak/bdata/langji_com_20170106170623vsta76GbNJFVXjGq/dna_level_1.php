<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_level`;");
E_C("CREATE TABLE `dna_level` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '等级名称',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '等级',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '积分',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='积分等级表'");
E_D("replace into `dna_level` values('10001','1',0x56495031e5b08fe5a484e794b7,'1','998','','1','0','0');");
E_D("replace into `dna_level` values('10002','1',0x56495032e68385e7aaa6e5889de5bc80,'2','1998','','1','0','0');");
E_D("replace into `dna_level` values('10003','1',0x56495033e5889de5b09de7a681e69e9c,'3','5000','','1','0','0');");
E_D("replace into `dna_level` values('10004','1',0x56495034e88081e58fb8e69cba,'4','8000','','1','0','0');");
E_D("replace into `dna_level` values('10005','1',0x56495035e5ae9ee68898e6b4be,'5','12000','','1','0','0');");
E_D("replace into `dna_level` values('10006','1',0x56495036e799bee4babae696a9,'6','20000','','1','0','0');");
E_D("replace into `dna_level` values('10007','1',0x56495037e5a597e8b7afe4b98be78e8b,'7','38000','','1','0','0');");
E_D("replace into `dna_level` values('10008','1',0x56495038e68385e59ca3e4b98be5b785,'8','66000','','1','0','0');");
E_D("replace into `dna_level` values('10009','1',0x56495039e5b89de78e8be68a8ae5a6b9,'9','88000','','1','0','0');");
E_D("replace into `dna_level` values('10010','1',0x53564950e68385e6849fe887aae794b1,'10','1000000','','1','0','0');");
E_D("replace into `dna_level` values('10011','1',0x56495030,'0','0','','1','0','0');");

require("../../inc/footer.php");
?>