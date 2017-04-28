<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_config`;");
E_C("CREATE TABLE `dna_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `key` varchar(64) NOT NULL DEFAULT '' COMMENT '键',
  `value` text NOT NULL COMMENT '值',
  `data` text NOT NULL COMMENT '数据',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10099 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='配置表'");
E_D("replace into `dna_config` values('10001',0xe7b3bbe7bb9fe78ab6e68081,'2',0x776562537461747573,0x31,0xe585b3e997ad2ce5bc80e590af,'1','0','1');");
E_D("replace into `dna_config` values('10002',0xe585b3e997ade68f90e7a4ba,'3',0x636c6f7365526561736f6e,0xe5afb9e4b88de8b5b7efbc81e8afb7e7a88de58099e8aebfe997aeefbc8ce7b3bbe7bb9fe58d87e7baa7e4b8ade38082e38082e38082,'','1','0','1');");
E_D("replace into `dna_config` values('10003',0xe5ba95e983a8,'1',0x666f6f746572,0xe6aca2e8bf8ee6b7bbe58aa05151e7bea4efbc9a3132333435363738,'','1','0','1');");
E_D("replace into `dna_config` values('10004',0xe7ab99e782b9e5908de7a7b0,'1',0x736974654e616d65,0x444e41,0x31,'1','0','1');");
E_D("replace into `dna_config` values('10005',0x53454fe585b3e994aee5ad97,'1',0x6b6579776f726473,0x444e41,0x31,'1','0','1');");
E_D("replace into `dna_config` values('10006',0x53454fe68f8fe8bfb0,'1',0x6465736372697074696f6e,0x444e41e698af2e2e2e,'','1','0','1');");
E_D("replace into `dna_config` values('10007',0xe5908ee58fb0e5908de7a7b0,'1',0x6261636b656e644e616d65,0x444e41e5908ee58fb0e7aea1e79086e7b3bbe7bb9f,'','1','0','1');");
E_D("replace into `dna_config` values('10010',0xe7bb9fe8aea1e4bba3e7a081,'3',0x7374617473436f6465,0x31,'','1','0','1');");
E_D("replace into `dna_config` values('10011',0xe697b6e58cba,'1',0x74696d655a6f6e65,0x2b38,'','1','0','1');");
E_D("replace into `dna_config` values('10012',0xe697a5e69c9fe6a0bce5bc8fe58c96,'1',0x74696d65466f726d6174,0x592d6d2d64,'','1','0','1');");
E_D("replace into `dna_config` values('10016',0xe88194e7b3bb5151,'1',0x7171,0x333632363838343839,'','1','0','1');");
E_D("replace into `dna_config` values('10017',0xe78988e69d83,'1',0x636f70797269676874,0x436f707972696768742026636f70793b20323031302d32303136204c616e676a692e636f6d2c20496e632e,'','1','0','1');");
E_D("replace into `dna_config` values('10018',0xe5ba95e983a8e59cb0e59d80,'1',0x666f6f74657241646472657373,0xe59b9be5b79de68890e983bde6ada6e4beafe58cbae4bdb3e781b5e8b7af31e58fb7,'','1','0','1');");
E_D("replace into `dna_config` values('10019',0xe5a487e6a188e58fb7,'1',0x696370,0xe89c80494350e5a4873135303033393536e58fb7e4baace585ace7bd91e5ae89e5a4873131303130383032303137363131e58fb7207c20e4baac494350e5a4873132303437353530e58fb72d31,'','1','0','1');");
E_D("replace into `dna_config` values('10020',0xe59cb0e59d80,'3',0x61646472657373,0xe68890e983bde9ab98e696b0e58cbae8bdafe4bbb6e59bad44e58cba,'','1','0','1');");
E_D("replace into `dna_config` values('10021',0xe5baa7e69cba,'1',0x74656c70686f6e65,0x3430302d3132332d34353637,'','1','0','1');");
E_D("replace into `dna_config` values('10022',0xe88194e7b3bbe6898be69cba,'1',0x6d6f62696c65,0x3133353638393631343136,'','1','0','1');");
E_D("replace into `dna_config` values('10023',0xe88194e7b3bbe4baba,'1',0x636f6e74616374,0xe59490e6988e,'','1','0','1');");
E_D("replace into `dna_config` values('10024',0xe4bca0e79c9f,'1',0x666178,0x3032382d3636313130353130,'','1','0','1');");
E_D("replace into `dna_config` values('10025',0x452d4d61696c,'1',0x656d61696c,0x6b656675406e6f6f6f79612e636f6d,'','1','0','1');");
E_D("replace into `dna_config` values('10026',0xe982aee7bc96,'1',0x7a6970436f6465,0x363130303030,'','1','0','1');");
E_D("replace into `dna_config` values('10027',0xe4bfa1e681af,'1',0x696e74726f,0xe7ae80e4bb8be4bfa1e681af,'','1','0','1');");
E_D("replace into `dna_config` values('10028',0xe794b5e5ad90e982aee7aeb1e7aea1e79086e59198,'1',0x656d61696c55736572,0x6e6f2d7265706c79406974626f6c652e636f6d,'','1','0','1');");
E_D("replace into `dna_config` values('10029',0xe794b5e5ad90e982aee7aeb1e7aea1e79086e59198e8b4a6e58fb7,'1',0x656d61696c4163636f756e74,0x6e6f2d7265706c79406974626f6c652e636f6d,'','1','0','1');");
E_D("replace into `dna_config` values('10030',0xe794b5e5ad90e982aee7aeb1e7aea1e79086e59198e5af86e7a081,'1',0x656d61696c50617373776f7264,0x74616e676e6979757169,'','1','0','1');");
E_D("replace into `dna_config` values('10031',0xe794b5e5ad90e982aee7aeb1e4b8bbe69cba,'1',0x656d61696c486f7374,0x736d74702e796d2e3136332e636f6d,'','1','0','1');");
E_D("replace into `dna_config` values('10032',0xe794b5e5ad90e982aee7aeb1e4b8bbe69cbae7abafe58fa3,'1',0x656d61696c506f7274,0x3235,'','1','0','1');");
E_D("replace into `dna_config` values('10037',0xe5a4b4e983a8e4bfa1e681af,'1',0x68656164496e666f,'','','1','0','1');");
E_D("replace into `dna_config` values('10039',0xe7bd91e7ab99e5ad97e4bd93,'3',0x666f6e74,0x274d6963726f736f6674205961686569272c205461686f6d612c2048656c7665746963612c2053696d53756e2c2073616e732d7365726966,'','1','0','1');");
E_D("replace into `dna_config` values('10079',0xe9a1b5e99da2e5a4a7e5b08f4e616d65,'1',0x7061676553697a65506172616d,0x7061676553697a65,'','1','0','1');");
E_D("replace into `dna_config` values('10080',0xe5bd93e5898de9a1b5e7a081,'1',0x70616765506172616d,0x70616765,'','1','0','1');");
E_D("replace into `dna_config` values('10081',0xe9bb98e8aea4e58886e9a1b5e5a4a7e5b08f,'1',0x7061676553697a65,0x3135,'','1','0','1');");
E_D("replace into `dna_config` values('10082',0xe5898de58fb0e9bb98e8aea4e58886e9a1b5e5a4a7e5b08f,'1',0x66726f6e74656e645061676553697a65,0x3130,'','1','0','1');");
E_D("replace into `dna_config` values('10083',0xe794b5e5ad90e982aee7aeb1e8aea4e8af81,'1',0x656d61696c41757468,0x3235,'','1','0','1');");
E_D("replace into `dna_config` values('10084',0xe79fade4bfa1e68ea5e58fa3e8b4a6e58fb7,'1',0x736d734163636f756e74,0x4a534d3431343637,'','1','0','1');");
E_D("replace into `dna_config` values('10085',0xe79fade4bfa1e68ea5e58fa3e5af86e7a081,'1',0x736d7350617373776f7264,0x6f30713765767770,'','1','0','1');");
E_D("replace into `dna_config` values('10086',0xe79fade4bfa1e68ea5e58fa34b6579,'1',0x736d734b6579,0x77736c776d67786137737671,'','1','0','1');");
E_D("replace into `dna_config` values('10087',0xe79fade4bfa1e68ea5e58fa3e6a8a1e69dbf4944,'1',0x736d7354656d706964,0x4a534d34313436372d30303031,'','1','0','1');");
E_D("replace into `dna_config` values('10088',0xe79fade4bfa1e68ea5e58fa3e59cb0e59d80,'1',0x736d7355726c,0x687474703a2f2f3131322e37342e37362e3138363a383033302f736572766963652f68747470536572766963652f68747470496e746572666163652e646f3f6d6574686f643d73656e644d7367,'','1','0','1');");
E_D("replace into `dna_config` values('10089',0xe79fade4bfa1e68ea5e58fa3e4bfa1e681afe7b1bbe59e8b,'1',0x736d734d736754797065,0x32,'','1','0','1');");
E_D("replace into `dna_config` values('10090',0x50696e672b2b205465737420536563726574204b6579,'1',0x70696e677070546573745365637265744b6579,0x736b5f746573745f4c4b57316d396d31617a544f504743303830436d48383834,'','1','0','1');");
E_D("replace into `dna_config` values('10091',0x50696e672b2b204c69766520536563726574204b6579,'1',0x70696e6770704c6976655365637265744b6579,0x736b5f6c6976655f57315334344f5766506d6a50304343696235665443796a44,'','1','0','1');");
E_D("replace into `dna_config` values('10092',0x50696e672b2b20417070204944,'1',0x70696e6770704170704964,0x6170705f474f6d357931724c34757a395465766a,'','1','0','1');");
E_D("replace into `dna_config` values('10093',0xe8b4a7e5b881,'1',0x63757272656e6379,0x636e79,'','1','0','1');");
E_D("replace into `dna_config` values('10094',0xe8b4a7e5b881e7aca6e58fb7,'1',0x63757272656e637953796d626f6c,0xefbfa5,'','1','0','1');");
E_D("replace into `dna_config` values('10095',0xe585a5e4bc9ae8afbee7a88b,'1',0x6a6f696e436f757273654964,0x3130303235,'','1','0','0');");
E_D("replace into `dna_config` values('10096',0x47756964655fe5bc95e5afbce9a1b5e68c89e992aee69687e5ad97e5928ce8beb9e6a186e9a29ce889b228e9bb98e8aea42344393534334629,'1',0x6775696465427574746f6e436f6c6f72,0x23464646464646,'','1','0','0');");
E_D("replace into `dna_config` values('10097',0x47756964655fe9a1b5e99da2e68c87e7a4bae599a8e98089e4b8ade889b228e9bb98e8aea42344393534334629,'1',0x677569646550616765496e64696361746f72436f6c6f72,0x23443935343346,'','1','0','0');");
E_D("replace into `dna_config` values('10098',0x47756964655fe9a1b5e99da2e68c87e7a4bae599a8e5ba95e889b228e9bb98e8aea42346464646464629,'1',0x677569646550616765496e64696361746f7254696e74436f6c6f72,0x23464646464646,'','1','0','0');");

require("../../inc/footer.php");
?>