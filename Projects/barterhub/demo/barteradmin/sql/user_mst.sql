DROP TABLE user_mst;
CREATE TABLE user_mst
(
  user_id              BIGINT       NOT NULL AUTO_INCREMENT,
  user_email           VARCHAR(150) NOT NULL,
  user_fname           VARCHAR(100)          DEFAULT '',
  user_lname           VARCHAR(100)          DEFAULT '',
  user_pass            VARCHAR(100)          DEFAULT '',
  user_sex             SMALLINT              DEFAULT 0,
  user_mobile_isd      VARCHAR(100)          DEFAULT '',
  user_mobile_no       VARCHAR(100)          DEFAULT '',
  user_country_code    VARCHAR(100)          DEFAULT 'IN',
  user_postal_code     VARCHAR(15)           DEFAULT '',
  user_address         VARCHAR(100)          DEFAULT '',
  user_tz              VARCHAR(30)           DEFAULT 'UTC',
  user_image           VARCHAR(255)          DEFAULT '',
  user_key             VARCHAR(100)          DEFAULT '',
  user_reg_type        SMALLINT              DEFAULT 0,
  user_preferred_area INTEGER DEFAULT 0,
  flag_native_signup   SMALLINT              DEFAULT 0,
  flag_email_verified  SMALLINT              DEFAULT 0,
  flag_mobile_verified SMALLINT              DEFAULT 0,
  flag_invited_friends SMALLINT              DEFAULT 0,
  flag_shared          SMALLINT              DEFAULT 0,
  flag_active          SMALLINT              DEFAULT 1,
  flag_dele            SMALLINT              DEFAULT 0,
  crea_date            TIMESTAMP             DEFAULT current_timestamp,
  modi_date            TIMESTAMP,
  crea_ip              VARCHAR(100)          DEFAULT '',
  user_src             VARCHAR(100)          DEFAULT '',
  user_temp_pass       VARCHAR(100)          DEFAULT '',
  CONSTRAINT user_mst_pkey PRIMARY KEY (user_id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;