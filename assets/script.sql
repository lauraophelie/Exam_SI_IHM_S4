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
    email VARCHAR(75),
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

CREATE TABLE IF NOT EXISTS proportion_plat(
    plat VARCHAR(8) REFERENCES plat(id),
    viande DECIMAL DEFAULT 0,
    legume DECIMAL DEFAULT 0,
    feculent DECIMAL DEFAULT 0,
    fruit DECIMAL DEFAULT 0,
    huile DECIMAL DEFAULT 0,
    sucre DECIMAL DEFAULT 0
);

SELECT
    p.id as plat,
    p.designation as nom_plat,
    t.designation as type_plat,
    p.image_path as photo_plat
FROM plat p
JOIN type_plat t ON p.type_plat = t.id;

CREATE OR REPLACE VIEW v_plat AS(
    SELECT
        p.id as plat,
        p.designation as nom_plat,
        t.designation as type_plat,
        p.image_path as photo_plat
    FROM plat p
    JOIN type_plat t ON p.type_plat = t.id
);

INSERT INTO plat(designation, type_plat, image_path) VALUES
                ('Macaroni & Tomates fraiche', 'TYP2', 'images/im1.jpg'),
                ('Tartines', 'TYP1', 'images/im2.jpg'),
                ('Macaronni', 'TYP2', 'images/im3.jpg'),
                ('Smooothies aux fruits', 'TYP3', 'images/im4.jpg'),
                ('Céréales aux fruits', 'TYP3', 'images/im5.jpg'),
                ('Macaroni à la sauce', 'TYP4', 'images/im6.jpg'),
                ('Barquette de fruits', 'TYP3', 'images/im7.jpg'),
                ('Fruits & Miel', 'TYP3', 'images/im8.jpg'),
                ('Smoothies', 'TYP1', 'images/im9.jpg'),
                ('Céréales au yaourt et aux fruits', 'TYP1', 'images/im10.jpg'),
                ('Oeuf, Poulet, Fromage', 'TYP4', 'images/im11.jpg'),
                ('Tourte aux légumes', 'TYP2', 'images/im12.jpg'),
                ('Poulet grillé et légumes', 'TYP4', 'images/im14.jpg');

INSERT INTO proportion_plat(plat, viande, legume, feculent, fruit, huile, sucre) VALUES
                            ('PLA1', 0, 50, 25, 0, 25, 0),
                            ('PLA2', 0, 0, 50, 45, 0, 5),
                            ('PLA3', 0, 45, 50, 0, 5, 0),
                            ('PLA4', 0, 0, 0, 70, 0, 30),
                            ('PLA5', 0, 0, 25, 50, 0, 25),
                            ('PLA6', 0, 0, 75, 0, 25, 0),
                            ('PLA7', 0, 0, 0, 85, 0, 15),
                            ('PLA8', 0, 0, 0, 85, 0, 15),
                            ('PLA9', 0, 0, 0, 85, 0, 15),
                            ('PLA10', 0, 0, 0, 85, 0, 15),
                            ('PLA11', 25, 0, 25, 0, 5, 45),
                            ('PLA12', 5, 45, 25, 0, 25, 0),
                            ('PLA13', 45, 45, 0, 0, 10, 0);

------------------------------------- sport ----------------------------------------------


CREATE SEQUENCE sport_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS sport(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('SPO', nextval('sport_id_seq')),
    designation VARCHAR(75)
);

INSERT INTO sport(designation) VALUES('Marche à pieds'),
                                    ('Natation'),
                                    ('Course à pieds'),
                                    ('Pilates'),
                                    ('Musculation');


-------------------------------------- objectifs ----------------------------------------------

CREATE SEQUENCE objectif_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS objectif(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('OBJ', nextval('objectif_id_seq')),
    designation VARCHAR(75)
);

INSERT INTO objectif(designation) VALUES('Augmenter son poids'),
                                        ('Réduire son poids');

-------------------------------------- régime -------------------------------------------------

CREATE SEQUENCE regime_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS regime(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('REG', nextval('regime_id_seq')),
    designation VARCHAR(75),
    duree INTEGER DEFAULT 1,
    tarif DECIMAL NOT NULL
);

