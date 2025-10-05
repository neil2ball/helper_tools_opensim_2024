CREATE TABLE wi_economy_money (
   id INT AUTO_INCREMENT NOT NULL,
   CentsPerMoneyUnit INT NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE = InnoDB ROW_FORMAT = DEFAULT;

INSERT INTO wi_economy_money (id,CentsPerMoneyUnit) values (1,0.5);
