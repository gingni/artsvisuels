-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 29 Mai 2014 à 17:50
-- Version du serveur: 5.5.37
-- Version de PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `nicolegi_artsvisuels`
--
CREATE DATABASE `nicolegi_artsvisuels` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nicolegi_artsvisuels`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `affichergaleries`$$
CREATE  PROCEDURE `affichergaleries`()
begin
	select 
		ga.idgroupe,
		ga.idgalerie,
		ga.descriptiongalerie,
		c.descriptioncours,
		gr.session,	
		concat (me.nom, " ", me.prenom) as "nomprofesseur"
	from galeries as ga
	left join groupes as gr on ga.idgroupe = gr.idgroupe
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
order by ga.idgroupe, ga.descriptiongalerie
;
end$$

DROP PROCEDURE IF EXISTS `afficher_galeries_publiques`$$
CREATE  PROCEDURE `afficher_galeries_publiques`()
begin
	select *
	from galeries_publiques
;
end$$

DROP PROCEDURE IF EXISTS `afficher_groupes`$$
CREATE  PROCEDURE `afficher_groupes`()
begin
	select distinct
		gr.idgroupe,
		gr.idcours,
		gr.idprofesseur,
		gr.annee,
		gr.session,
		concat (gr.annee, " ", gr.session) as "anneesession",
		c.dossier,
		c.descriptioncours,
		concat (me.prenom, " ", me.nom) as "professeur"
	from groupes as gr
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
	where gr.actif = 1
	order by gr.annee desc, gr.session, c.idcours asc
;
end$$

DROP PROCEDURE IF EXISTS `afficher_images_membre`$$
CREATE  PROCEDURE `afficher_images_membre`(in _idmembre int)
begin

select
c.concept,
im.idimage,
i.src,
i.titre,
i.datecreation,
i.dimensions,
i.medium,
g.descriptiongalerie,
concat (m.nom, ' ', m.prenom) as 'nomEtudiant',
crs.descriptioncours

from images as i
	   
left JOIN imagesmembres as im
ON im.idimage = i.idimage
	   
left JOIN membres as m 
on m.idmembre = im.idmembre

left JOIN contenugalerie as cg 
on cg.idimage = i.idimage

left JOIN galeries as g 
on cg.idgalerie = g.idgalerie

left JOIN concepts as c
on c.concept = i.idconcept

left JOIN groupes as gr
on gr.idgroupe = g.idgalerie

left JOIN cours as crs
on crs.idcours = gr.idcours
	   
where m.idmembre = _idmembre

order by crs.idcours, im.idimage

;

end$$

DROP PROCEDURE IF EXISTS `afficher_images_membre_sans_commentaires`$$
CREATE  PROCEDURE `afficher_images_membre_sans_commentaires`(in _idmembre int)
begin

select c.concept, im.idimage,
i.src, i.titre,
i.datecreation, i.dimensions,
i.medium, g.descriptiongalerie,
concat (m.nom, ' ', m.prenom) as 'nomEtudiant'

from images as i
	   
left JOIN imagesmembres as im
ON im.idimage = i.idimage
	   
left JOIN membres as m 
on m.idmembre = im.idmembre

left JOIN contenugalerie as cg 
on cg.idimage = i.idimage

left JOIN galeries as g 
on cg.idgalerie = g.idgalerie

left JOIN concepts as c
on c.concept = i.idconcept
	   
where not exists (select * from commentaires where commentaires.idimage = i.idimage) and

m.idmembre = _idmembre
;

end$$

DROP PROCEDURE IF EXISTS `afficher_membres_actuels_ou_anciens`$$
CREATE  PROCEDURE `afficher_membres_actuels_ou_anciens`(IN _type VARCHAR(25), IN _actif INT)
begin
 if _type = "tous"
then
 	select * from membres
	where actif = _actif
	and (type = "etudiant" OR type = "professeur")
	order by nom, prenom;
else
	select * from membres
	where actif = _actif
	and type = _type
	order by nom, prenom;

end if;

end$$

DROP PROCEDURE IF EXISTS `afficher_tous_les_groupes`$$
CREATE  PROCEDURE `afficher_tous_les_groupes`()
begin
	select distinct
		gr.idgroupe,
		gr.idcours,
		gr.idprofesseur,
		gr.annee,
		gr.session,
		concat (gr.annee, " ", gr.session) as "anneesession",
		c.dossier,
		c.descriptioncours,
		concat (me.prenom, " ", me.nom) as "professeur"
	from groupes as gr
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
	order by gr.annee desc, gr.session, c.idcours asc
;
end$$

DROP PROCEDURE IF EXISTS `afficher_toutes_les_galeries`$$
CREATE  PROCEDURE `afficher_toutes_les_galeries`()
begin
	select 
		ga.idgroupe,
		ga.idgalerie,
		ga.descriptiongalerie,
		ga.status,
		ga.publique_privee,
		c.idcours,
		c.descriptioncours,
		gr.session,
		gr.annee,
		concat (me.nom, " ", me.prenom) as "nomprofesseur"
	from galeries as ga
	left join groupes as gr on ga.idgroupe = gr.idgroupe
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
order by ga.status, gr.session, gr.annee, ga.idgroupe, ga.descriptiongalerie
;
end$$

DROP PROCEDURE IF EXISTS `afficher_un_groupe`$$
CREATE  PROCEDURE `afficher_un_groupe`(IN _idgroupe INT)
begin
	select distinct
		gr.idgroupe,
		gr.idcours,
		gr.idprofesseur,
		gr.annee,
		gr.session,
		concat (gr.annee, " ", gr.session) as "anneesession",
		gr.actif,
		c.dossier,
		c.descriptioncours,
		concat (me.prenom, " ", me.nom) as "professeur"

	from groupes as gr
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours

	where gr.idgroupe = _idgroupe

	order by gr.annee desc, gr.session, c.idcours asc
;
end$$

DROP PROCEDURE IF EXISTS `ajouter_contenu_galerie`$$
CREATE  PROCEDURE `ajouter_contenu_galerie`(
in _idgalerie int,
in _idimage int
)
begin
-- pour ajouter une image à une galerie publique
-- i.e. publier une image, l'image doit déjà être dans une galerie privée
insert into `nicolegi_artsvisuels`.`contenugalerie_publique` values (_idgalerie, _idimage, null);

end$$

DROP PROCEDURE IF EXISTS `ajouter_contenu_galerie_privee`$$
CREATE  PROCEDURE `ajouter_contenu_galerie_privee`(
in _idgalerie int,
in _idimage int
)
begin
-- pour ajouter une image à une galerie 
-- l'image doit déjà être dans une autre galerie privée
insert into `nicolegi_artsvisuels`.`contenugalerie` values (_idgalerie, _idimage, null);

end$$

DROP PROCEDURE IF EXISTS `ajouter_galerie`$$
CREATE  PROCEDURE `ajouter_galerie`(
in _idGroupe int,
in _descriptionGalerie VARCHAR(100),
in _enonceTravail TEXT, 
in _dateEcheance DATE
)
begin

-- l'idée c'est que le prochain dossier aura comme nom le nombre de galeries du groupe
-- + 1
select count(*) into @dossier from galeries where galeries.idgroupe = _idGroupe;

set @dossier = @dossier + 1 ;

insert into `nicolegi_artsvisuels`.`galeries` values (
null, _idGroupe, _descriptionGalerie, 0, 
_enonceTravail, _dateEcheance, @dossier, 0);

end$$

DROP PROCEDURE IF EXISTS `ajouter_galerie_publique`$$
CREATE  PROCEDURE `ajouter_galerie_publique`(
in _titreGalerie VARCHAR(100),
in _descriptionGalerie TEXT
)
begin
-- toutes les images de cette galerie seront dans le dossier publique

insert into `nicolegi_artsvisuels`.`galeries_publiques` values (
null, _titreGalerie, _descriptionGalerie, 1, "publique", 0);

end$$

DROP PROCEDURE IF EXISTS `ajouter_groupe`$$
CREATE  PROCEDURE `ajouter_groupe`(in _session varchar(12), in _idcours int, in _idprofesseur int, in _annee int)
begin

insert into groupes values (null, _session, _idcours, _idprofesseur, _annee, 1)
;
end$$

DROP PROCEDURE IF EXISTS `ajouter_image`$$
CREATE  PROCEDURE `ajouter_image`(
in _idgalerie int,
in _idmembre int,
-- in _idconcept int,
in _concept text,
in _scr VARCHAR(256), 
in _titre VARCHAR(200), 
in _datecreation VARCHAR(200), 
in _dimensions VARCHAR(45),
in _medium VARCHAR(45)
)
begin
-- ajouter l'image, puis ajouter l'image à la galerie, puis ajouter l'image au membre
-- todo: enlever la colonne idconcept et modifier cette insertion
insert into `nicolegi_artsvisuels`.`images` values (null, null, _scr, _titre, _datecreation, _dimensions, _medium, current_timestamp, _concept);
set @img = last_insert_id();

-- ceci ne fonctionne pas sans changer les contraintes lors de la création de la bdd
 insert into `nicolegi_artsvisuels`.`contenugalerie` values (_idgalerie, @img , null);
 insert into `nicolegi_artsvisuels`.`imagesmembres` values (null, _idmembre, @img);

end$$

DROP PROCEDURE IF EXISTS `ajouter_membre`$$
CREATE  PROCEDURE `ajouter_membre`(
in _nom VARCHAR(25), 
in _prenom VARCHAR(25),
in _alias VARCHAR(25),
in _mdp VARCHAR(45),
in _courriel VARCHAR(45)
)
begin

insert into `nicolegi_artsvisuels`.`membres` values (null, null, _nom, _prenom, _alias, sha1(_mdp), "etudiant", _courriel, CURRENT_TIMESTAMP, 1);


end$$

DROP PROCEDURE IF EXISTS `get_commentaires`$$
CREATE  PROCEDURE `get_commentaires`(in _idimage int)
begin
-- --------------------------------------------------------------------------------
-- ajout de idmembre et idcommentaire timestamp dans le select 2014-04-25 nicole
-- --------------------------------------------------------------------------------
select
c.commentaire, concat (m.nom, ' ', m.prenom) as 'nomEtudiant', m.idmembre, c.idcommentaire, c.timestamp
 from commentaires as c
	   
left JOIN membres as m
on m.idmembre=c.idmembre
where c.idimage = _idimage;

end$$

DROP PROCEDURE IF EXISTS `get_groupes_avec_galeries`$$
CREATE  PROCEDURE `get_groupes_avec_galeries`()
begin
-- retourner le groupe une seule fois même s'il y a plusieurs galeries
	select distinct
		gr.idgroupe,
		gr.idcours,
		gr.idprofesseur,
		gr.annee,
		gr.session,
		concat (gr.annee, " ", gr.session) as "anneesession",
		c.dossier,
		c.descriptioncours,
		concat (me.prenom, " ", me.nom) as "professeur"
	from groupes as gr
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
	-- inner join car on ne veut que les groupes qui ont des galeries
	inner join galeries as ga on gr.idgroupe = ga.idgroupe
	where gr.actif = 1

	order by gr.annee desc, gr.session, c.idcours asc
;
end$$

DROP PROCEDURE IF EXISTS `get_infos_galerie`$$
CREATE  PROCEDURE `get_infos_galerie`(in _idgalerie INT)
begin
-- retourner le groupe une seule fois même s'il y a plusieurs galeries
	select distinct
		gr.idgroupe,
		gr.idcours,
		gr.idprofesseur,
		concat ("img/", gr.annee, " ", gr.session, "/", c.dossier, "/" ,ga.dossier , "/") as "dossier",
		concat (gr.annee, " ", gr.session) as "anneesession",
		c.descriptioncours,
		concat (me.prenom, " ", me.nom) as "professeur"
from galeries as ga
	left join groupes as gr on ga.idgroupe = gr.idgroupe
	left join membres as me on gr.idprofesseur = me.idmembre
	left join cours as c on c.idcours = gr.idcours
	where ga.idgalerie = _idgalerie
;
end$$

DROP PROCEDURE IF EXISTS `get_infos_groupes`$$
CREATE  PROCEDURE `get_infos_groupes`()
begin

select
c.descriptioncours,
concat (gr.annee, ' ', gr.session) as 'session',
c.dossier,
gr.idcours,
gr.idprofesseur,
concat (m.prenom, ' ', m.nom) as 'professeur'
 
from groupes as gr
	   
left JOIN cours as c ON c.idcours = gr.idcours

left JOIN membres as m ON m.idmembre = gr.idprofesseur
	   
order by gr.annee asc, gr.session desc,  c.idcours asc;

end$$

DROP PROCEDURE IF EXISTS `get_infos_images`$$
CREATE  PROCEDURE `get_infos_images`(in _idimage int)
begin
select i.concept, i.src,
i.titre, i.datecreation,
i.dimensions, i.medium, g.descriptiongalerie,
concat (m.nom, ' ', m.prenom) as 'nomEtudiant',
crs.descriptioncours

from images as i
	   
left JOIN imagesmembres as im
ON im.idimage = i.idimage
	   
left JOIN membres as m 
on m.idmembre = im.idmembre

left JOIN contenugalerie as cg 
on cg.idimage = i.idimage

left JOIN galeries as g 
on cg.idgalerie = g.idgalerie

-- ajout du concept dans images
-- todo : supprimer la table concept
-- left JOIN concepts as c
-- on c.idconcept = i.idconcept

left JOIN groupes as gr
on gr.idgroupe = g.idgalerie

left JOIN cours as crs
on crs.idcours = gr.idcours
	   
where i.idimage = _idimage
;
end$$

DROP PROCEDURE IF EXISTS `modifier_alias_mdp`$$
CREATE  PROCEDURE `modifier_alias_mdp`(
in _idmembre int,
in _alias VARCHAR(15), 
in _mdp VARCHAR(45),
in _courriel VARCHAR(45)
)
begin
if _mdp = ""
then 
update membres set alias = _alias, courriel = _courriel where membres.idmembre = _idmembre;
else
update membres set alias = _alias, mdp = _mdp, courriel = _courriel  where membres.idmembre = _idmembre;
end if;
end$$

DROP PROCEDURE IF EXISTS `modifier_galerie_publique`$$
CREATE  PROCEDURE `modifier_galerie_publique`(
in _idgalerie int,
in _titre VARCHAR(100), 
in _description TEXT,
in _status int
)
begin

update galeries_publiques set titregalerie = _titre, descriptiongalerie = _description, status = _status where galeries_publiques.idgaleries_publiques = _idgalerie;

end$$

DROP PROCEDURE IF EXISTS `modifier_image`$$
CREATE  PROCEDURE `modifier_image`(
in _idimage int,
in _titre VARCHAR(200), 
in _datecreation VARCHAR(200), 
in _medium VARCHAR(45),
in _dimensions VARCHAR(45),
in _concept TEXT
)
begin

update images set titre = _titre, datecreation = _datecreation, dimensions = _dimensions, medium = _medium, concept = _concept where images.idimage= _idimage;

end$$

DROP PROCEDURE IF EXISTS `supprimer_commentaire`$$
CREATE  PROCEDURE `supprimer_commentaire`(in _idcommentaire int)
begin
-- --------------------------------------------------------------------------------
-- 2014-04-25 nicole
-- --------------------------------------------------------------------------------
delete from commentaires where commentaires.idcommentaire = _idcommentaire;

end$$

DROP PROCEDURE IF EXISTS `supprimer_contenu_galerie`$$
CREATE  PROCEDURE `supprimer_contenu_galerie`(in _idimage int, in _idgalerie int)
begin

delete from contenugalerie where contenugalerie.idimage = _idimage and contenugalerie.idGalerie = _idgalerie
LIMIT 1
;
end$$

DROP PROCEDURE IF EXISTS `supprimer_contenu_galerie_publique`$$
CREATE  PROCEDURE `supprimer_contenu_galerie_publique`(in _idimage int, in _idgalerie int)
begin

delete from contenugalerie_publique where contenugalerie_publique.idimage = _idimage and contenugalerie_publique.idgalerie = _idgalerie;
end$$

DROP PROCEDURE IF EXISTS `supprimer_galerie_et_contenu`$$
CREATE  PROCEDURE `supprimer_galerie_et_contenu`(
in _idGalerie int
)
begin
delete from contenugalerie where contenugalerie.idgalerie = _idGalerie;
delete from galeries where galeries.idGalerie = _idGalerie;

end$$

DROP PROCEDURE IF EXISTS `supprimer_groupe`$$
CREATE  PROCEDURE `supprimer_groupe`(in _idgroupe int)
begin

delete from groupes
where groupes.idgroupe = _idgroupe
;
end$$

DROP PROCEDURE IF EXISTS `supprimer_groupe_galeries_contenu`$$
CREATE  PROCEDURE `supprimer_groupe_galeries_contenu`(in _idgroupe int)
begin

delete from contenugalerie, galeries, groupes  
using contenugalerie, galeries, groupes
where contenugalerie.idgalerie = galeries.idgalerie 
and galeries.idgroupe = groupes.idgroupe
and groupes.idgroupe = _idgroupe
;
end$$

DROP PROCEDURE IF EXISTS `supprimer_image`$$
CREATE  PROCEDURE `supprimer_image`(in _idimage int)
begin
delete from commentaires where commentaires.idimage = _idimage;
delete from contenugalerie where contenugalerie.idimage = _idimage;
delete from contenugalerie_publique where contenugalerie_publique.idimage = _idimage;
delete from imagesmembres where imagesmembres.idimage = _idimage;
 
delete from images where images.idimage = _idimage;

end$$

DROP PROCEDURE IF EXISTS `supprimer_image_membre`$$
CREATE  PROCEDURE `supprimer_image_membre`(in _idimage int)
begin

delete commentaires, images_has_motscles, imagesmembres, contenugalerie, images 
from commentaires, images_has_motscles, imagesmembres, contenugalerie, images

left JOIN commentaires as c ON c.idimage = images.idimage	

left JOIN imagesmembres as im ON im.idimage = images.idimage

left JOIN contenugalerie as cg on cg.idimage = images.idimage

left JOIN images_has_motscles as ihm on ihm.images_idimage = images.idimage
	   
where images.idimage = _idimage;

end$$

DROP PROCEDURE IF EXISTS `supprimer_image_sans_commentaires`$$
CREATE  PROCEDURE `supprimer_image_sans_commentaires`(in _idimage int)
begin

delete from contenugalerie where contenugalerie.idimage = _idimage;

delete from imagesmembres where imagesmembres.idimage = _idimage;
 
delete from images where images.idimage = _idimage;

end$$

DROP PROCEDURE IF EXISTS `update_nb`$$
CREATE  PROCEDURE `update_nb`()
begin

drop temporary table if exists temp;
create temporary table temp 
(select  count(*) as nb, galeries.idgalerie as galerie
	from    contenugalerie
	inner join galeries on galeries.idgalerie = contenugalerie.idgalerie
	group by galeries.idgalerie);

update galeries set `nbimages` = (select temp.nb from temp where temp.galerie = galeries.idgalerie)
;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `idcommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `idimage` int(11) DEFAULT NULL,
  `commentaire` longtext,
  `idmembre` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=desactiver;1=activer',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcommentaire`),
  KEY `commentaires_images1_idx` (`idimage`),
  KEY `commentaires_membres1_idx` (`idmembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idcommentaire`, `idimage`, `commentaire`, `idmembre`, `status`, `timestamp`) VALUES
