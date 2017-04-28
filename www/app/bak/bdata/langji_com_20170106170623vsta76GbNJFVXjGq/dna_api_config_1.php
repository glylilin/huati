<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_api_config`;");
E_C("CREATE TABLE `dna_api_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，0：无 1：android 2：ios',
  `version` varchar(250) NOT NULL DEFAULT '' COMMENT '版本',
  `review` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Api配置表'");
E_D("replace into `dna_api_config` values('1','2',0x312e302e36,'1',0x694f5320312e302e362e33383320323031362d31302d3234,'0','1','0','1');");
E_D("replace into `dna_api_config` values('2','2',0x312e302e37,'1',0x694f5320312e302e372e34323620323031362d31302d3239,'1478505768','1','0','1');");
E_D("replace into `dna_api_config` values('3','2',0x312e302e39,'1',0x694f5320312e302e392e34393820323031362d31312d3039,'1478535110','1','0','1');");
E_D("replace into `dna_api_config` values('4','2',0x312e302e31,'1',0x694f53202d20e4b8b4e697b6e78988,'1478592908','1','1','1');");
E_D("replace into `dna_api_config` values('5','2',0x312e302e3130,'1',0x694f5320312e302e31302e35313520323031362d31312d3134,'1478948782','1','0','1');");
E_D("replace into `dna_api_config` values('6','2',0x312e312e30,'1',0x694f5320312e312e302e35353020323031362d31312d3232,'1479387635','1','0','1');");
E_D("replace into `dna_api_config` values('7','2',0x312e312e31,'1',0x694f5320312e312e312e35353220323031362d31312d3234,'1479966075','1','0','1');");
E_D("replace into `dna_api_config` values('8','2',0x312e312e32,'1',0x694f5320312e312e322e35353720323031362d31322d3032,'1480661538','1','0','1');");
E_D("replace into `dna_api_config` values('9','2',0x312e312e33,'1',0x694f5320312e312e332e35373220323031362d31322d3133,'1481038366','1','0','1');");
E_D("replace into `dna_api_config` values('10','2',0x312e312e34,'1',0x694f5320312e312e342e35383220323031362d31322d3139,'1482079611','1','0','1');");
E_D("replace into `dna_api_config` values('11','2',0x312e312e35,'1',0x694f5320312e312e352e35383620323031362d31322d3230,'1482236378','1','0','1');");
E_D("replace into `dna_api_config` values('12','2',0x312e312e36,'1',0x694f5320312e312e362e35393120323031362d31322d3231,'1482341583','1','0','1');");

require("../../inc/footer.php");
?>