-- Active: 1685438389278@@127.0.0.1@8889@LifeStyle

Drop TABLE IF EXISTS commentaire;

Drop TABLE IF EXISTS article;

Drop TABLE IF EXISTS category;

CREATE TABLE
    category (
        id INT PRIMARY KEY AUTO_INCREMENT,
        lable VARCHAR(128)
    );

CREATE TABLE
    article (
        id INT PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL,
        picname varchar(50) NOT NULL,
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
VALUES
('Music'), ('Photographie'), ('life Style');

INSERT INTO
    article(titre, picname, contenu, author)
VALUES
(
        "Influence de la musique sur l'esprit et le corps  ",
        "effet-musique-630x200.jpg",
        "On ne sort pas de cette vérité : la musique nous fait du bien. Chacun d'entre nous peut la confirmer, mais en plus, il y a des études scientifiques fiables qui le prouvent. Ces études ont par exemple montré que le fait d'écouter de la  musique une fois qu'on est allongé ",
        'sara ESMIT'
    ), (
        "Aimer la musique qui nous fait du bien",
        "aimer-la-musique-630x200.jpeg",
        "On peut être très mauvais chanteur, être peu gâté en termes de puissance vocale etc.mais cela n'empêche pas d'aimer la musique. Naturellement, il y a des styles musicaux qui peuvent être néfastes, tels que le heavy metal et ses danses cérébrales nuisibles.",
        "Alex Armand"
    ), (
        "Avantages d'apprendre un instrument de musique",
        "avantage-instru-630x200.png",
        "On peut être très mauvais chanteur, être peu gâté en termes de puissance vocale etc.mais cela n'empêche pas d'aimer la musique. Naturellement, il y a des styles musicaux qui peuvent être néfastes, tels que le heavy metal et .",
        "Alex Armand"
    ), (
        "La guitare comme instrument de séduction",
        "guitar-630x200.jpg",
        "On peut être très mauvais chanteur, être peu gâté en termes de puissance vocale etc.mais cela n'empêche pas d'aimer la musique. Naturellement, il y a des styles musicaux qui peuvent être néfastes, tels que le heavy metal et .",
        "Alex Armand"
    ), (
        "Les moyens d'pprendre le piano pour l'adulte",
        "apprendre-piano-630x200.jpeg",
        "On peut être très mauvais chanteur, être peu gâté en termes de puissance vocale etc.mais cela n'empêche pas d'aimer la musique. Naturellement, il y a des styles musicaux qui peuvent être néfastes, tels que le heavy metal et .",
        "Alex Armand"
    ), (
        "Comment choisir une batterie électronique ?",
        "batterie-electronique-0-630x200.jpg",
        "On peut être très mauvais chanteur, être peu gâté en termes de puissance vocale etc.mais cela n'empêche pas d'aimer la musique. Naturellement, il y a des styles musicaux qui peuvent être néfastes, tels que le heavy metal et .",
        "Alex Armand"
    );

INSERT INTO commentaire(note,description,nome) VALUES( "2","love this","sara");