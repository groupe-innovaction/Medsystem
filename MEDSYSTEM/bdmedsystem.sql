-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2018 at 01:00 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdmedsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `idDossier` int(11) NOT NULL AUTO_INCREMENT,
  `taille` varchar(50) NOT NULL,
  `poids` varchar(50) NOT NULL,
  `tensionArt` varchar(50) NOT NULL,
  `pouls` varchar(30) NOT NULL,
  `motifConsultation` varchar(255) NOT NULL,
  `observation` varchar(255) NOT NULL,
  `dateConsultation` varchar(30) NOT NULL,
  `consulterParnom` varchar(50) NOT NULL,
  `consulterParprenom` varchar(30) NOT NULL,
  `siteDuConsulation` varchar(30) NOT NULL,
  `id_duPatient` int(11) NOT NULL,
  PRIMARY KEY (`idDossier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dossiers`
--

INSERT INTO `dossiers` (`idDossier`, `taille`, `poids`, `tensionArt`, `pouls`, `motifConsultation`, `observation`, `dateConsultation`, `consulterParnom`, `consulterParprenom`, `siteDuConsulation`, `id_duPatient`) VALUES
(7, '2m', '50 kg', '10/7', '40', 'Migraine', 'blablablablablablabla', '29 May 2018 20:40:43', 'NOJER', 'Rony Victor', 'OUEST', 4),
(8, '1.60m', '50 kg', '10/7', '40', 'Fievre', 'oooooooooooooooook', '31 May 2018 13:55:13', 'Jenjean', 'toto', 'Centre', 27),
(9, '1.61m', '43kg', '12/10', '48', 'Infection', 'Blablablablablablablablabla', '01 June 2018 20:07:46', 'Jenjean', 'toto', 'Centre', 34);

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE IF NOT EXISTS `logintable` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `nif` varchar(255) NOT NULL,
  `statutm` varchar(255) NOT NULL,
  `lns` varchar(255) NOT NULL,
  `dns` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `dateins` varchar(255) NOT NULL,
  `photoutilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1020 ;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`idlogin`, `nom`, `prenom`, `username`, `statut`, `mail`, `nif`, `statutm`, `lns`, `dns`, `sexe`, `fonction`, `site`, `adresse`, `password`, `telephone1`, `telephone2`, `dateins`, `photoutilisateur`) VALUES
(1000, 'FABIEN', 'Louce Kerdely', 'sup', 'En Fonction', 'loosker95@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Marmelade', '1995-03-13', 'Masculin', 'super-administrateur', 'CENTRALE', 'Delmas', '12345678', '37634461', '37634461', '13 March 2018', 'Adm.jpg'),
(1001, 'FABIEN', 'Louce Kerdely', 'med', 'En Fonction', 'loosker@gmail.com', '1234-53-15-1324-18', 'MariÃ© (e)', 'Marmelade', '1995-03-01', 'Masculin', 'Medecin', 'ARTIBONITE', 'Delmas', '12345678', '1234567', '1234567', '15 March 2018', 'Adm.jpg'),
(1002, 'TELEMAQUE', 'Astrel', 'sec', 'En Fonction', 'astdad@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Cap-Haitien', '1990-05-01', 'Masculin', 'Secretaire', 'Centre', 'Delmas', '12345678', '12345678', '12345678', '15 March 2018', 'Adm.jpg'),
(1003, 'NOEL', 'Guively', 'adm', 'En Fonction', 'noelguively@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Cap-Haitien', '1990-05-02', 'Masculin', 'ADMINISTRATEUR', 'ARTIBONITE', 'Clercine', '12345678', '1234567', '1234567', '15 March 2018', 'Loos.jpg'),
(1004, 'NOJER', 'Rony Victor', 'inf', 'En Fonction', 'nojerrony@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Mirebalais', '1990-05-02', 'Masculin', 'infirmiere', 'OUEST', 'Tabarre', '12345678', '1234567', '1234567', '15 March 2018', 'Loos.jpg'),
(1009, 'ACHILLE', 'Peterson', 'peter', 'En Fonction', 'peter@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Cap-Haitien', '2018-04-13', 'Masculin', 'ADMINISTRATEUR', 'Centre', 'Delmas 33', '12345678', '1234567', '', '06 April 2018', 'Loos.jpg'),
(1014, 'ACHILLE', 'Peterson', 'peterr', 'En Fonction', 'peterr@gmail.com', '1234-53-15-1324-18', 'Celibataire', 'Marmelade', '2018-04-11', 'Masculin', 'SECRETAIRE', 'Ouest', 'Delmas 33', '12345678', '1234567', '', '07 April 2018', 'Adm.jpg'),
(1016, 'JOSEPH', 'Annie', 'anne', 'En Fonction', 'anne@gmail.com', '1234-65-1764-19-19', 'MariÃ© (e)', 'Port-au-prince', '22 May 2018', 'Masculin', 'Secretaire', 'ARTIBONITE', 'Centre ville', '12345678', '+509 123 45 67', '+509 123 45 67', '22 May 2018', 'Loos.jpg'),
(1019, 'Jenjean', 'toto', 'toto', 'En Fonction', 'toto@gmail.com', '1324-373-373-626', 'MariÃ© (e)', 'Port-au-prince', '2018-05-10', 'Masculin', 'infirmiere', 'Centre', 'Centre ville', '12345678', '+509 123 45 67', '+509 123 45 67', '29 May 2018', 'IMG_7585.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idmessages` int(11) NOT NULL AUTO_INCREMENT,
  `envoyerPar` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `cle` varchar(30) NOT NULL,
  PRIMARY KEY (`idmessages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `idPatient` int(11) NOT NULL AUTO_INCREMENT,
  `nomPatient` varchar(255) NOT NULL,
  `prenomPatient` varchar(255) NOT NULL,
  `datedenaissancePatient` varchar(255) NOT NULL,
  `lieudenaissancePatient` varchar(255) NOT NULL,
  `adressePatient` varchar(255) NOT NULL,
  `telephonePatient` varchar(255) NOT NULL,
  `statutmPatient` varchar(255) NOT NULL,
  `professionPatient` varchar(255) NOT NULL,
  `referencePatient` varchar(255) NOT NULL,
  `telephonerferencePatient` varchar(255) NOT NULL,
  `antmedicauxPatient` varchar(255) NOT NULL,
  `antchurigicauxPatient` varchar(255) NOT NULL,
  `antecedentfPatient` varchar(255) NOT NULL,
  `allergiesPatient` varchar(255) NOT NULL,
  `taillePatient` varchar(255) NOT NULL,
  `poidsPatient` varchar(255) NOT NULL,
  `groupesanguin` varchar(255) NOT NULL,
  `indicateursbiologique` varchar(255) NOT NULL,
  `dateCreationPatient` varchar(255) NOT NULL,
  `SiteCreationPatient` varchar(255) NOT NULL,
  `nomAuteurPatient` varchar(255) NOT NULL,
  `prenomAuteurPatient` varchar(255) NOT NULL,
  `idRendezVous` int(11) NOT NULL,
  PRIMARY KEY (`idPatient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`idPatient`, `nomPatient`, `prenomPatient`, `datedenaissancePatient`, `lieudenaissancePatient`, `adressePatient`, `telephonePatient`, `statutmPatient`, `professionPatient`, `referencePatient`, `telephonerferencePatient`, `antmedicauxPatient`, `antchurigicauxPatient`, `antecedentfPatient`, `allergiesPatient`, `taillePatient`, `poidsPatient`, `groupesanguin`, `indicateursbiologique`, `dateCreationPatient`, `SiteCreationPatient`, `nomAuteurPatient`, `prenomAuteurPatient`, `idRendezVous`) VALUES
(27, 'Toussaint', 'Barbara', '30 May 2018', 'Mirbalais', 'Bourdon', '+509 12345678', 'MariÃ© (e)', 'Etudiante', 'jacques', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.80m', '70kg', 'AB+', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 0),
(28, 'Toussaint', 'Barbara', '30 May 2018', 'Mirbalais', 'Bourdon', '+509 12345678', 'MariÃ© (e)', 'Etudiante', 'jacques', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.80m', '70kg', 'AB+', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 0),
(34, 'Gerald', 'Sonson', '2018-05-10', 'Jeremie', 'Carrefour', '+509 12345678', 'DivorcÃ© (e)', 'Charpentre', 'jacques Sonson', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.80m', '70kg', 'B-', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 0),
(35, 'Noel', 'Ruth', '2018-05-10', 'Jacmele', 'Delmas', '+509 12345678', 'Celibataire', 'Comptable', 'Noel Guively', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.15m', '75kg', 'O+', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 0),
(36, 'Zache', 'Junior', '2018-05-16', 'Port-De-Paix', 'Sarthe', '+509 12345678', 'Celibataire', 'Voiturier', 'Zache xxx', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.23m', '45kg', 'B-', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 20),
(37, 'Fracklin', 'Marc', '2018-05-16', 'Hinche', 'Croix-des-bouquets', '+509 12345678', 'MariÃ© (e)', 'Chauffeur', 'Fracklin abc', '+509 12345678', 'Fievres', 'abdcef', 'Migraine', 'chocolat', '1.38m', '73kg', 'O+', 'IBiologique', '01 JUNE 2018', 'Centre', 'TELEMAQUE', 'Astrel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
  `idPrescription` int(11) NOT NULL AUTO_INCREMENT,
  `prescription` text NOT NULL,
  `NomAuteurPrescription` varchar(30) NOT NULL,
  `PrenomAuteurPrescription` varchar(30) NOT NULL,
  `dateDuPrescription` varchar(30) NOT NULL,
  `id_Dossier` int(11) NOT NULL,
  PRIMARY KEY (`idPrescription`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`idPrescription`, `prescription`, `NomAuteurPrescription`, `PrenomAuteurPrescription`, `dateDuPrescription`, `id_Dossier`) VALUES
(1, 'B-complex 3 fois par jour', 'FABIEN', 'Louce Kerdely', '15 May 2018', 4),
(2, 'Alpalide 3 fois par jour', 'FABIEN', 'Louce Kerdely', '15 May 2018', 3),
(3, 'Ampiciline 2 fois par jour', 'FABIEN', 'Louce Kerdely', '15 May 2018', 3),
(4, 'Heptopep 2 cuilleres (1Matin, 1Soir)', 'FABIEN', 'Louce Kerdely', '15 May 2018', 3),
(5, 'Vitamine plus 2 cuilleres par jour', 'FABIEN', 'Louce Kerdely', '16 May 2018', 4),
(7, 'Amoxiciline 3fois par jour', 'FABIEN', 'Louce Kerdely', '21 May 2018', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

CREATE TABLE IF NOT EXISTS `rendezvous` (
  `idRDV` int(11) NOT NULL AUTO_INCREMENT,
  `nomrdv` varchar(255) NOT NULL,
  `prenomrdv` varchar(255) NOT NULL,
  `telephonerdv` varchar(255) NOT NULL,
  `daternaissancerdv` varchar(255) NOT NULL,
  `Confirmerdaterdv` varchar(255) NOT NULL,
  `Confirmerheurerdv` varchar(255) NOT NULL,
  `Annulerrdv` varchar(255) NOT NULL,
  `Departementrdv` varchar(255) NOT NULL,
  `Etatrdv` varchar(255) NOT NULL,
  `mailrdv` varchar(255) NOT NULL,
  `sexerdv` varchar(255) NOT NULL,
  `siterdv` varchar(255) NOT NULL,
  `Symptomesrdv` varchar(255) NOT NULL,
  `identifiantPatient` int(11) NOT NULL,
  PRIMARY KEY (`idRDV`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `rendezvous`
--

INSERT INTO `rendezvous` (`idRDV`, `nomrdv`, `prenomrdv`, `telephonerdv`, `daternaissancerdv`, `Confirmerdaterdv`, `Confirmerheurerdv`, `Annulerrdv`, `Departementrdv`, `Etatrdv`, `mailrdv`, `sexerdv`, `siterdv`, `Symptomesrdv`, `identifiantPatient`) VALUES
(1, 'FABIEN', 'Louce Kerdely', '+509 123 45 67', '2018-05-01', '2018-05-17', '03:30', 'Non', 'Ophtalmologie', 'Valide', 'loosker95@gmail.com', 'Feminin', 'Ouest', 'blabla', 0),
(16, 'FAFA', 'Loosker', '+509 123 45 67', '2018-05-02', '', '', 'Oui', 'Ophtalmologie', 'Demande', 'loosker95@gmail.com', 'Masculin', 'Artibonite', 'blablablabla', 0),
(19, 'FABIEN', 'Loosker95', '+509 123 45 67', '2018-05-10', '2018-05-16', '21:00', 'Non', 'Ophtalmologie', 'Valide', 'loosker95@gmail.com', 'Masculin', 'Centre', 'Rhume', 0),
(20, 'NOEL', 'Guively', '+509 123 45 67', '1990-01-10', '2018-05-10', '09:30', 'Non', 'Ophtalmologie', 'Valide', 'guivelynoel@gmail.com', 'Masculin', 'Centre', 'Migraine', 0),
(21, 'PREDESTIN', 'Jackson', '+509 123 45 67', '1990-01-17', '25 May 2018', '00:00', 'Non', 'Pediatrie', 'Valide', 'predestinjackson@gmail.com', 'Masculin', 'Artibonite', 'Vertige', 0),
(23, 'ACHILLE', 'Peterson', '+509 123 45 67', '2018-05-10', '', '', 'Non', 'Pediatrie', 'Demande', 'achillepeterson@gmail.com', 'Masculin', 'Centre', 'Douleur', 0),
(24, 'TELEMAQUE', 'Astrel', '+509 123 45 67', '2018-05-22', '2018-05-20', '03:30', 'Non', 'Ophtalmologie', 'Valide', 'astdad@gmail.com', 'Masculin', 'Artibonite', 'Infection', 0),
(25, 'NOJER', 'Rony Victor', '+509 123 45 67', '2018-05-23', '', '', 'Oui', 'Pediatrie', 'Demande', 'nronyvictor@gmail.com', 'Masculin', 'Centre', 'Fievre...', 0),
(36, 'JEAN', 'toto', '+509 123 45 67', '2018-05-10', '', '', 'Non', 'Gynecologique', 'Demande', 'astdad@gmail.com', 'Feminin', 'Centre', 'Grippe', 0),
(38, 'PIERRE', 'Joel', '+509 123 45 67', '2018-05-22', '2018-05-11', '10:30', 'Non', 'Ophtalmologie', 'Valide', 'guivelynoel@gmail.com', 'Masculin', 'Artibonite', 'Infection', 0),
(39, 'HENRY ', 'Christophe', '+509 12345678', '25 May 2018', '', '', 'Non', 'Gynecologique', 'Demande', 'christophe@gmail.com', 'Masculin', 'Artibonite', 'Allergie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `siteweb`
--

CREATE TABLE IF NOT EXISTS `siteweb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(50) NOT NULL,
  `destinataire` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
