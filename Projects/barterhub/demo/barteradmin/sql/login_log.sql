CREATE TABLE login_log
(
  log_id        BIGINT       NOT NULL AUTO_INCREMENT,
  user_id       BIGINT,
  user_email    VARCHAR(150) NOT NULL,
  user_key      VARCHAR(150) NOT NULL,
  login_session VARCHAR(150) NOT NULL,
  install_id    VARCHAR(150) NOT NULL,
  login_ip      VARCHAR(32)  NOT NULL,
  login_date    DATETIME,
  la_time       DATETIME,
  lo_time       DATETIME,
  CONSTRAINT login_log_pkey PRIMARY KEY (log_id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;