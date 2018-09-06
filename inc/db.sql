
CREATE TABLE `la_base` (
`la_id` char(64) NOT NULL DEFAULT '',
  `type` tinyint(3) NOT NULL COMMENT '1:上传文件，2：短信，3：邮箱',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`la_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `log_sms` (
  `log_id` char(64) NOT NULL DEFAULT '',
  `la_id` char(64) NOT NULL DEFAULT '',
  `action_id` char(64) NOT NULL DEFAULT '',
  `phone` varchar (127) NOT NULL DEFAULT '',
  `status` tinyint(1) DEFAULT 0,
  `ctime` bigint(20) DEFAULT 0,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `log_email` (
  `log_id` char(64) NOT NULL DEFAULT '',
  `la_id` char(64) NOT NULL DEFAULT '',
  `action_id` char(64) NOT NULL DEFAULT '',
  `email` varchar (127) NOT NULL DEFAULT '',
  `status` tinyint(1) DEFAULT 0,
  `ctime` bigint(20) DEFAULT 0,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `log_upload` (
  `log_id` char(64) NOT NULL DEFAULT '',
  `la_id` char(64) NOT NULL DEFAULT '',
  `action_id` char(64) NOT NULL DEFAULT '',
  `url` varchar (255) NOT NULL DEFAULT '',
  `status` tinyint(1) DEFAULT 0,
  `ctime` bigint(20) DEFAULT 0,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;