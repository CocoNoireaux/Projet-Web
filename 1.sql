CREATE TABLE vendeur(
IDvendeur int(11) NOT NULL PRIMARY KEY,

Pseudo varchar(255) NOT NULL,
Email varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Photo varchar(255) NOT NULL,
Imagefond varchar(255) NOT NULL
   
);


CREATE TABLE acheteur(
IDacheteur int(11) NOT NULL PRIMARY KEY,

Nom varchar(255) NOT NULL,
Prenom varchar(255) NOT NULL,
Adresse varchar(255) NOT NULL,
Email varchar(255) NOT NULL,
Motdepasse varchar(255) NOT NULL,
CodePostal varchar(255) NOT NULL,
Pays varchar(255) NOT NULL,
Telephone int(1O) NOT NULL,
TypeCarte int(255) NOT NULL,
NumeroCarte int(1O) NOT NULL,
NomProprietaireCarte int(1O) NOT NULL,
DateExpiration  date NOT NULL,
CodeCarte int(3) NOT NULL
);


CREATE TABLE items(
IDitems int(11) NOT NULL PRIMARY KEY,
Nom varchar(255) NOT NULL,
Photo varchar(255) NOT NULL,
Video varchar(255) NOT NULL,
Prix varchar(255) NOT NULL,
Categorie varchar(255) NOT NULL



);

CREATE TABLE livres(

IDlivre int(11) NOT NULL PRIMARY KEY,
Titre varchar(255) NOT NULL,
Auteur varchar(255) NOT NULL,
Annee int(5) NOT NULL,
Editeur varchar(255) NOT NULL,
Genre varchar(255) NOT NULL


);


CREATE TABLE musique(

IDmusique int(11) NOT NULL PRIMARY KEY,
Artiste varchar(255) NOT NULL,
NomAlbum varchar(255) NOT NULL,
Genre varchar(255) NOT NULL,
Annee varchar(5) NOT NULL


);

CREATE TABLE sportetloisirs
(
IDsport int(11) NOT NULL PRIMARY KEY,
TypeSport varchar(255) NOT NULL




);

CREATE TABLE vetement( 
IDvetement int(11) NOT NULL PRIMARY KEY,
Sexe varchar(255) NOT NULL,
Couleur varchar(255) NOT NULL,
Taille int(5) NOT NULL,
Type varchar(255) NOT NULL

 
);