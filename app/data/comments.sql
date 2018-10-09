DROP TABLE IF EXISTS Comments;

CREATE TABLE Comments (
     id INT NOT NULL AUTO_INCREMENT,
     comment CHAR(100) NOT NULL,
     PRIMARY KEY (id)
);

INSERT INTO Comments (id, comment) VALUES
    (1 ,'Hello World!'),(2 ,'Today is Monday.'),(3 ,'Data is fun.'),
    (4 ,'IU is a great school.'),(5,'It is fall.'),(6 ,'Next year is 2019!');
