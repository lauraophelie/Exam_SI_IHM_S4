---------------------------------- 10-07-2023 ------------------------------------------

CREATE ROLE regime LOGIN PASSWORD 'regime';
CREATE DATABASE regime;

ALTER DATABASE regime OWNER TO regime;

\c regime regime;


--------------------------- admin --------------------------------------

CREATE SEQUENCE admin_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS administrateur(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('ADM', nextval('admin_id_seq')),
    nom VARCHAR(75),
    mdp VARCHAR(10)
);

INSERT INTO administrateur(nom, mdp) VALUES('Johan', '0000'),
                                            ('Erica', '01234');

--------------------------- utilisateur --------------------------------------------

CREATE SEQUENCE utilisateur_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS utilisateur(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('UTI', nextval('utilisateur_id_seq')),
    nom VARCHAR(75),
    email VARCHAR(75),
    mdp VARCHAR(10)
);

CREATE TYPE genre AS ENUM('F', 'M');

CREATE TABLE IF NOT EXISTS details_utilisateur(
    utilisateur VARCHAR(8) REFERENCES utilisateur(id),
    date_naissance DATE,
    genre genre,
    taille DECIMAL,
    poids DECIMAL
);

INSERT INTO utilisateur(nom, email, mdp) VALUES('Jean', 'jeans@gmail.com', '012345'),
                                                ('Aline', 'Aline@gmail.com', '012345'),
                                                ('John Doe', 'JohnDoe@gmail.com', '012345'),
                                                ('Annie', 'annie@outlook.fr', '012345'),
                                                ('Andy', 'andry@gmail.com', '012345');

INSERT INTO details_utilisateur(utilisateur, date_naissance, genre, taille, poids) VALUES
                                ('UTI1', '1998-05-12', 'M', 1.70, 45),
                                ('UTI2', '1999-01-05', 'F', 1.65, 60),
                                ('UTI3', '2000-01-15', 'M', 1.75, 75),
                                ('UTI4', '2001-12-25', 'F', 1.73, 55),
                                ('UTI5', '1997-04-14', 'M', 1.80, 60);

----------------------------- vue utilisateur --------------------------------------

SELECT
    u.id as utilisateur,
    u.nom,
    u.email,
    u.mdp as mot_de_passe,
    d.date_naissance,
    d.genre,
    d.taille,
    d.poids
FROM utilisateur u
JOIN details_utilisateur d ON u.id = d.utilisateur;

CREATE OR REPLACE VIEW v_utilisateur AS(
    SELECT
        u.id as utilisateur,
        u.nom,
        u.email,
        u.mdp as mot_de_passe,
        d.date_naissance,
        d.genre,
        d.taille,
        d.poids
    FROM utilisateur u
    JOIN details_utilisateur d ON u.id = d.utilisateur
);


--------------------------------------- plat --------------------------------------------------------

CREATE SEQUENCE type_plat_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS type_plat(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('TYP', nextval('type_plat_id_seq')),
    designation VARCHAR(75)
);

INSERT INTO type_plat(designation) VALUES('Petit-déjeuner'),
                                            ('Déjeuner'),
                                            ('Collation'),
                                            ('Dîner');

CREATE SEQUENCE plat_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS plat(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('PLA', nextval('plat_id_seq')),
    designation VARCHAR(75),
    type_plat VARCHAR(8) REFERENCES type_plat(id),
    image_path VARCHAR(50)
);