create database als_dev character set utf8;
use als_dev;
CREATE TABLE tbl_book (
  bid int(11) NOT NULL AUTO_INCREMENT,
  b_name varchar(128) DEFAULT NULL,
  author varchar(128) DEFAULT NULL,
  country varchar(32) DEFAULT NULL,
  age varchar(32) DEFAULT NULL,
  pub_date date DEFAULT NULL,
  pub_house varchar(128) DEFAULT NULL,
  is_single tinyint(1) DEFAULT NULL,
  serial_no decimal(10,0) DEFAULT NULL,
  type varchar(4) DEFAULT NULL,
  rectime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (bid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table tbl_book_type (
  t_no varchar(4) not null,
  description varchar(128),
  PRIMARY KEY (t_no)
) ENGINE=InnoDB default CHARSET=utf8;