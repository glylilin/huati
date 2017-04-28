<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_course_topic`;");
E_C("CREATE TABLE `dna_course_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `course_id` int(10) NOT NULL DEFAULT '0' COMMENT '课程ID',
  `rel_course_id` int(10) NOT NULL DEFAULT '0' COMMENT '关联子课程ID',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10093 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='专题课程表'");
E_D("replace into `dna_course_topic` values('10001','10025','10018','100','','1478534165','1','0','0');");
E_D("replace into `dna_course_topic` values('10002','10025','10019','0','','1478534172','1','0','0');");
E_D("replace into `dna_course_topic` values('10003','10025','10020','0','','1478534177','1','0','0');");
E_D("replace into `dna_course_topic` values('10004','10025','10023','0','','1478534183','1','0','0');");
E_D("replace into `dna_course_topic` values('10005','10025','10018','0','','1478534189','1','1','0');");
E_D("replace into `dna_course_topic` values('10006','10025','10092','0','','1478534202','1','0','0');");
E_D("replace into `dna_course_topic` values('10007','10025','10093','8','','1478598829','1','0','0');");
E_D("replace into `dna_course_topic` values('10008','10025','10094','3','','1478598836','1','0','0');");
E_D("replace into `dna_course_topic` values('10009','10025','10095','2','','1478598842','1','0','0');");
E_D("replace into `dna_course_topic` values('10010','10096','10018','0','','1478630698','1','0','0');");
E_D("replace into `dna_course_topic` values('10011','10096','10019','0','','1478630705','1','0','0');");
E_D("replace into `dna_course_topic` values('10012','10096','10020','0','','1478630709','1','0','0');");
E_D("replace into `dna_course_topic` values('10013','10096','10023','0','','1478630715','1','0','0');");
E_D("replace into `dna_course_topic` values('10014','10096','10092','0','','1478630721','1','0','0');");
E_D("replace into `dna_course_topic` values('10015','10025','10097','2','','1478630862','1','0','0');");
E_D("replace into `dna_course_topic` values('10016','10025','10099','6','','1478630870','1','0','0');");
E_D("replace into `dna_course_topic` values('10017','10025','10100','7','','1478630877','1','0','0');");
E_D("replace into `dna_course_topic` values('10018','10025','10101','5','','1478630883','1','0','0');");
E_D("replace into `dna_course_topic` values('10019','10025','10102','4','','1478630889','1','0','0');");
E_D("replace into `dna_course_topic` values('10020','10025','10103','3','','1478630901','1','0','0');");
E_D("replace into `dna_course_topic` values('10021','10025','10104','9','','1478630911','1','0','0');");
E_D("replace into `dna_course_topic` values('10022','10025','10104','0','','1478630917','1','1','0');");
E_D("replace into `dna_course_topic` values('10023','10025','10106','10','','1478630924','1','0','0');");
E_D("replace into `dna_course_topic` values('10024','10025','10105','11','','1478630940','1','0','0');");
E_D("replace into `dna_course_topic` values('10025','10025','10107','12','','1478630945','1','0','0');");
E_D("replace into `dna_course_topic` values('10026','10025','10108','13','','1478630951','1','0','0');");
E_D("replace into `dna_course_topic` values('10027','10025','10109','14','','1478630957','1','0','0');");
E_D("replace into `dna_course_topic` values('10028','10025','10110','15','','1478630962','1','0','0');");
E_D("replace into `dna_course_topic` values('10029','10025','10111','0','','1478630967','1','1','0');");
E_D("replace into `dna_course_topic` values('10030','10025','10111','0','','1478630972','1','1','0');");
E_D("replace into `dna_course_topic` values('10031','10025','10112','16','','1478630981','1','0','0');");
E_D("replace into `dna_course_topic` values('10032','10025','10113','0','','1478630985','1','1','0');");
E_D("replace into `dna_course_topic` values('10033','10083','10114','1','','1478631823','1','0','0');");
E_D("replace into `dna_course_topic` values('10034','10025','10114','0','','1478638259','1','0','0');");
E_D("replace into `dna_course_topic` values('10035','10025','10115','0','','1478638264','1','0','0');");
E_D("replace into `dna_course_topic` values('10036','10025','10116','0','','1478638431','1','0','0');");
E_D("replace into `dna_course_topic` values('10037','10025','10116','0','','1478638457','1','1','0');");
E_D("replace into `dna_course_topic` values('10038','10083','10115','2','','1478638603','1','0','0');");
E_D("replace into `dna_course_topic` values('10039','10083','10116','3','','1478638608','1','0','0');");
E_D("replace into `dna_course_topic` values('10040','10025','10117','2','','1478670559','1','0','0');");
E_D("replace into `dna_course_topic` values('10041','10025','10118','17','','1478674954','1','0','0');");
E_D("replace into `dna_course_topic` values('10042','10025','10108','0','','1478751779','1','1','0');");
E_D("replace into `dna_course_topic` values('10043','10083','10095','0','','1478777347','1','1','0');");
E_D("replace into `dna_course_topic` values('10044','10083','10103','0','','1478777362','1','1','0');");
E_D("replace into `dna_course_topic` values('10045','10083','10018','0','','1478777378','1','1','0');");
E_D("replace into `dna_course_topic` values('10046','10083','10019','0','','1478777390','1','1','0');");
E_D("replace into `dna_course_topic` values('10047','10083','10093','0','','1478777416','1','1','0');");
E_D("replace into `dna_course_topic` values('10048','10083','10094','0','','1478777426','1','1','0');");
E_D("replace into `dna_course_topic` values('10049','10083','10097','0','','1478777437','1','1','0');");
E_D("replace into `dna_course_topic` values('10050','10083','10099','0','','1478777448','1','1','0');");
E_D("replace into `dna_course_topic` values('10051','10083','10100','0','','1478777459','1','1','0');");
E_D("replace into `dna_course_topic` values('10052','10083','10101','0','','1478777480','1','1','0');");
E_D("replace into `dna_course_topic` values('10053','10083','10102','0','','1478777490','1','1','0');");
E_D("replace into `dna_course_topic` values('10054','10083','10103','0','','1478777499','1','1','0');");
E_D("replace into `dna_course_topic` values('10055','10083','10103','0','','1478777515','1','1','0');");
E_D("replace into `dna_course_topic` values('10056','10083','10104','0','','1478777529','1','1','0');");
E_D("replace into `dna_course_topic` values('10057','10083','10105','0','','1478777542','1','1','0');");
E_D("replace into `dna_course_topic` values('10058','10083','10106','0','','1478777569','1','1','0');");
E_D("replace into `dna_course_topic` values('10059','10083','10107','0','','1478777581','1','1','0');");
E_D("replace into `dna_course_topic` values('10060','10083','10108','0','','1478777600','1','1','0');");
E_D("replace into `dna_course_topic` values('10061','10083','10109','0','','1478777617','1','1','0');");
E_D("replace into `dna_course_topic` values('10062','10083','10110','0','','1478777626','1','1','0');");
E_D("replace into `dna_course_topic` values('10063','10083','10112','0','','1478777640','1','1','0');");
E_D("replace into `dna_course_topic` values('10064','10083','10113','0','','1478777674','1','1','0');");
E_D("replace into `dna_course_topic` values('10065','10083','10117','0','','1478777710','1','1','0');");
E_D("replace into `dna_course_topic` values('10066','10083','10118','0','','1478777724','1','1','0');");
E_D("replace into `dna_course_topic` values('10067','10083','10095','3','','1479017205','1','1','0');");
E_D("replace into `dna_course_topic` values('10068','10083','10095','0','','1479017405','1','0','0');");
E_D("replace into `dna_course_topic` values('10069','10083','10094','0','','1479017412','1','0','0');");
E_D("replace into `dna_course_topic` values('10070','10083','10099','0','','1479017487','1','0','0');");
E_D("replace into `dna_course_topic` values('10071','10083','10097','0','','1479017518','1','0','0');");
E_D("replace into `dna_course_topic` values('10072','10083','10100','0','','1479017530','1','0','0');");
E_D("replace into `dna_course_topic` values('10073','10083','10101','0','','1479017536','1','0','0');");
E_D("replace into `dna_course_topic` values('10074','10083','10102','0','','1479017546','1','0','0');");
E_D("replace into `dna_course_topic` values('10075','10083','10103','0','','1479017554','1','0','0');");
E_D("replace into `dna_course_topic` values('10076','10083','10104','0','','1479017562','1','0','0');");
E_D("replace into `dna_course_topic` values('10077','10083','10105','0','','1479017581','1','0','0');");
E_D("replace into `dna_course_topic` values('10078','10083','10106','0','','1479017612','1','0','0');");
E_D("replace into `dna_course_topic` values('10079','10083','10107','0','','1479017638','1','0','0');");
E_D("replace into `dna_course_topic` values('10080','10083','10109','0','','1479017652','1','0','0');");
E_D("replace into `dna_course_topic` values('10081','10083','10108','0','','1479017669','1','0','0');");
E_D("replace into `dna_course_topic` values('10082','10083','10110','0','','1479017681','1','0','0');");
E_D("replace into `dna_course_topic` values('10083','10083','10112','0','','1479017691','1','0','0');");
E_D("replace into `dna_course_topic` values('10084','10083','10118','0','','1479017704','1','0','0');");
E_D("replace into `dna_course_topic` values('10085','10083','10113','0','','1479017709','1','1','0');");
E_D("replace into `dna_course_topic` values('10086','10083','10093','0','','1479017716','1','0','0');");
E_D("replace into `dna_course_topic` values('10087','10083','10117','4','','1479017810','1','0','0');");
E_D("replace into `dna_course_topic` values('10088','10025','10020','0','','1479130352','1','1','0');");
E_D("replace into `dna_course_topic` values('10089','10083','10092','0','','1481372991','1','0','0');");
E_D("replace into `dna_course_topic` values('10090','10083','10133','3','','1481447300','1','0','0');");
E_D("replace into `dna_course_topic` values('10091','10025','10133','1','','1481447453','1','0','0');");
E_D("replace into `dna_course_topic` values('10092','10135','10134','0','','1481451984','1','0','0');");

require("../../inc/footer.php");
?>