<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_open_config`;");
E_C("CREATE TABLE `dna_open_config` (
  `id` int(10) NOT NULL DEFAULT '0' COMMENT 'ID',
  `key` varchar(250) NOT NULL DEFAULT '' COMMENT 'KEY',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '接口类型',
  `appid` varchar(250) NOT NULL DEFAULT '' COMMENT 'AppId',
  `appsecret` varchar(250) NOT NULL DEFAULT '' COMMENT 'AppSecret',
  `access_token` varchar(250) NOT NULL DEFAULT '' COMMENT '凭证',
  `access_token_expires_in` int(10) NOT NULL DEFAULT '0' COMMENT '凭证有效时间',
  `access_token_add_time` int(10) NOT NULL DEFAULT '0' COMMENT '凭证获取时间',
  `jsapi_ticket` varchar(250) NOT NULL DEFAULT '' COMMENT '票据',
  `jsapi_ticket_expires_in` int(10) NOT NULL DEFAULT '0' COMMENT '票据有效时间',
  `jsapi_ticket_add_time` int(10) NOT NULL DEFAULT '0' COMMENT '票据获取时间',
  `apiclient_cert` varchar(250) NOT NULL DEFAULT '' COMMENT '证书文件Cert',
  `apiclient_key` varchar(250) NOT NULL DEFAULT '' COMMENT '证书文件Key',
  `local_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '线下支付开关',
  `money_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '余额支付开关',
  `tenpay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '微信支付开关',
  `tenpay` varchar(250) NOT NULL DEFAULT '' COMMENT '微信支付',
  `tenpay_mch_id` varchar(250) NOT NULL DEFAULT '' COMMENT '微信支付商户号',
  `tenpay_key` varchar(250) NOT NULL DEFAULT '' COMMENT '微信支付KEY',
  `alipay_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付宝开关',
  `alipay` varchar(250) NOT NULL DEFAULT '' COMMENT '支付宝',
  `alipay_seller_email` varchar(250) NOT NULL DEFAULT '' COMMENT '支付宝账号',
  `alipay_pid` varchar(250) NOT NULL DEFAULT '' COMMENT '合作者身份（PID）',
  `alipay_key` varchar(250) NOT NULL DEFAULT '' COMMENT '安全校验码（Key）',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='开放平台配置表'");

require("../../inc/footer.php");
?>