INSERT INTO regime(designation, duree, tarif) VALUES('Regime été', 15, 250000),
                                                    ('Regime intensif', 30, 500000),
                                                    ('Regime light', 15, 350000);

INSERT INTO regime(designation, duree, tarif) VALUES('Regime hiver', 15, 150000),
                                                    ('Regime intensif été', 15, 600000);


CREATE TABLE IF NOT EXISTS regime_plat(
    regime VARCHAR(8) REFERENCES regime(id),
    plat VARCHAR(8) REFERENCES plat(id)
);

INSERT INTO regime_plat(regime, plat) VALUES('REG1', 'PLA1'),
                                            ('REG1', 'PLA2'),
                                            ('REG1', 'PLA8'),
                                            ('REG1', 'PLA13');

INSERT INTO regime_plat(regime, plat) VALUES('REG1', 'PLA11'),
                                            ('REG1', 'PLA9'),
                                            ('REG1', 'PLA7'),
                                            ('REG1', 'PLA10');

INSERT INTO regime_plat(regime, plat) VALUES('REG2', 'PLA3'),
                                            ('REG2', 'PLA4'),
                                            ('REG2', 'PLA5'),
                                            ('REG2', 'PLA6');

INSERT INTO regime_plat(regime, plat) VALUES('REG2', 'PLA13'),
                                            ('REG2', 'PLA2'),
                                            ('REG2', 'PLA9'),
                                            ('REG2', 'PLA8');

INSERT INTO regime_plat(regime, plat) VALUES('REG3', 'PLA1'),
                                            ('REG3', 'PLA6'),
                                            ('REG3', 'PLA8'),
                                            ('REG3', 'PLA5');

INSERT INTO regime_plat(regime, plat) VALUES('REG4', 'PLA10'),
                                            ('REG4', 'PLA8'),
                                            ('REG4', 'PLA1'),
                                            ('REG4', 'PLA5');

INSERT INTO regime_plat(regime, plat) VALUES('REG5', 'PLA11'),
                                            ('REG5', 'PLA6'),
                                            ('REG5', 'PLA8'),
                                            ('REG5', 'PLA5');

INSERT INTO regime_plat(regime, plat) VALUES('REG5', 'PLA10'),
                                            ('REG5', 'PLA7'),
                                            ('REG5', 'PLA12'),
                                            ('REG5', 'PLA5');

CREATE TABLE IF NOT EXISTS regime_sport(
    regime VARCHAR(8) REFERENCES regime(id),
    sport VARCHAR(8) REFERENCES sport(id)
);

INSERT INTO regime_sport(regime, sport) VALUES('REG1', 'SPO1'),
                                                ('REG1', 'SPO2'),
                                                ('REG2', 'SPO3'),
                                                ('REG3', 'SPO4'),
                                                ('REG3', 'SPO5'),
                                                ('REG4', 'SPO2'),
                                                ('REG5', 'SPO1'),
                                                ('REG5', 'SPO2');

CREATE TABLE IF NOT EXISTS objectif_regime(
    regime VARCHAR(8) REFERENCES regime(id),
    objectif VARCHAR(8) REFERENCES objectif(id)
);

INSERT INTO objectif_regime(regime, objectif) VALUES('REG1', 'OBJ1'),
                                                    ('REG2', 'OBJ2'),
                                                    ('REG3', 'OBJ1'),
                                                    ('REG4', 'OBJ2'),
                                                    ('REG5', 'OBJ1');

--------------------------------

ALTER TABLE regime DROP COLUMN duree;
ALTER TABLE regime DROP COLUMN tarif;

--------------------------------

CREATE TABLE IF NOT EXISTS tarifs_regime(
    regime VARCHAR(8) REFERENCES regime(id),
    duree INTEGER,
    tarif DECIMAL,
    poids DECIMAL
);

INSERT INTO tarifs_regime(regime, duree, tarif, poids) VALUES
                        ('REG1', 1, 150000,0.3),
                        ('REG1', 5, 300000,0.7),
                        ('REG1', 15, 450000,4),
                        ('REG1', 30, 650000,10);

