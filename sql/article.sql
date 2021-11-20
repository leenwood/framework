CREATE TABLE  IF NOT EXISTS articles (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar (255) not null,
    body text
) ENGINE=InnoDB;

INSERT INTO articles (name, body) VALUES ('Hello', 'Hello world long long page...');
INSERT INTO articles (name, body) VALUES ('World', 'World hello extra long long page...');
INSERT INTO articles (name, body) VALUES ('Test', 'TestTest');

CREATE TABLE  IF NOT EXISTS users (
    uid INT (6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname varchar (255) not null,
    surname varchar (255) not null,
    password varchar (255) not null,
    homeSqueare decimal (10,2) not null
    ) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS counters (
    idCount INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pAccount int (6),
    typeCounters varchar(255) not null
    ) ENGINE=InnoDB;

CREATE TABLE  IF NOT EXISTS indication (
    id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idCount int (6),
    curValue decimal(8,3) not null,
    prevValue decimal(8,3) not null
    ) ENGINE=InnoDB;

ALTER TABLE indication add CONSTRAINT indVcounters_FK
FOREIGN KEY indication(idCount)
REFERENCES counters(idCount);

ALTER TABLE counters add CONSTRAINT newStyleCodeRakaMakaFo_FK
    FOREIGN KEY counters(pAccount)
    REFERENCES users(uid);