-- Active: 1685438389278@@127.0.0.1@8889@LifeStyle



Drop TABLE IF EXISTS category;
Drop TABLE IF EXISTS article;

Drop TABLE IF EXISTS commentaire;

CREATE TABLE
    category (
        id INT PRIMARY KEY AUTO_INCREMENT,
        lable VARCHAR(128)
    );

CREATE TABLE
    article (
        id INT PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL,
        contenu TEXT,
        author VARCHAR(128) NOT NULL,
       
        datepub DATE,
        id_category INT,
        Foreign Key (id_category) REFERENCES category(id)
    );

CREATE TABLE
    commentaire(
        id INT PRIMARY KEY AUTO_INCREMENT,
        note INT NOT NULL,
        description TEXT,
        nome VARCHAR(255),
        date DATE,
        id_article INT,
        Foreign Key (id_article) REFERENCES article(id)
    );


    INSERT INTO 
       category(lable)
       VALUES('Music'),('Photographie'),('life Style');
