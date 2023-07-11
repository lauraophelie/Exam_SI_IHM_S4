---------------------------------- 11-07-2023 -----------------------------------------------

DROP TABLE proportion_plat;

CREATE TABLE IF NOT EXISTS proportion_regime(
    regime VARCHAR(8) REFERENCES regime(id),
    viande DECIMAL DEFAULT 0,
    poisson DECIMAL DEFAULT 0,
    volaille DECIMAL DEFAULT 0
);

INSERT INTO proportion_regime(regime, viande, poisson, volaille) VALUES
                                ('REG1', 15, 15, 70),
                                ('REG2', 25, 25, 50),
                                ('REG3', 30, 30, 40),
                                ('REG4', 40, 40, 20),
                                ('REG5', 50, 50, 0);

INSERT INTO objectif(designation) VALUES('Atteindre son IMC idéal');

----------------------- IMC utilisateur -----------------------------------------------------


SELECT 
    utilisateur, 
    (poids / (taille * taille)) as IMC
FROM v_utilisateur
GROUP BY utilisateur, poids, taille;

CREATE OR REPLACE VIEW v_imc_utilisateur AS(
    SELECT 
        utilisateur, 
        (poids / (taille * taille)) as IMC
    FROM v_utilisateur
    GROUP BY utilisateur, poids, taille
);

------------------------- options gold -------------------------------------------

CREATE SEQUENCE option_gold_id_seq START WITH 1 INCREMENT BY 1;

CREATE TABLE IF NOT EXISTS option_gold(
    id VARCHAR(8) PRIMARY KEY DEFAULT CONCAT('OPT', nextval('option_gold_id_seq')),
    nom VARCHAR(75),
    tarif DECIMAL NOT NULL
);

INSERT INTO option_gold(nom, tarif) VALUES('GOLD 1', 850000),
                                            ('GOLD 2', 1500000);

ALTER TABLE utilisateur ADD COLUMN est_gold BOOLEAN DEFAULT FALSE;

CREATE OR REPLACE VIEW v_utilisateur AS(
    SELECT
        u.id as utilisateur,
        u.nom,
        u.email,
        u.mdp as mot_de_passe,
        d.date_naissance,
        d.genre,
        d.taille,
        d.poids,
        u.est_gold,
        (EXTRACT(YEAR FROM now()) - EXTRACT(YEAR FROM d.date_naissance)) as age
    FROM utilisateur u
    JOIN details_utilisateur d ON u.id = d.utilisateur
);

CREATE TABLE IF NOT EXISTS remise_gold(
    remise DECIMAL DEFAULT 15,
    date_remise TIMESTAMP DEFAULT NOW()
);

INSERT INTO remise_gold(remise) VALUES(15);

SELECT
    u.utilisateur,
    u.nom,
    u.email,
    u.genre,
    u.age
FROM v_utilisateur u
WHERE est_gold = TRUE;

CREATE OR REPLACE VIEW v_utilisateur_gold AS(
    SELECT
        u.utilisateur,
        u.nom,
        u.email,
        u.genre,
        u.age
    FROM v_utilisateur u
    WHERE est_gold = TRUE
);

CREATE TABLE IF NOT EXISTS utilisateur_option_gold(
    utilisateur VARCHAR(8) REFERENCES utilisateur(id),
    option_gold VARCHAR(8) REFERENCES option_gold(id)
);