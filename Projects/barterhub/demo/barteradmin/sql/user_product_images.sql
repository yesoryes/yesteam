DROP TABLE product_img_mst;
CREATE TABLE product_img_mst
(
  img_id      BIGINT       NOT NULL AUTO_INCREMENT,
  product_id  BIGINT,
  img_name    VARCHAR(150) NOT NULL,
  flag_active SMALLINT              DEFAULT 1,
  flag_dele   SMALLINT              DEFAULT 0,
  crea_date   TIMESTAMP             DEFAULT current_timestamp,
  modi_date   TIMESTAMP,
  CONSTRAINT product_img_mst_pkey PRIMARY KEY (img_id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;