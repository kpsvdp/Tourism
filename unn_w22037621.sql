-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2023 at 11:45 PM
-- Server version: 5.5.58-0+deb7u1-log
-- PHP Version: 5.6.31-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unn_w22037621`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`bookingID` mediumint(8) NOT NULL,
  `excursionID` mediumint(8) NOT NULL,
  `customerID` mediumint(8) NOT NULL,
  `excursion_date` datetime NOT NULL,
  `num_guests` mediumint(2) NOT NULL,
  `total_booking_cost` decimal(7,2) NOT NULL,
  `booking_notes` text
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `excursionID`, `customerID`, `excursion_date`, `num_guests`, `total_booking_cost`, `booking_notes`) VALUES
(11, 1, 5, '2023-01-27 00:00:00', 54, '3780.00', 'need a bus service'),
(12, 4, 5, '2023-01-26 00:00:00', 2, '120.00', 'couple package');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customerID` mediumint(8) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `customer_forename` varchar(255) NOT NULL,
  `customer_surname` varchar(255) NOT NULL,
  `customer_email` varchar(64) NOT NULL,
  `date_of_birth` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `username`, `password_hash`, `customer_forename`, `customer_surname`, `customer_email`, `date_of_birth`) VALUES
(5, 'pavansai', 'ddbb86fee606c50d442f9b6847e526ee', 'pavan', 'sai', 'pavansai@gmail.com', '2023-01-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `excursions`
--

CREATE TABLE IF NOT EXISTS `excursions` (
`excursionID` mediumint(8) NOT NULL,
  `excursion_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price_per_person` decimal(7,2) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excursions`
--

INSERT INTO `excursions` (`excursionID`, `excursion_name`, `description`, `price_per_person`, `location`) VALUES
(1, 'Eiffel tower tour', 'The Eiffel Tower is a iron tower on the Champ de Mars in Paris, France. Which named after the engineer Gustave Eiffel, whose company designed and built the tower, was constructed from 1887 to 1889. the world most recognized structure and a cultural icon of France is the most visited monument 6.91 million people till 2015\r\n\r\nThe tower is 330 meters (1,083 ft) tall, about the same height as an 81-storey building, and the tallest structure in Paris. Its base is square, measuring 125 meters (410 ft) on each side. The tower has three levels for visitors, with restaurants on the first and second levels. The top level''s upper platform is 276 m (906 ft) above the ground, the highest observation deck accessible to the public in the European Union. Tickets can be purchased to ascend by stairs or lift to the first and second levels. The climb from ground level to the first level is over 300 steps, as is the climb from the first level to the second, making the entire ascent a 600 step climb. Although there is a staircase to the top level, it is usually accessible only by lift.', '70.00', 'Paris'),
(2, 'Loire Valley Chateaux', 'Traveling through the Loire Valley gives the impression of stepping into a children storybook. Turreted fairy-tale castles grace the enchanting countryside of dense woodlands and gently flowing rivers. The entire area of the Loire Valley, a lush area known as the Garden of France, is listed as a UNESCO World Heritage Site.\r\n\r\nThe Chateau de Chambord, built for King Francis I, is the most magnificent chateau Chateau de Chenonceau has a distinctive feminine style and the Chateau de Cheverny is a Neoclassical-style manor house in idyllic surroundings.\r\n\r\nIt is also worth visiting the UNESCO-listed cathedrals in Chartres and Bourges as well as the city of Orleans, where Joan of Arc helped defeat the English army in 1429, and the Chateau Royal d Amboise, the residence of French kings for five hundred years.\r\n\r\n', '100.00', 'central France'),
(3, 'Chateau de Versailles', 'The Chateau de Versailles emblematizes the grandeur of the French monarchy prior to the fall of the Ancien Regime. This UNESCO-listed monument represents a glorious moment of France history, under the reign of Louis XIV (known as the "Sun King"), when the palace set the standard for princely courts in Europe\r\n\r\nBeginning in 1661, Louis XIV transformed his father hunting lodge (a small chateau) into an opulent royal palace. To realize the vision of Louis XIV, esteemed architect Louis Le Vau renovated the chateau of Louis XIII in an elegant neoclassical manner. Later in the 17th century, Jules Hardouin-Mansart created the lavish Baroque interiors, including the Hall of Mirrors.\r\n\r\nThe most spectacular space in the palace is the Hall of Mirrors, where courtiers waited for an audience with His Majesty. This dazzling gallery sparkles with sunlight that enters through the windows and is reflected off hundreds of ornamental mirrors, while dozens of glittering chandeliers and gilded details make the overall impression even more marvelous', '80.00', ' city of Versailles'),
(4, 'Louvre Museum', 'In a stately palace that was once a royal residence, the Louvre Museum ranks among the top European collections of fine arts. Many of Western Civilization most famous works are found here, including the Mona Lisa by Leonardo da Vinci, the Wedding Feast at Cana by Veronese, and the 1st-century-BC Venus de Milo sculpture.\r\nThe collection owes its wealth to the contributions of various kings who lived in the Louvre. Other pieces were added as a result of France treaties with the Vatican and the Republic of Venice, and from the spoils of Napoleon I.\r\n\r\nThe Louvre displays around 35,000 artworks, including countless masterpieces. It impossible to see it all in a day or even in a week. Take a private guided tour or focus on a shortlist of key artworks for the most rewarding experience.', '60.00', 'center of Paris'),
(5, 'Mont Saint-Michel', 'Rising dramatically from a rocky islet off the Normandy coast, the UNESCO-listed Mont Saint-Michel is one of France most striking landmarks. This Pyramid of the Seas is a mystical sight, perched 80 meters above the bay and surrounded by imposing defensive walls and bastions.\r\nThe main tourist attraction, the Abbaye du Mont Saint-Michel is a marvel of medieval architecture with soaring Gothic spires. Visitors are awed by the serene beauty of the Abbey Church, with its harmonious Romanesque nave and ornate high-vaulted choir.\r\n\r\nSince it was built in the 11th century, the Abbey Church has been an important Christian pilgrimage destination, known as The Heavenly Jerusalem. Modern-day pilgrims are still inspired by Mont Saint-Michel and continue the tradition of crossing the bay by foot as it was done in the Middle Ages.', '50.00', 'coast of Normandy'),
(6, 'Jules Hardouin-Mansart', 'Versailles is equally renowned for Les Jardins, formal French gardens featuring decorative pools, perfectly trimmed shrubbery, numerous statues, and magnificent fountains. The gardens were created in the 17th century by renowned landscape designer Andre Le Notre and are surrounded by 800 hectares of lush parkland.\r\n\r\nBeyond the formal gardens is the Domaine de Trianon, which includes Le Grand Trianon palace Le Petit Trianon chateau; and Le Hameau de la Reine (The Queen''s Hamlet), Marie-Antoinette fabricated pastoral village featuring quaint cottages set around a lake. Inspired by rural architecture, the buildings have a weathered finish that was intentionally rendered to lend a rustic look (although the interiors were exquisitely furnished).\r\n\r\nMarie-Antoinette hamlet originally had a working dairy and farm, which served educational purposes for her children. This idyllic spot was designed as a place for Marie-Antoinette to escape from the formality of court life, to take walks and visit with friends. The hamlet provides a rare glimpse of Marie-Antoinette private world.', '50.00', 'Versailles, France'),
(7, 'Cote d Azur', 'The most fashionable stretch of coastline in France, the Cote d Azur extends from Saint-Tropez to Menton near the border with Italy. Cote d Azur translates to Coast of Blue, a fitting name to describe the Mediterranean''s mesmerizing cerulean waters.\r\nTo English speakers, this glamorous seaside destination is known as the French Riviera, words that have a ring of sun-drenched decadence.\r\nDuring summer, the seaside resorts are packed with beach lovers and sun-worshippers. The rich and famous are also found here in their lavish villas and luxury yachts. The town of Nice has panoramic sea views and stellar art museums. Cannes is famous for its celebrity film festival and legendary hotels.\r\n\r\nThe best sandy beaches are found in Antibes, which also has an atmospheric Old Town and superb museums. Saint-Tropez offers fabulous public and private beaches along with the charm of a Provencal fishing village, while Monaco seduces with its exclusive ambience and stunning scenery.\r\n\r\n\r\n\r\n', '80.00', 'Menton'),
(8, 'Provence', 'Provence invites visitors to escape into a dreamy bucolic landscape of olive groves, sun-drenched rolling hills, and deep purple lavender fields, with little villages nestled in the valleys and perched on rocky outcrops. The vibrant scenery has enchanted many famous artists, including Cezanne, Matisse, Chagall, and Picasso\r\nThe rustic natural beauty, country charm, and laid-back atmosphere of Provence allows the region''s art de vivre (art of living) to flourish. Sultry weather encourages leisurely strolls along cobblestone streets and afternoons spent on sunny terraces of outdoor cafes.\r\nAmong the many attractions of Provence is its delicious Mediterranean cuisine, which is based on olive oil, vegetables, and aromatic herbs. Tourists can choose from a wide range of culinary establishments, from family-run bistros to Michelin-starred gastronomic restaurants.\r\nThe quintessential Provencal town, Aix-en-Provence is famous for its colorful open-air markets and the hundreds of fountains that are typical of southern France. Fascinating ancient ruins and traditional festivals distinguish the town of Arles. The medieval city of Avignon is home to the UNESCO-listed Palais de Papes', '70.00', 'southeastern France'),
(9, 'Cathedrale Notre-Dame', 'For more than eight centuries, the magnificence of Chartres Cathedral has inspired the faithful, and some say this sublime sanctuary has restored belief in the doubtful. The UNESCO-listed cathedral exemplifies the glory of medieval Gothic architecture.\r\nThe Chartres Cathedral is renowned for its marvelous stained-glass windows, most dating to the 12th and 13th centuries. Covering 2,500 square meters, the brilliant stained-glass windows allow colorful light to filter into the vast nave, creating an ethereal effect. The intricately detailed windows reveal the incredible craftsmanship in depicting biblical stories.\r\nThe rose windows are especially noteworthy for their incredible size and details. Other highlights are the Passion window, one of the most original in its style and expression, and the Blue Virgin window that dates from the 12th century\r\n\r\n', '50.00', 'Ile de la Cite'),
(10, 'Chamonix-Mont-Blanc', 'The awesome spectacle of Mont Blanc in the French Alps is an unforgettable sight. The highest mountain peak in Europe, Mont Blanc soars to 4,810 meters. Thanks to its elevation, Mont Blanc is always blanketed in snow.\r\n\r\nBeneath its majestic peak is the traditional alpine village of Chamonix, nestled in a high-mountain valley. This quaint little town is filled with historic churches, traditional Alpine restaurants, and charming auberges.\r\nChamonix is a great base for skiing, hiking, rock climbing, and outdoor adventures, or just relaxing. This delightful village is one of the best places to visit in France for inspiring natural scenery and alpine accommodations. Upscale mountain lodges and cozy chalets welcome guests in style', '90.00', ' Mont Blanc'),
(11, 'Alsace Villages', 'Some of the prettiest villages in France are tucked away in the green, rolling hills of Alsace, where the Vosges Mountains border the Rhine River of Germany. These picturesque Alsatian villages feature pastel-painted, half-timbered houses clustered around small parish churches. Cheerful flowering balconies and pedestrian cobblestone streets add to the appeal.\r\n\r\nMany of the villages have won France Villages Fleuris award for their lovely floral decorations, such as Obernai, with its characteristic burghers houses; the charming little village of Ribeauville, where many homes are adorned with potted flowers the town of art and history Guebwiller and the captivating medieval village of Bergheim.', '100.00', 'eastern France'),
(12, 'Carcassonne', 'With its turreted towers and crenellated ramparts, Carcassonne seems straight out of a fairy-tale scene. This well-preserved (and renovated) fortified city offers a total immersion into the world of the Middle Ages.\r\n\r\nKnown as La Cite, the UNESCO-listed walled medieval town of Carcassonne is a warren of narrow, winding cobblestone lanes and quaint old houses. Nearly every street, square, and building has retained its historic character. Within la Cite, the 12th-century Chateau Comtal reveals the Cathar heritage of the Languedoc region.', '80.00', 'French city');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `excursions`
--
ALTER TABLE `excursions`
 ADD PRIMARY KEY (`excursionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `bookingID` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customerID` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `excursions`
--
ALTER TABLE `excursions`
MODIFY `excursionID` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
