DROP TABLE product_mst;
CREATE TABLE product_mst
(
  product_id     BIGINT       NOT NULL AUTO_INCREMENT,
  product_name   VARCHAR(150) NOT NULL,
  product_key    VARCHAR(100)          DEFAULT '',
  product_desc   TEXT,
  product_points DOUBLE                DEFAULT 0,
  cate_id        INTEGER               DEFAULT 0,
  city_id        INTEGER               DEFAULT 0,
  flag_charity   SMALLINT              DEFAULT 0,
  flag_active    SMALLINT              DEFAULT 1,
  flag_dele      SMALLINT              DEFAULT 0,
  crea_date      TIMESTAMP             DEFAULT current_timestamp,
  modi_date      TIMESTAMP,
  CONSTRAINT product_mst_pkey PRIMARY KEY (product_id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;