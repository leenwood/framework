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
    homeSqueare decimal (10,2) not null,
    roots int(6) not null
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
    prevValue decimal(8,3) not null,
    datestamp date not null
    ) ENGINE=InnoDB;

ALTER TABLE indication add CONSTRAINT indVcounters_FK
FOREIGN KEY indication(idCount)
REFERENCES counters(idCount);

ALTER TABLE counters add CONSTRAINT newStyleCodeRakaMakaFo_FK
    FOREIGN KEY counters(pAccount)
    REFERENCES users(uid);

INSERT INTO `users` (`uid`, `lastname`, `surname`, `password`, `homeSqueare`) VALUES (NULL, 'George', 'Ershov', '123', '8.32');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES ('1', '1', 'GVS');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES ('2', '1', 'HVS');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES ('3', '1', 'ELE');
INSERT INTO `indication` (`id`, `idCount`, `curValue`, `prevValue`) VALUES ('2', '2', '30', '10');

ALTER TABLE users ADD COLUMN roots INT(5);

INSERT INTO `users` (`uid`, `lastname`, `surname`, `password`, `homeSqueare`, `roots`) VALUES (NULL, 'George', 'Ershov', '123', '8.32', '2');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES (NULL, '2', 'GVS');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES (NULL, '2', 'HVS');
INSERT INTO `counters` (`idCount`, `pAccount`, `typeCounters`) VALUES (NULL, '2', 'ELE');