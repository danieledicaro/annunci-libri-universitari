CREATE TABLE Autore(
  `id_autore` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  PRIMARY KEY (`id_autore`)
);

CREATE TABLE CasaEditrice(
  `id_casaeditrice` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  PRIMARY KEY (`id_casaeditrice`)
);

CREATE TABLE Stato(
  `id_stato` VARCHAR(2) NOT NULL,
  `nome` VARCHAR(50),
  PRIMARY KEY (`id_stato`)
 );

CREATE TABLE Ambito(
  `id_ambito` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  PRIMARY KEY (`id_ambito`)
 );

CREATE TABLE Citta(
  `id_citta` int(10) NOT NULL AUTO_INCREMENT,
  `comune` VARCHAR(60) NOT NULL,
  `provincia` VARCHAR(60) NOT NULL,
  `id_stato` VARCHAR(2),
  PRIMARY KEY (`id_citta`),
    KEY `fk_citta_stato` (`id_stato`)
 );



CREATE TABLE Universita(
  `id_universita` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
   `citta` int(10),
    KEY `fk_universita_citta`(citta),
  PRIMARY KEY (`id_universita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE Professore(
  `id_professore` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  PRIMARY KEY (`id_professore`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE Corso(
  `id_corso` int(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  `universita` int(10) NOT NULL,
  `professore` int(10) NOT NULL,
    KEY `fk_corso_universita`(`universita`),
    KEY `fk_corso_professore`(`professore`),
  PRIMARY KEY (`id_corso`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE AutoriLibri(
    id int(10) NOT NULL AUTO_INCREMENT,
    autore int(10) NOT NULL,
    libro varchar(13) NOT NULL,
    PRIMARY KEY (id),
    KEY `fk_autorilibri_autore`(`autore`),
    KEY `fk_autorilibri_libro`(`libro`)
);




CREATE TABLE Persona (
	`username`  varchar(20) NOT NULL,
	`password` varchar(20) NOT NULL,
	`tipologia_utente` int NOT NULL,
        `nome`  varchar(20),
	`cognome`  varchar(20),
	`mail`  varchar(40) NOT NULL,
	`id_stato`  varchar(2),
	PRIMARY KEY(`username`),
        KEY `fk_persona_stato`(`id_stato`)
        
);



CREATE TABLE Libro(
	`isbn` varchar(13) NOT NULL,
	`titolo` varchar(100) NOT NULL,
	`anno_stampa` YEAR NOT NULL,
	`id_casaeditrice` int(10),
	`id_ambito` int(10),
  PRIMARY KEY(`isbn`),
    KEY `fk_libro_casaeditrice`(`id_casaeditrice`),
    KEY `fk_libro_ambito`(`id_ambito`)
);



CREATE TABLE Annuncio(
	`id_annuncio` int(10) NOT NULL AUTO_INCREMENT,
	`isbn_libro` varchar(13),
	`id_persona` varchar(20),
	`corso` int(10),
	`citta_consegna` int(10),
	`se_spedisce` tinyint(1) NOT NULL,
	`descrizione` varchar(200) NOT NULL,
	`condizione`  ENUM ('1','2','3','4','5') NOT NULL,
	PRIMARY KEY (`id_annuncio`),
    KEY `fk_annuncio_libro`(`isbn_libro`),
    KEY `fk_annuncio_persona`(`id_persona`),
    KEY `fk_annuncio_corso`(`corso`),
    KEY `fk_annuncio_citta`(`citta_consegna`)
        
);

    

CREATE TABLE AnnunciOsservati(
  `id_annuncio` int(10) NOT NULL AUTO_INCREMENT,
	`utente` varchar(20),
	`annuncio` int(10),
	`data_aggiunta` date NOT NULL,
	PRIMARY KEY (`id_annuncio`),
        KEY `fk_annunciOsservati_utente`(`utente`),
        KEY `fk_annunciOsservati_annuncio`(`annuncio`)


);

CREATE TABLE Messaggio(
	`acquirente` VARCHAR (20),
	`id_annuncio` int(10),
	`data` DATE NOT NULL,
	`ora` TIME NOT NULL,
	`testo` VARCHAR (200),
        `da_acquirente` tinyint(1) NOT NULL,
        KEY `fk_messaggio_persona`(`acquirente`),
        KEY `fk_messaggio_annuncio`(`id_annuncio`),
	PRIMARY KEY(`acquirente`,`id_annuncio`,`data`,`ora`)
);

ALTER TABLE Citta
    ADD CONSTRAINT `fk_citta_stato`
        FOREIGN KEY (`id_stato`) REFERENCES Stato(`id_stato`);

ALTER TABLE Corso
    ADD CONSTRAINT `fk_corso_universita`
        FOREIGN  KEY (`universita`) REFERENCES Universita (`id_universita`),
    ADD CONSTRAINT `fk_corso_professore`
        FOREIGN  KEY (`professore`) REFERENCES Professore (`id_professore`);

ALTER TABLE Persona
    ADD CONSTRAINT `fk_persona_stato`
	FOREIGN KEY (`id_stato`) REFERENCES Stato (`id_stato`);

ALTER TABLE Libro
    ADD  CONSTRAINT `fk_libro_casaeditrice`
        FOREIGN KEY (`id_casaeditrice`) REFERENCES CasaEditrice(`id_casaeditrice`),
    ADD CONSTRAINT `fk_libro_ambito`
        FOREIGN KEY (`id_ambito`) REFERENCES Ambito(`id_ambito`);

ALTER TABLE Annuncio
    ADD CONSTRAINT `fk_annuncio_libro`
	FOREIGN KEY (`isbn_libro`) REFERENCES Libro(`isbn`),
    ADD CONSTRAINT `fk_annuncio_persona`
	FOREIGN KEY (`id_persona`) REFERENCES Persona(`username`),
    ADD CONSTRAINT `fk_annuncio_citta`
	FOREIGN KEY (`citta_consegna`) REFERENCES Citta(`id_citta`),
    ADD CONSTRAINT `fk_annuncio_corso`
        FOREIGN KEY (`corso`) REFERENCES Corso(`id_corso`);

ALTER TABLE AnnunciOsservati
    ADD CONSTRAINT `fk_annunciOsservati_utente`
	FOREIGN KEY (`utente`) REFERENCES Persona(`username`),
    ADD CONSTRAINT `fk_annunciOsservati_annuncio`
	FOREIGN KEY (`annuncio`) REFERENCES Annuncio(`id_annuncio`);

ALTER TABLE Messaggio
    ADD CONSTRAINT `fk_messaggio_persona`
	FOREIGN KEY (`acquirente`) REFERENCES Persona(`username`),
    ADD CONSTRAINT `fk_messaggio_annuncio`
	FOREIGN KEY (`id_annuncio`) REFERENCES Annuncio(`id_annuncio`);

ALTER TABLE Universita
    ADD CONSTRAINT `fk_universita_citta`
	FOREIGN KEY (`citta`) REFERENCES Citta(`id_citta`);


ALTER TABLE AutoriLibri
    ADD CONSTRAINT `fk_autorilibri_autore`
	FOREIGN KEY (`autore`) REFERENCES Autore(`id_autore`)
    ADD CONSTRAINT `fk_autorilibri_libro`
	FOREIGN KEY (`libro`) REFERENCES Libro(`isbn`);