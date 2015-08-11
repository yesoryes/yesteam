CREATE TABLE IF NOT EXISTS `user_devices` (
  `user_id`              INT          NOT NULL,
  `install_id`           VARCHAR(100) NOT NULL,
  `crea_date`            DATETIME     NOT NULL,
  `la_date`              DATETIME     NOT NULL,
  `os`                   VARCHAR(10)  NOT NULL,
  `os_ver`               VARCHAR(10)  NOT NULL,
  `wp_push_flag`         SMALLINT     NOT NULL,
  `ap_push_flag`         SMALLINT     NOT NULL,
  `ios_push_flag`        SMALLINT     NOT NULL,
  `wp_channel_uri`       VARCHAR(255) NOT NULL,
  `gcm_registration_id`  VARCHAR(255) NOT NULL,
  `ios_token`            VARCHAR(255) NOT NULL,
  `push_notification_id` VARCHAR(255) NOT NULL,
  `download_src`         VARCHAR(32)  NOT NULL,
  `device_ip`            VARCHAR(32)  NOT NULL,
  PRIMARY KEY (`user_id`, `install_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 4;
