SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `cart_userid` (
  `uzsakymo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cartinfo` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cart_userid` (`uzsakymo_id`, `user_id`, `date`, `cartinfo`) VALUES
(4, 2, '2021-03-07', '{\"KLIJAI99\":{\"aprasymas\":\"Plyteliu0173 klijai Ceresit CM11, 5 kg\",\"kategorija\":\"Statybinu0117s preku0117s\",\"kodas\":\"KLIJAI99\",\"kiekis\":2,\"kaina\":\"2.90\",\"nuotrauka\":\"product-images/klijai.jpg\"}}'),
(5, 1, '2021-03-07', '{\"NILTIL05\":{\"aprasymas\":\"Atitirpinta niliniu0173 tilapiju0173 filu0117, 1 kg\",\"kategorija\":\"u0160vieu017eias maistas\",\"kodas\":\"NILTIL05\",\"kiekis\":2,\"kaina\":\"8.60\",\"nuotrauka\":\"product-images/tilapijos.jpg\"},\"ZIRN1099\":{\"aprasymas\":\"Greitai uu017eu0161aldyti u017eirneliai, 400 g\",\"kategorija\":\"u0160aldytas maistas\",\"kodas\":\"ZIRN1099\",\"kiekis\":\"1\",\"kaina\":\"1.05\",\"nuotrauka\":\"product-images/zirnelia'),
(9, 2, '2021-03-07', '{\"KLIJAI99\":{\"aprasymas\":\"Plyteliu0173 klijai Ceresit CM11, 5 kg\",\"kategorija\":\"Statybinu0117s preku0117s\",\"kodas\":\"KLIJAI99\",\"kiekis\":\"1\",\"kaina\":\"2.90\",\"nuotrauka\":\"product-images/klijai.jpg\"},\"KARPIS01\":{\"aprasymas\":\"u0160vieu017eias skrostas paprastasis karpis su galva, 1kg\",\"kategorija\":\"u0160vieu017eias maistas\",\"kodas\":\"KARPIS01\",\"kiekis\":\"1\",\"kaina\":\"5.90\",\"nuotrauka\":\"product-images/karpi'),
(11, 2, '2021-03-07', '{\"MIDIJ244\":{\"aprasymas\":\"u0160aldytos midijos, 1000g\",\"kategorija\":\"u0160aldytas maistas\",\"kodas\":\"MIDIJ244\",\"kiekis\":\"1\",\"kaina\":\"6.00\",\"nuotrauka\":\"product-images/midijos.jpg\"},\"DVIR5800\":{\"aprasymas\":\"Vyriu0161kas dviratis\",\"kategorija\":\"Laisvalaikio preku0117s\",\"kodas\":\"DVIR5800\",\"kiekis\":\"1\",\"kaina\":\"720.00\",\"nuotrauka\":\"product-images/dviratis.jpg\"}}');

CREATE TABLE `produktai` (
  `id` int(11) NOT NULL,
  `aprasymas` varchar(255) NOT NULL,
  `kodas` varchar(255) NOT NULL,
  `kategorija` varchar(20) DEFAULT NULL,
  `nuotrauka` text NOT NULL,
  `kaina` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produktai` (`id`, `aprasymas`, `kodas`, `kategorija`, `nuotrauka`, `kaina`) VALUES
(1, 'Vyri??kas dviratis', 'DVIR5800', 'Laisvalaikio prek??s', 'product-images/dviratis.jpg', 720.00),
(2, '??vie??ias skrostas paprastasis karpis su galva, 1kg', 'KARPIS01', '??vie??ias maistas', 'product-images/karpis.jpg', 5.90),
(3, 'Plyteli?? klijai Ceresit CM11, 5 kg', 'KLIJAI99', 'Statybin??s prek??s', 'product-images/klijai.jpg', 2.90),
(4, '??aldytos midijos, 1000g', 'MIDIJ244', '??aldytas maistas', 'product-images/midijos.jpg', 6.00),
(5, 'Atitirpinta nilini?? tilapij?? fil??, 1 kg', 'NILTIL05', '??vie??ias maistas', 'product-images/tilapijos.jpg', 8.60),
(6, 'Akmens mas??s plytel??s Montana NELYGI, 30 x 30 cm', 'PLYT8000', 'Statybin??s prek??s', 'product-images/plyteles.jpg', 13.90),
(7, 'Medin??s rogut??s be atlo??o', 'ROG22210', 'Laisvalaikio prek??s', 'product-images/rogutes.jpg', 25.00),
(8, 'Greitai u????aldyti ??irneliai, 400 g', 'ZIRN1099', '??aldytas maistas', 'product-images/zirneliai.jpg', 1.05);

CREATE TABLE `vartotojai` (
  `ID` int(11) NOT NULL,
  `vardas` varchar(20) DEFAULT NULL,
  `pavarde` varchar(30) DEFAULT NULL,
  `slaptazodis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `vartotojai` (`ID`, `vardas`, `pavarde`, `slaptazodis`) VALUES
(1, 'Stefan', 'Joher', 'parduotuve1'),
(2, 'Filamena', 'Gaurona', 'skriestuvas'),
(3, 'Gendalf', 'Warlock', 'magic');

CREATE TABLE `vertinimas` (
  `vartotojo_ID` int(11) DEFAULT NULL,
  `vidurkis` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `vertinimas` (`vartotojo_ID`, `vidurkis`) VALUES
(3, 5),
(1, 3),
(1, 3.6),
(1, 3.4);


ALTER TABLE `cart_userid`
  ADD PRIMARY KEY (`uzsakymo_id`);

ALTER TABLE `produktai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodas` (`kodas`);

ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `vertinimas`
  ADD KEY `vartotojo_ID` (`vartotojo_ID`);


ALTER TABLE `cart_userid`
  MODIFY `uzsakymo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `produktai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `vartotojai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `vertinimas`
  ADD CONSTRAINT `vertinimas_ibfk_1` FOREIGN KEY (`vartotojo_ID`) REFERENCES `vartotojai` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
