<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_app_version`;");
E_C("CREATE TABLE `dna_app_version` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，0：无 1：android 2：ios',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '名称',
  `version` varchar(250) NOT NULL DEFAULT '' COMMENT '版本',
  `version_code` int(10) NOT NULL DEFAULT '0' COMMENT '版本号',
  `attach_id` int(10) NOT NULL DEFAULT '0' COMMENT '附件ID',
  `attach_url` varchar(250) NOT NULL COMMENT '附件地址',
  `content` varchar(250) NOT NULL DEFAULT '' COMMENT '内容',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `must` tinyint(1) NOT NULL DEFAULT '0' COMMENT '必须',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='App版本表'");
E_D("replace into `dna_app_version` values('10001','2',0x694f5320312e302e39,0x312e302e39,'498','0','','','','0','1478535206','1','0','1');");
E_D("replace into `dna_app_version` values('10002','1',0xe78988e69cac312e30,0x312e30,'11','14612','','','','0','1478666422','1','0','0');");
E_D("replace into `dna_app_version` values('10003','2',0x694f5320312e302e3130,0x312e302e3130,'515','0','','','','0','1478948690','1','0','1');");
E_D("replace into `dna_app_version` values('10004','2',0x694f5320312e312e30,0x312e312e30,'550','0','','','','0','1479387670','1','0','1');");
E_D("replace into `dna_app_version` values('10005','2',0x694f5320312e312e31,0x312e312e31,'552','0','','','','0','1479965846','1','0','1');");
E_D("replace into `dna_app_version` values('10006','2',0x694f5320312e312e32,0x312e312e32,'557','0','','','','0','1480661505','1','0','1');");
E_D("replace into `dna_app_version` values('10007','2',0x694f5320312e312e33,0x312e312e33,'572','0','','','','0','1481038396','1','0','1');");
E_D("replace into `dna_app_version` values('10008','2',0x694f5320312e312e34,0x312e312e34,'582','0','','','','0','1482079647','1','0','1');");
E_D("replace into `dna_app_version` values('10009','2',0x694f5320312e312e35,0x312e312e35,'586','0','','','','0','1482236416','1','0','1');");
E_D("replace into `dna_app_version` values('10010','2',0x694f5320312e312e36,0x312e312e36,'591','0','','','','0','1482341615','1','0','1');");

require("../../inc/footer.php");
?>