INSERT INTO tarifs_regime(regime, duree, tarif, poids) VALUES
                        ('REG2', 5, 250000,2),
                        ('REG2', 10, 400000,4),
                        ('REG2', 15, 450000,11),
                        ('REG2', 30, 650000,20);

INSERT INTO tarifs_regime(regime, duree, tarif, poids) VALUES
                        ('REG3', 5, 250000,1.5),
                        ('REG3', 15, 450000,10),
                        ('REG3', 30, 650000,21);

INSERT INTO tarifs_regime(regime, duree, tarif, poids) VALUES
                        ('REG4', 5, 350000,3),
                        ('REG4', 15, 550000,7),
                        ('REG4', 30, 750000,23);

INSERT INTO tarifs_regime(regime, duree, tarif, poids) VALUES
                        ('REG5', 10, 300000,3),
                        ('REG5', 15, 350000,6),
                        ('REG5', 20, 550000,18);

----------------------------------------- vue -----------------------------------------

SELECT
    reg.id as regime,
    reg.designation as nom_regime,
    p.*
FROM regime_plat r
JOIN regime reg ON r.regime = reg.id
JOIN v_plat p ON r.plat = p.plat;

CREATE OR REPLACE VIEW v_regime_plat AS(
    SELECT
        reg.id as regime,
        reg.designation as nom_regime,
        p.*
    FROM regime_plat r
    JOIN regime reg ON r.regime = reg.id
    JOIN v_plat p ON r.plat = p.plat
);

SELECT
    reg.id as regime,
    reg.designation as nom_regime,
    s.*
FROM regime_sport r
JOIN regime reg ON r.regime = reg.id
JOIN sport s ON r.sport = s.id;

CREATE OR REPLACE VIEW v_regime_sport AS(
    SELECT
        reg.id as regime,
        reg.designation as nom_regime,
        s.*
    FROM regime_sport r
    JOIN regime reg ON r.regime = reg.id
    JOIN sport s ON r.sport = s.id
);

SELECT
    t.regime,
    reg.designation as nom_regime,
    t.duree,
    t.tarif
FROM tarifs_regime t 
JOIN regime reg ON t.regime = reg.id;

CREATE OR REPLACE VIEW v_tarifs_regime AS(
    SELECT
        t.regime,
        reg.designation as nom_regime,
        t.duree,
        t.tarif
    FROM tarifs_regime t 
    JOIN regime reg ON t.regime = reg.id
);

----------------------------------------- code -----------------------------------------


CREATE TABLE IF NOT EXISTS code(
    idCode VARCHAR(10) PRIMARY KEY ,
    valeur DECIMAL,
    etat VARCHAR(20)
);

ALTER TABLE code ADD CONSTRAINT code_unique UNIQUE (idCode);

INSERT INTO code(idCode, valeur, etat) VALUES
                        ('COD112234', 1000, 1),
                        ('COD192234', 1000, 1),
                        ('COD116234', 1000, 1),
                        ('COD112234', 2000, 1),
                        ('COD112254', 2000, 1),
                        ('COD412254', 2000, 1),
                        ('COD212254', 2000, 1),
                        ('COD111254', 5000, 1),
                        ('COD112354', 5000, 1),
                        ('COD112251', 5000, 1),
                        ('COD112289', 5000, 1),
                        ('COD156251', 10000, 1),
                        ('COD342251', 10000, 1),
                        ('COD212251', 10000, 1),
                        ('COD112251', 15000, 1),
                        ('COD322251', 15000, 1),
                        ('COD342211', 15000, 1),
                        ('COD342221', 15000, 1),
                        ('COD102250', 20000, 1),
                        ('COD102259', 50000, 1);

-----------------------------porte monnaie------------------------

CREATE SEQUENCE porte_monnai_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS porte_monnai(
    idPorte_monnai VARCHAR(10) PRIMARY KEY DEFAULT CONCAT('POR',nextval('porte_monnai_id_seq')),
    idUser VARCHAR(10)  REFERENCES utilisateur(id),
    valeur DECIMAL
);