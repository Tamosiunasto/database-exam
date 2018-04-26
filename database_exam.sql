SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `text` text NOT NULL,
  `superhero_from` int(8) NOT NULL,
  `superhero_to` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `text`, `superhero_from`, `superhero_to`) VALUES
(5, 'Hello Spider-Man! Hohoho', 1, 2),
(6, 'Hello', 1, 1),
(7, 'Hello', 1, 1);

CREATE TABLE `likes` (
  `id` int(8) NOT NULL,
  `superhero_from` int(8) NOT NULL,
  `superhero_to` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `likes` (`id`, `superhero_from`, `superhero_to`) VALUES
(17, 1, 2),
(18, 1, 2),
(19, 1, 2),
(20, 1, 2),
(21, 1, 2),
(22, 1, 2),
(23, 1, 3),
(24, 1, 3),
(25, 1, 3),
(26, 1, 3),
(27, 1, 3),
(28, 1, 2),
(29, 1, 1),
(30, 1, 1),
(31, 1, 1),
(32, 1, 2),
(33, 1, 2),
(34, 1, 2),
(35, 1, 2),
(36, 1, 2),
(37, 1, 2),
(38, 1, 2),
(39, 1, 2),
(40, 1, 2),
(41, 1, 2);

CREATE TABLE `superheroes` (
  `id` int(8) NOT NULL,
  `full_name` varchar(16) NOT NULL,
  `nickname` varchar(16) NOT NULL,
  `superpower` varchar(16) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `superheroes` (`id`, `full_name`, `nickname`, `superpower`, `description`) VALUES
(1, 'Jack Napier', 'Joker', 'Criminality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut justo pharetra, ultrices nibh facilisis, bibendum risus. Nunc ligula tellus, venenatis in congue at, dapibus id eros.'),
(2, 'Peter Parker', 'Spider-Man', 'Web', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor augue ut enim ultricies condimentum. Nam ornare aliquam mauris quis porttitor.'),
(3, 'Clark Kent', 'Superman', 'Strength', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque molestie, massa sed sagittis pharetra, lectus elit eleifend dolor, vitae tempus est dui vitae leo. Integer porta neque elit, at cursus elit pharetra a. Nam tincidunt facilisis tortor id euismod. Aliquam erat volutpat. Nulla pharetra sem non libero faucibus congue. Curabitur vel iaculis diam. Aliquam elit nulla, malesuada eu magna nec, semper mollis elit. Fusce tristique mi felis.');


ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_from` (`superhero_from`),
  ADD KEY `user_to` (`superhero_to`);

ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_from` (`superhero_from`),
  ADD KEY `superhero_to` (`superhero_to`);

ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `likes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `superheroes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`id`);

ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`superhero_from`) REFERENCES `superheroes` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`superhero_to`) REFERENCES `superheroes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
