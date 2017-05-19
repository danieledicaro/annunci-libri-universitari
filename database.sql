CREATE TABLE Autore(
  'id_autore' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_autore')
);
CREATE TABLE CasaEditrice(
  'id_casaeditrice' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_casaeditrice')
);
CREATE TABLE Citta(
  'id' int NOT NULL AUTO_INCREMENT,
  'comune' VARCHAR(60) NOT NULL,
  'provincia' VARCHAR(60) NOT NULL,
  'id_stato' VARCHAR(2),
  PRIMARY KEY ('id')
  FOREIGN KEY ('id_stato') REFERENCES Stato('id_stato')
 );
CREATE TABLE Stato(
  'id_stato' VARCHAR(2) NOT NUll,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_stato')
 );
CREATE TABLE Ambito(
  'id_ambito' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_ambito')
 );
CREATE TABLE Universita(
  'id_universita' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_universita')
);
CREATE TABLE Professore(
  'id_professore' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  PRIMARY KEY ('id_professore')
);
CREATE TABLE Corso(
  'id_corso' int NOT NULL AUTO_INCREMENT,
  'nome' VARCHAR(50),
  'universita' int,
  'professore' int,
  PRIMARY KEY ('id_corso'),
  FOREIGN  KEY ('universita') REFERENCES Universita ('id_univesita'),
  FOREIGN  KEY ('professore') REFERENCES Professore ('id_professore')

);



CREATE TABLE Persona (
	'username'  varchar(20) NOT NULL,
	'password' varchar(20) NOT NULL,
	'tipologia_utente' INT NOT NULL,
  'nome'  varchar(20),
	'cognome'  varchar(20),
	'mail'  varchar(40) NOT NULL,
	'id_stato'  varchar(2),
	PRIMARY KEY('username'),
	FOREIGN  KEY ('id_stato') REFERENCES Stato ('id_stato')
);


CREATE TABLE Libro(
	'isbn' varchar(13) NOT NULL,
	'titolo' varchar(100) NOT NULL,
	'id_autore' int,
	'anno_stampa' YEAR NOT NULL,
	'id_casaeditrice' int,
	'id_ambito' int,
  PRIMARY KEY('isbn'),
  FOREIGN KEY ('id_casaeditrice') REFERENCES CasaEditrice('id_casaeditrice'),
  FOREIGN KEY ('id_autore') REFERENCES Autore('id_autore'),
  FOREIGN KEY ('id_ambito') REFERENCES Ambito('id_ambito')
);



CREATE TABLE Annuncio(
	'id_annuncio' int NOT NULL AUTO_INCREMENT,
	'isbn_libro' varchar(13),
	'id_persona' varchar(20),
	'corso' int,
	'citta_consegna' int,
	'se_spedisce' tinyint(1) NOT NULL,
	'descrizione' varchar(200) NOT NULL,
	'condizione' ENUM('1', '2', '3', '4', '5') NOT NULL,
	PRIMARY KEY ('id_annuncio'),
	FOREIGN KEY ('isbn_libro') REFERENCES Libro('isbn'),
	FOREIGN KEY ('id_persona') REFERENCES Persona('username'),
	FOREIGN KEY ('citta_consegna') REFERENCES Citta('id_citta')
);

CREATE TABLE AnnunciOsservati(
  'id_annuncio' int NOT NULL AUTO_INCREMENT,
	'utente' varchar(20),
	'annuncio' int,
	'data_aggiunta' date NOT NULL,
	PRIMARY KEY ('id_annuncio'),
	FOREIGN KEY ('utente') REFERENCES Persona('username'),
	FOREIGN KEY ('annuncio') REFERENCES Annunio('id_annuncio')


);

CREATE TABLE Messaggio(
	'id_utente' VARCHAR (20),
	'id_annuncio' int,
	'data' DATE NOT NULL,
	'ora' TIME NOT NULL,
	'testo' VARCHAR (200),
	PRIMARY KEY('id_utente','id_annuncio','data','ora'),
	FOREIGN KEY ('id_utente') REFERENCES Persona('username'),
	FOREIGN KEY ('id_annuncio') REFERENCES Annuncio('id_annuncio')
);