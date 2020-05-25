-- creation bse de données : 
CREATE SCHEMA `vtc` DEFAULT CHARACTER SET utf8 ;

-- creation des 3 tables : 
-- 
-- table conducteur :
CREATE TABLE `vtc`.`conducteur` (
  `id_conducteur` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(200) NULL,
  `nom` VARCHAR(200) NULL,
  PRIMARY KEY (`id_conducteur`));
--
-- table vehicule :
CREATE TABLE `vtc`.`vehicule` (
  `id_vehicule` INT NOT NULL AUTO_INCREMENT = 500,
  `marque` VARCHAR(80) NULL,
  `modele` VARCHAR(80) NULL,
  `couleur` VARCHAR(80) NULL,
  `immatriculation` VARCHAR(15) NULL,
  PRIMARY KEY (`id_vehicule`));
--
-- table association_vehicule_conducteur :
CREATE TABLE `vtc`.`association_vehicule_conducteur` (
  `id_association` INT NOT NULL AUTO_INCREMENT,
  `id_vehicule` INT NULL,
  INDEX `id_vehicule_idx` (`id_vehicule` ASC),
  CONSTRAINT `id_vehicule`
    FOREIGN KEY (`id_vehicule`)
    REFERENCES `vtc`.`vehicule` (`id_vehicule`)
  `id_conducteur` INT NULL,
  INDEX `id_conducteur_idx` (`id_conducteur` ASC),
  CONSTRAINT `id_conducteur`
    FOREIGN KEY (`id_conducteur`)
    REFERENCES `vtc`.`conducteur` (`id_conducteur`)
    PRIMARY KEY (`id_association`));

-- saisie des données de départ : 
--
-- table conducteur : 
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Julien', 'Avigny');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Morgane', 'Alamia');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Philippe', 'Pandre');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Amelie', 'Blondelle');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Alex', 'Richy');
--
-- table vehicule :
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Peugeot', '807', 'noir', 'AB-355-CA');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Citroen', 'C8', 'bleu', 'CE-122-AE');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Mercedes', 'Cls', 'vert', 'FG-953-HI');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Touran', 'noir', 'SO-322-NV');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Skoda', 'Octavia', 'gris', 'PB-631-TK');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Passat', 'gris', 'XN-973-MM');
--
-- table association_vehicule_conducteur :
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '1');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('502', '2');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('503', '3');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('504', '4');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '3');