(1, 12, 'mium mium :3', 19, 0, '2014-04-17 04:00:00'),
(2, 11, 'Mais quel beau renard galactique :)\n', 16, 0, '2014-04-17 04:00:00'),
(3, 11, 'Eh oui :3 Merci :)\n', 19, 0, '2014-04-17 04:00:00'),
(31, 57, 'test', 4, 0, '2014-05-16 20:26:58'),
(32, 5, 'TrÃ¨s intÃ©ressant', 4, 0, '2014-05-16 21:01:50'),
(33, 8, 'Vraiment la transparence est Ã©tonnante.', 4, 0, '2014-05-16 21:58:51');

-- --------------------------------------------------------

--
-- Structure de la table `concepts`
--

DROP TABLE IF EXISTS `concepts`;
CREATE TABLE IF NOT EXISTS `concepts` (
  `idconcept` int(11) NOT NULL AUTO_INCREMENT,
  `idmembre` int(11) NOT NULL,
  `concept` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idconcept`),
  KEY `concepts_membres1_idx` (`idmembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `concepts`
--

INSERT INTO `concepts` (`idconcept`, `idmembre`, `concept`, `timestamp`) VALUES
(1, 1, 'pas de concept', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contenugalerie`
--

DROP TABLE IF EXISTS `contenugalerie`;
CREATE TABLE IF NOT EXISTS `contenugalerie` (
  `idgalerie` int(11) NOT NULL,
  `idimage` int(11) NOT NULL,
  `idcontenugalerie` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idcontenugalerie`),
  KEY `contenugalerie_images1_idx` (`idimage`),
  KEY `contenugalerie_galeries1_idx` (`idgalerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `contenugalerie`
--

INSERT INTO `contenugalerie` (`idgalerie`, `idimage`, `idcontenugalerie`) VALUES
(2, 5, 5),
(2, 8, 8),
(2, 9, 9),
(2, 11, 12),
(2, 7, 13),
(2, 12, 15),
(2, 13, 16),
(2, 14, 17),
(2, 15, 18),
(27, 41, 20),
(60, 53, 35),
(60, 55, 37);

-- --------------------------------------------------------

--
-- Structure de la table `contenugalerie_publique`
--

DROP TABLE IF EXISTS `contenugalerie_publique`;
CREATE TABLE IF NOT EXISTS `contenugalerie_publique` (
  `idgalerie` int(11) NOT NULL,
  `idimage` int(11) NOT NULL,
  `idcontenugalerie` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idcontenugalerie`),
  KEY `galerie_publique_contenu_idx` (`idgalerie`),
  KEY `galerie_publique_contenu_idx1` (`idimage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `contenugalerie_publique`
--

INSERT INTO `contenugalerie_publique` (`idgalerie`, `idimage`, `idcontenugalerie`) VALUES
(1, 41, 1),
(3, 53, 3),
(3, 55, 5),
(3, 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idcours` int(11) NOT NULL,
  `descriptioncours` varchar(100) DEFAULT NULL,
  `nocours` varchar(10) DEFAULT NULL,
  `dossier` varchar(45) DEFAULT 'autres' COMMENT 'correspond au dossier situé dans le dossier de la session',
  PRIMARY KEY (`idcours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`idcours`, `descriptioncours`, `nocours`, `dossier`) VALUES
(411, 'Histoire de l&apos;art et m&eacute;thodologie', '520-411-AT', '411_lecture'),
(412, 'Dessin d&apos;observation', '510-412-AT', '412_dessin'),
(414, 'Exploitation chromatique I', '510-414-AT', '414_chromatique'),
(415, 'Techniques, proc&eacute;d&eacute;s et mat&eacute;riaux', '510-415-AT', '415_materiaux'),
(416, 'Langage visuel', '510-416-AT', '416_langage'),
(421, 'Lecture d&apos;œuvres d&apos;art', '510-421-AT', '421_lecture'),
(422, 'Dessin et mod&egrave;le vivant', '510-422-AT', '422_dessin'),
(423, 'Images num&eacute;riques et photographie ', '510-423-AT', '423_images'),
(424, 'Proc&eacute;d&eacute;s et projet en peinture ', '510-424-AT', '424_peinture'),
(425, 'Proc&eacute;d&eacute;s et projet en sculpture', '510-425-AT', '425_sculpture'),
(426, 'Activit&eacute; d&apos;int&eacute;gration', '510-426-AT', '426_integration'),
(431, 'Art contemporain et actuel', '510-431-AT', '431_art'),
(432, 'Cr&eacute;ation actuelle en dessin', '510-432-AT', '432_creation_dessin'),
(433, 'Dessin et animation num&eacute;riques', '510-433-AT', '433_numerique'),
(434, 'Cr&eacute;ation actuelle en peinture 1', '510-434-AT', '434_creation_peinture'),
(435, 'Cr&eacute;ation actuelle en sculpture 1 ', '510-435-AT', '435_creation_sculpture'),
(436, 'Portfolio ', '510-436-AT', '436_portfolio'),
(443, 'Tendances actuelles ', '510-443-AT', '443_tendances'),
(444, 'Cr&eacute;ation actuelle en peinture 2', '510-444-AT', '444_creation_peinture'),
(445, 'Cr&eacute;ation actuelle en sculpture 2 ', '510-445-AT', '445_creation_scupture'),
(511, 'Initiation &agrave; la peinture, cours compl&eacute;mentaire', '511-ABB-03', 'autres'),
(555, 'Galeries priv&eacute;es des membres', '          ', '555_galeries_personnelles');

-- --------------------------------------------------------

--
-- Structure de la table `galeries`
--

DROP TABLE IF EXISTS `galeries`;
CREATE TABLE IF NOT EXISTS `galeries` (
  `idgalerie` int(11) NOT NULL AUTO_INCREMENT,
  `idgroupe` int(11) DEFAULT '10' COMMENT '10 par défaut c''est pour les galeries privées',
  `descriptiongalerie` varchar(100) DEFAULT NULL,
  `publique_privee` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'privée 0\npublique 1',
  `enonceTravail` text,
  `dateEcheance` date DEFAULT NULL,
  `dossier` int(11) NOT NULL DEFAULT '1' COMMENT 'pour identifier le dossier dans lequel les images seront mises / 1 par défaut c''est pour les galeries privées',
  `status` int(11) DEFAULT '0' COMMENT '0=active valeur par défaut;1=inactive ne plus avoir cette galerie comme choix pour y ajouter une image;2= fermée ne pas avoir cette galerie comme choix pour en afficher le contenu (dans 2, 1 doit être inclus)',
  PRIMARY KEY (`idgalerie`),
  KEY `galeries_groupes1_idx` (`idgroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Contenu de la table `galeries`
--

INSERT INTO `galeries` (`idgalerie`, `idgroupe`, `descriptiongalerie`, `publique_privee`, `enonceTravail`, `dateEcheance`, `dossier`, `status`) VALUES
(2, 2, 'projets synth&egrave;ses', 0, 's&eacute;ries photographiques et revues litt&eacute;raires', '0000-00-00', 1, 0),
(4, 10, 'Galerie priv&eacute;e de Bordeleau William', 0, NULL, NULL, 1, 0),
(5, 10, 'Galerie priv&eacute;e de Brousseau Ariane', 0, NULL, NULL, 1, 0),
(6, 10, 'Galerie priv&eacute;e de Chayer Am&eacute;lie', 0, NULL, NULL, 1, 0),
(7, 10, 'Galerie priv&eacute;e de Culhane Jean-Simon', 0, NULL, NULL, 1, 0),
(8, 10, 'Galerie priv&eacute;e de Fournier-Cantin Anais', 0, NULL, NULL, 1, 0),
(9, 10, 'Galerie priv&eacute;e de Fournier-Cantin C&eacute;lia', 0, NULL, NULL, 1, 0),
(10, 10, 'Galerie priv&eacute;e de Gagn&eacute; Elodie', 0, NULL, NULL, 1, 0),
(11, 10, 'Galerie priv&eacute;e de Girard M&eacute;lanie', 0, NULL, NULL, 1, 0),
(12, 10, 'Galerie priv&eacute;e de Guertin Majorie', 0, NULL, NULL, 1, 0),
(13, 10, 'Galerie priv&eacute;e de Langevin Audrey', 0, NULL, NULL, 1, 0),
(14, 10, 'Galerie priv&eacute;e de Langlois Marilou', 0, NULL, NULL, 1, 0),
(15, 10, 'Galerie priv&eacute;e de Laplante Ariel', 0, NULL, NULL, 1, 0),
(16, 10, 'Galerie priv&eacute;e de Larouche Mari-Lou', 0, NULL, NULL, 1, 0),
(17, 10, 'Galerie priv&eacute;e de Loiselle Aimeric', 0, NULL, NULL, 1, 0),
(18, 10, 'Galerie priv&eacute;e de Migneault Ariane', 0, NULL, NULL, 1, 0),
(19, 10, 'Galerie priv&eacute;e de Milot St&eacute;phanie', 0, NULL, NULL, 1, 0),
(20, 10, 'Galerie priv&eacute;e de Paterson Alex', 0, NULL, NULL, 1, 0),
(21, 10, 'Galerie priv&eacute;e de Pratte Kelly', 0, NULL, NULL, 1, 0),
(22, 10, 'Galerie priv&eacute;e de Scott Marianne', 0, NULL, NULL, 1, 0),
(23, 10, 'Galerie priv&eacute;e de Sirard Marie-Lou', 0, NULL, NULL, 1, 0),
(24, 10, 'Galerie priv&eacute;e de St-Pierre Jennessa', 0, NULL, NULL, 1, 0),
(25, 10, 'Galerie priv&eacute;e de Vachon Laury', 0, NULL, NULL, 1, 0),
(26, 10, 'La mienne', 0, '', '0000-00-00', 1, 1),
(27, 4, 'Projet synth&egrave;se', 0, '', '0000-00-00', 1, 0),
(28, 3, 'Projet synth&egrave;se', 0, '', '0000-00-00', 1, 0),
(60, 10, 'Galerie priv&eacute;e de Beauvais Michel ', 0, NULL, NULL, 1, 0),
(61, 10, 'Galerie priv&eacute;e de Fortin Roxane', 0, NULL, NULL, 1, 0),
(62, 10, 'Galerie priv&eacute;e de Julien-Gilbert Emie', 0, NULL, NULL, 1, 0),
(63, 10, 'Galerie priv&eacute;e de Lanoix Audreyline', 0, NULL, NULL, 1, 0),
(64, 10, 'Galerie priv&eacute;e de Lauzon Sabrina', 0, NULL, NULL, 1, 0),
(65, 10, 'Galerie priv&eacute;e de Leroux St&eacute;phanie', 0, NULL, NULL, 1, 0),
(66, 10, 'Galerie priv&eacute;e de Paquette Christel', 0, NULL, NULL, 1, 0),
(67, 10, 'Galerie priv&eacute;e de Richer Nicolas', 0, NULL, NULL, 1, 0),
(68, 10, 'Galerie priv&eacute;e de Talbot Caroline', 0, NULL, NULL, 1, 0),
(69, 10, 'Galerie priv&eacute;e de Vandal Kristopher', 0, NULL, NULL, 1, 0),
(75, 10, 'images diverses marthe julien', 0, '', '0000-00-00', 34, 0),
(76, 2, 'CQMRH', 0, 'r&eacute;flexion photographique sur les petits bonheurs de la vie', '0000-00-00', 2, 0),
(77, 11, 'projets en peinture', 0, 'divers projets en peinture', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `galeries_publiques`
--

DROP TABLE IF EXISTS `galeries_publiques`;
CREATE TABLE IF NOT EXISTS `galeries_publiques` (
  `idgaleries_publiques` int(11) NOT NULL AUTO_INCREMENT,
  `titregalerie` varchar(100) NOT NULL,
  `descriptiongalerie` text,
  `publique_privee` int(11) NOT NULL DEFAULT '1',
  `dossier` varchar(10) NOT NULL DEFAULT 'publique',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idgaleries_publiques`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `galeries_publiques`
--

INSERT INTO `galeries_publiques` (`idgaleries_publiques`, `titregalerie`, `descriptiongalerie`, `publique_privee`, `dossier`, `status`) VALUES
(1, 'Projets synth&egrave;se proc&eacute;d&eacute;s et projets en sculpture 2014', '', 1, 'publique', 0),
(2, 'Projets synth&egrave;se proc&eacute;d&eacute;s et projets en peinture 2014', '', 1, 'publique', 0),
(3, 'Exposition des finissants 2014', '', 1, 'publique', 0),
(4, 'CQMRH', 'R&eacute;flexion photographique sur les petits bonheurs de la vie\r\n&Eacute;tudiant.e.s en arts visuel/cours images num&eacute;riques et photographie', 1, 'publique', 0);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `idgroupe` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(12) NOT NULL DEFAULT 'hiver' COMMENT 'automne  hiver',
  `idcours` int(11) NOT NULL,
  `idprofesseur` int(11) NOT NULL,
  `annee` int(11) NOT NULL DEFAULT '2014',
  `actif` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: groupes de la session en cours\n0: groupes de sessions passées ou futures',
  PRIMARY KEY (`idgroupe`),
  KEY `groupes_cours1_idx` (`idcours`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`idgroupe`, `session`, `idcours`, `idprofesseur`, `annee`, `actif`) VALUES
(1, 'hiver', 422, 2, 2014, 1),
(2, 'hiver', 423, 3, 2014, 1),
(3, 'hiver', 424, 5, 2014, 1),
(4, 'hiver', 425, 5, 2014, 1),
(5, 'hiver', 426, 2, 2014, 1),
(6, 'hiver', 443, 5, 2014, 1),
(7, 'hiver', 444, 2, 2014, 1),
(8, 'hiver', 445, 3, 2014, 1),
(10, 'hiver', 555, 1, 2014, 1),
(11, '	hiver						', 511, 1, 2014, 1),
(13, '					automne', 436, 2, 2014, 1),
(16, 'automne', 555, 1, 2015, 1);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `idimage` int(11) NOT NULL AUTO_INCREMENT,
  `idconcept` int(11) DEFAULT '1',
  `src` varchar(256) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `datecreation` varchar(200) DEFAULT NULL,
  `dimensions` varchar(45) DEFAULT NULL,
  `medium` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `concept` longtext,
  PRIMARY KEY (`idimage`),
  KEY `images_concepts1_idx` (`idconcept`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`idimage`, `idconcept`, `src`, `titre`, `datecreation`, `dimensions`, `medium`, `timestamp`, `concept`) VALUES
(4, NULL, 'img/2014 hiver/423_images/1/Marie_1397763524.jpg', 'Photoportrait', '', '', '', '2014-04-17 19:38:44', ''),
(5, NULL, 'img/2014 hiver/423_images/1/Kelly_1397763550.jpg', 'Cr&eacute;ation', '', '', 'Fil de fer, carton et pastel gras.', '2014-04-17 19:39:10', ''),
(7, NULL, 'img/2014 hiver/423_images/1/Marie_1397763557.jpg', 'Insomnie', '', '', '', '2014-04-17 19:39:17', ''),
(8, NULL, 'img/2014 hiver/423_images/1/Amelie_1397763598.jpg', 'Urban', '2014', '', 'Peinture acrylique', '2014-04-17 19:39:58', ''),
(9, NULL, 'img/2014 hiver/423_images/1/Marilou_1397763608.jpg', 'maya abstrai', '2e session hiver 2014', '', 'pastel seche et ancre de chine', '2014-04-17 19:40:08', 'formatife int&eacute;gration photo recarder et calibrer'),
(11, NULL, 'img/2014 hiver/423_images/1/Majorie_1397763666.jpg', 'Galaxie Apprivois&eacute;e (Renard)', '2014', '', 'Acrylique sur bois', '2014-04-17 19:41:06', ''),
(12, NULL, 'img/2014 hiver/423_images/1/Celia _1397763911.jpg', 'C&eacute;lia', '', '', '', '2014-04-17 19:45:11', ''),
(13, NULL, 'img/2014 hiver/423_images/1/Stephanie_1397763927.jpg', 'Cr&eacute;ation', '2014', '32 cm x 20 cm', 'Papier m&acirc;ch&eacute; et peinture en cach', '2014-04-17 19:45:27', 'La main, c''est une cr&eacute;ation qui cr&eacute;e et que nous avons besoin en tout temps. Elle peut faire des chose autant magnifique que n&eacute;gatif.'),
(14, NULL, 'img/2014 hiver/423_images/1/Jean-Simon_1397764082.jpg', 'Direction', 'Automne ', '', 'Pin, tige filet&eacute; ', '2014-04-17 19:48:02', ''),
(15, NULL, 'img/2014 hiver/423_images/1/ArianeM_1397764184.jpg', 'Conte de f&eacute;e', '', '', '', '2014-04-17 19:49:44', ''),
(40, NULL, '555_galeries_personnelles_1397833878.jpg', 'test', '', '', '', '2014-04-18 15:11:18', ''),
(41, NULL, 'img/2014 hiver/425_sculpture/1/Marilou_1399390112.jpg', 'hydro-consomation', '6 mai', '', 'pl&acirc;tre ', '2014-05-06 15:28:32', 'Cette oeuvre repr&eacute;sente les dommage de la surconsommation d''&eacute;lectricit&eacute;.  '),
(51, NULL, 'img/2014 hiver/555_galeries_personnelles/1/mar_1399659248.jpg', 'CQMRH ariane b', '', '60 x 60 cm', 'photo', '2014-05-09 18:14:08', ''),
(53, NULL, 'img/2014 hiver/555_galeries_personnelles/1/Michel Beauvais_1399936078.jpg', 'Questionner Kosuth', '2014', '', 'Bois et &eacute;crous', '2014-05-12 23:07:58', ''),
(55, NULL, 'img/2014 hiver/555_galeries_personnelles/1/Michel Beauvais_1399936268.jpg', 'Scinder son &ecirc;tre', '2014', '', 'Chaise en bois brul&eacute;', '2014-05-12 23:11:08', ''),
(57, NULL, 'img/2014 hiver/555_galeries_personnelles/1/angie_1400272004.jpg', 'test', '', '', '', '2014-05-16 20:26:44', ''),
(58, NULL, 'img/2014 hiver/423_images/2/angie_1400273890.jpg', 'test', 'printemps', '', '', '2014-05-16 20:58:10', '');

-- --------------------------------------------------------

--
-- Structure de la table `images_has_motscles`
--

DROP TABLE IF EXISTS `images_has_motscles`;
CREATE TABLE IF NOT EXISTS `images_has_motscles` (
  `images_idimage` int(11) NOT NULL,
  `motscles_idmotcle` int(11) NOT NULL,
  PRIMARY KEY (`images_idimage`,`motscles_idmotcle`),
  KEY `images_has_motscles_motscles1_idx` (`motscles_idmotcle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `imagesmembres`
--

DROP TABLE IF EXISTS `imagesmembres`;
CREATE TABLE IF NOT EXISTS `imagesmembres` (
  `idimagesmembres` int(11) NOT NULL AUTO_INCREMENT,
  `idmembre` int(11) NOT NULL,
  `idimage` int(11) NOT NULL,
  PRIMARY KEY (`idimagesmembres`),
  KEY `idmembre_idx` (`idmembre`),
  KEY `imagesmembres_images1_idx` (`idimage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `imagesmembres`
--

INSERT INTO `imagesmembres` (`idimagesmembres`, `idmembre`, `idimage`) VALUES
(4, 30, 4),
(5, 28, 5),
(7, 30, 7),
(8, 13, 8),
(9, 21, 9),
(11, 19, 11),
(12, 16, 12),
(13, 26, 13),
(14, 14, 14),
(15, 25, 15),
(16, 21, 41),
(26, 3, 51),
(28, 33, 53),
(30, 33, 55);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `idmembre` int(11) NOT NULL AUTO_INCREMENT,
  `noda` int(11) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `alias` varchar(25) NOT NULL,
  `mdp` varchar(45) NOT NULL DEFAULT 'sha1(123)',
  `type` varchar(25) NOT NULL DEFAULT 'etudiant',
  `courriel` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actif` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: étudiant actuellement inscrit ou professeur en poste\n2: ancien étudiant ou professeur',
  `annee_debut` int(11) NOT NULL DEFAULT '2012',
  PRIMARY KEY (`idmembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`idmembre`, `noda`, `nom`, `prenom`, `alias`, `mdp`, `type`, `courriel`, `timestamp`, `actif`, `annee_debut`) VALUES
(1, NULL, 'Godbout', 'Gaetane', 'gae', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'professeur', '', '2014-04-06 08:23:10', 1, 0),
(2, NULL, 'Doucet', 'V&eacute;ronique', 'ver', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'professeur', '', '2014-04-06 08:23:10', 1, 0),
(3, NULL, 'Julien', 'Marthe', 'marthe', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'professeur', 'marthe.julien@cegepat.qc.ca', '2014-04-06 08:23:10', 1, 0),
(4, NULL, 'Gingras', 'Nicole', 'angie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', 'gingrasnic@gmail.com', '2014-04-06 08:23:10', 1, 0),
(5, NULL, 'Tr&eacute;panier', 'Donald', 'don', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'professeur', '', '2014-04-06 08:23:10', 1, 0),
(6, NULL, 'Lafleur', 'Guy', 'guy', '1285a0d381b219e9515fc41516072fc3ee16c59a', 'gestion', '', '2014-04-06 08:23:10', 1, 0),
(11, NULL, 'Bordeleau', 'William', 'William', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(12, NULL, 'Brousseau', 'Ariane', 'ArianeB', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(13, NULL, 'Chayer', 'Am&eacute;lie', 'Amelie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(14, NULL, 'Culhane', 'Jean-Simon', 'Jean-Simon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(15, NULL, 'Fournier-Cantin', 'Anais', 'Anais', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(16, NULL, 'Fournier-Cantin', 'C&eacute;lia', 'Celia ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(17, NULL, 'Gagn&eacute;', 'Elodie', 'Elodie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(18, NULL, 'Girard', 'M&eacute;lanie', 'Melanie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(19, NULL, 'Guertin', 'Majorie', 'Majorie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(20, NULL, 'Langevin', 'Audrey', 'Audrey', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(21, NULL, 'Langlois', 'Marilou', 'Marilou', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(22, NULL, 'Laplante', 'Ariel', 'Ariel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(23, NULL, 'Larouche', 'Mari-Lou', 'Mari-Lou ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(24, NULL, 'Loiselle', 'Aimeric ', 'Aimeric', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(25, NULL, 'Migneault', 'Ariane', 'ArianeM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(26, NULL, 'Milot', 'St&eacute;phanie', 'Stephanie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(27, NULL, 'Paterson', 'Alex', 'Alex ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(28, NULL, 'Pratte', 'Kelly', 'Kelly', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(29, NULL, 'Scott', 'Marianne', 'Marianne ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(30, NULL, 'Sirard', 'Marie-Lou', 'Marie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(31, NULL, 'St-Pierre', 'Jennessa', 'Jennessa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(32, NULL, 'Vachon', 'Laury', 'Laury', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'etudiant', '', '2014-04-17 17:53:21', 1, 2013),
(33, 1150203, 'Beauvais', 'Michel ', 'Michel Beauvais', 'bd9da506329d1935c1ae0905e887300ec26bb322', 'etudiant', 'alien.beauvais@homail.com', '2014-05-06 16:04:15', 1, 2012),
(35, 1146369, 'Fortin', 'Roxane', 'Roxane', '88c1b7b12c66b878cbe0b8b7ae15d20101d0ca0e', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(36, 1230929, 'Julien-Gilbert', 'Emie', 'Emie', '1b22503fb191f37d95569591039a1bdd6acb4f74', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(37, 1224203, 'Lanoix', 'Audreyline', 'Audreyline', '12457ae392d9b70cb398da6079df88606c1af94c', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(38, 1148943, 'Lauzon', 'Sabrina', 'Sabrina', '09511bcea3f3cb2fa1dcfd52cef6b3f35250a53c', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(39, 1224854, 'Leroux', 'St&eacute;phanie', 'St&eacute;phanie', '8d71e6e3a7daac1864d2bb1447da17cab3c85097', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(40, 1253200, 'Paquette', 'Christel', 'Christel', '58b56e6935d32d3f3769926832c610f454ae8360', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(41, 1236249, 'Richer', 'Nicolas', 'Nicolas', '3ee3c3f4f9c840efdb5aee529cd1d359b86fbcbe', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(42, 1193224, 'Talbot', 'Caroline', 'Caroline', '208995070511679e6c7cc6bf601938c05a66ea6b', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012),
(43, 1159570, 'Vandal', 'Kristopher', 'Kristopher', 'e49d571dfadffb9ba579d64d864b5d4e505fae90', 'etudiant', '', '2014-05-06 21:34:17', 1, 2012);

-- --------------------------------------------------------

--
-- Structure de la table `membresgroupe`
--

DROP TABLE IF EXISTS `membresgroupe`;
CREATE TABLE IF NOT EXISTS `membresgroupe` (
  `idmembresgroupe` int(11) NOT NULL AUTO_INCREMENT,
  `idgroupe` int(11) DEFAULT NULL,
  `idmembre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmembresgroupe`),
  KEY `idmembre_idx` (`idmembre`),
  KEY `membresgroupe_groupes1_idx` (`idgroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `motscles`
--

DROP TABLE IF EXISTS `motscles`;
CREATE TABLE IF NOT EXISTS `motscles` (
  `idmotcle` int(11) NOT NULL AUTO_INCREMENT,
  `motcle` varchar(45) NOT NULL,
  PRIMARY KEY (`idmotcle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_images` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentaires_membres` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concepts`
--
ALTER TABLE `concepts`
  ADD CONSTRAINT `concepts_membres` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contenugalerie`
--
ALTER TABLE `contenugalerie`
  ADD CONSTRAINT `contenugalerie_galeries` FOREIGN KEY (`idgalerie`) REFERENCES `galeries` (`idgalerie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `contenugalerie_images` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contenugalerie_publique`
--
ALTER TABLE `contenugalerie_publique`
  ADD CONSTRAINT `galerie_publique_contenu` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `galerie_publique_contenu_image` FOREIGN KEY (`idgalerie`) REFERENCES `galeries_publiques` (`idgaleries_publiques`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `galeries`
--
ALTER TABLE `galeries`
  ADD CONSTRAINT `galeries_groupes` FOREIGN KEY (`idgroupe`) REFERENCES `groupes` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_cours` FOREIGN KEY (`idcours`) REFERENCES `cours` (`idcours`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `images_has_motscles`
--
ALTER TABLE `images_has_motscles`
  ADD CONSTRAINT `has_motscles_images` FOREIGN KEY (`images_idimage`) REFERENCES `images` (`idimage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `has_motscles_motscles` FOREIGN KEY (`motscles_idmotcle`) REFERENCES `motscles` (`idmotcle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `imagesmembres`
--
ALTER TABLE `imagesmembres`
  ADD CONSTRAINT `imagesmembres_images` FOREIGN KEY (`idimage`) REFERENCES `images` (`idimage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagesmembres_membres` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membresgroupe`
--
ALTER TABLE `membresgroupe`
  ADD CONSTRAINT `membresgroupe_groupes` FOREIGN KEY (`idgroupe`) REFERENCES `groupes` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `membresgroupe_membres` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`idmembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;
