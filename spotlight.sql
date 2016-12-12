-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 02:03 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `spotlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `atores`
--

CREATE TABLE `atores` (
  `_id_ator` serial NOT NULL,
  `nome_ator` varchar(255) DEFAULT NULL,
  `nasc_ator` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atores`
--

INSERT INTO `atores` (`_id_ator`, `nome_ator`, `nasc_ator`) VALUES
('1', 'Marlon Brando', '1924-04-03'),
('2', 'Al Pacino', '1940-04-25'),
('3', 'James Caan', '1940-03-26'),
('4', 'Robert De Niro', '1943-07-17'),
('5', 'Robert Duvall', '1931-01-05'),
('6', 'Will Smith', '1968-09-25'),
('7', 'Jared Leto', '1971-12-26'),
('8', 'Margot Robbie', '1990-08-02'),
('9', 'Jane Fonda', '1937-12-21'),
('10', 'Jon Voight', '1938-12-29'),
('11', 'Bruce Dern', '1936-06-04'),
('12', 'Mike Myers', '1963-05-25'),
('13', 'Dana Carvey', '1955-06-02'),
('14', 'Rob Lowe', '1964-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `comentario_forum`
--

CREATE TABLE `comentario_forum` (
  `ID` int(11) NOT NULL,
  `user_coment` varchar(255) DEFAULT NULL,
  `flag_report` tinyint(1) DEFAULT NULL,
  `topico_forumnome_topico` varchar(255) NOT NULL,
  `Utilizadoruser_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `filmes`
--

CREATE TABLE `filmes` (
  `_id_filmes` serial NOT NULL,
  `filme` varchar(255) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `classif` decimal(19,0) DEFAULT NULL,
  `data_lanc` date DEFAULT NULL,
  `realizador` varchar(255) DEFAULT NULL,
  `imdb_rating` float DEFAULT NULL,
  `ost_rating` float DEFAULT NULL,
  `flag_filme_add` tinyint(1) DEFAULT '1',
  `flag_filme_estreia` tinyint(1) DEFAULT '1',
  `Utilizadoruser_name` varchar(255) NOT NULL DEFAULT 'gestor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmes`
--

INSERT INTO `filmes` (`_id_filmes`, `filme`, `image`, `classif`, `data_lanc`, `realizador`, `imdb_rating`, `ost_rating`, `flag_filme_add`, `flag_filme_estreia`, `Utilizadoruser_name`) VALUES
('1', 'The Godfather', 'assets/images/the_godfather.jpg', '17', '1972-10-24', 'Francis Ford Coppola', 9.2, 89, 1, 1, 'gestor'),
('2', 'The Godfather: Part II', 'assets/images/the_godfather_II.jpg', '16', '1977-10-14', 'Francis Ford Coppola', 9, 88.3, 1, 1, 'gestor'),
('3', 'Suicide Squad', 'assets/images/suicide_squad.jpg', '14', '2016-08-04', 'David Ayer', 6.5, 91.3, 1, 1, 'gestor'),
('4', 'Coming Home', 'assets/images/coming_home.jpg', NULL, '1978-02-15', 'Hal Ashby', 7.3, NULL, 1, 1, 'gestor'),
('5', 'Wayne\'s World', 'assets/images/waynes_world.jpg', '12', '1992-02-22', 'Penelope Spheeris', 7, NULL, 1, 1, 'gestor');

-- --------------------------------------------------------

--
-- Table structure for table `filmes_atores`
--

CREATE TABLE `filmes_atores` (
  `filmes_id_filmes` decimal(19,0) NOT NULL,
  `atores_id_ator` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmes_atores`
--

INSERT INTO `filmes_atores` (`filmes_id_filmes`, `atores_id_ator`) VALUES
('1', '1'),
('1', '2'),
('2', '2'),
('1', '3'),
('2', '4'),
('2', '5'),
('3', '6'),
('3', '7'),
('3', '8'),
('4', '9'),
('4', '10'),
('4', '11'),
('5', '12'),
('5', '13'),
('5', '14');

-- --------------------------------------------------------

--
-- Table structure for table `filmes_generos`
--

CREATE TABLE `filmes_generos` (
  `filmes_id_filmes` decimal(19,0) NOT NULL,
  `generos_id_genero` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmes_generos`
--

INSERT INTO `filmes_generos` (`filmes_id_filmes`, `generos_id_genero`) VALUES
('1', 1),
('2', 1),
('4', 1),
('1', 2),
('2', 2),
('3', 3),
('3', 4),
('3', 5),
('4', 6),
('4', 7),
('5', 8),
('5', 9);

-- --------------------------------------------------------

--
-- Table structure for table `filmes_musicas`
--

CREATE TABLE `filmes_musicas` (
  `filmes_id_filmes` decimal(19,0) NOT NULL,
  `musicas_id_musica` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmes_musicas`
--

INSERT INTO `filmes_musicas` (`filmes_id_filmes`, `musicas_id_musica`) VALUES
('1', 1),
('1', 2),
('1', 3),
('1', 4),
('1', 5),
('1', 6),
('2', 7),
('2', 8),
('2', 9),
('2', 10),
('2', 11),
('2', 12),
('3', 13),
('4', 13),
('3', 14),
('5', 14),
('3', 15),
('3', 16),
('4', 17),
('4', 18),
('5', 19);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `_id_genero` serial NOT NULL,
  `nome_genero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`_id_genero`, `nome_genero`) VALUES
(1, 'Drama'),
(2, 'Crime'),
(3, 'Action'),
(4, 'Adventure'),
(5, 'Fantasy'),
(6, 'Romance'),
(7, 'War'),
(8, 'Comedy'),
(9, 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `passwd`) VALUES
(1, 'afvc', 'afvc');

-- --------------------------------------------------------

--
-- Table structure for table `musicas`
--

CREATE TABLE `musicas` (
  `_id_musica` serial NOT NULL,
  `nome_musica` varchar(255) NOT NULL,
  `m_generos` varchar(255) DEFAULT NULL,
  `m_ano` year(4) DEFAULT NULL,
  `cantor` varchar(255) DEFAULT NULL,
  `flag_musicas_novas` tinyint(1) DEFAULT '1',
  `Utilizadoruser_name` varchar(255) NOT NULL DEFAULT 'gestor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musicas`
--

INSERT INTO `musicas` (`_id_musica`, `nome_musica`, `m_generos`, `m_ano`, `cantor`, `flag_musicas_novas`, `Utilizadoruser_name`) VALUES
(1, 'Main Title (The Godfather Waltz)', NULL, NULL, NULL, 1, 'gestor'),
(2, 'I Have But One Heart', NULL, NULL, 'Al Martino', 1, 'gestor'),
(3, 'The Pickup', NULL, NULL, NULL, 1, 'gestor'),
(4, 'Connie\'s Wedding', NULL, NULL, NULL, 1, 'gestor'),
(5, 'The Halls of Fear', NULL, NULL, NULL, 1, 'gestor'),
(6, 'Sicilian Pastorale', NULL, NULL, NULL, 1, 'gestor'),
(7, 'Main Title/The Immigrant', NULL, NULL, NULL, 1, 'gestor'),
(8, 'A New Carpet', NULL, NULL, NULL, 1, 'gestor'),
(9, 'Kay', NULL, NULL, NULL, 1, 'gestor'),
(10, 'Ev\'ry Time I Look In Your Eyes/After the Party', NULL, 1974, 'Nino Rota', 1, 'gestor'),
(11, 'Vito and Abbandando', NULL, NULL, NULL, 1, 'gestor'),
(12, 'Senza Mamma/Ciuri-Ciuri/Napule Ve Salute', NULL, NULL, NULL, 1, 'gestor'),
(13, 'Sympathy for the Devil', NULL, 1968, 'The Rolling Stones', 1, 'gestor'),
(14, 'Bohemian Rhapsody', 'Rock', 1975, 'Queen', 1, 'gestor'),
(15, 'Without Me', 'Rap', 2002, 'Eminem', 1, 'gestor'),
(16, 'Heathens', NULL, 2016, 'Twenty One Pilots', 1, 'gestor'),
(17, 'Hey Jude', NULL, 1968, 'The Beatles', 1, 'gestor'),
(18, 'My Girl', NULL, 1965, 'The Rolling Stones', 1, 'gestor'),
(19, 'Everything About You', 'Hard rock', 1991, 'Ugly Kid Joe', 1, 'gestor');

-- --------------------------------------------------------

--
-- Table structure for table `topico_forum`
--

CREATE TABLE `topico_forum` (
  `nome_topico` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `Utilizadoremail` varchar(255) NOT NULL,
  `Utilizadoruser_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Utilizador`
--

CREATE TABLE `Utilizador` (
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passw` varchar(255) DEFAULT NULL,
  `tipo_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;