-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Haz 2023, 18:48:33
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `projedatabase`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `content` varchar(600) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `content`, `date`) VALUES
(11, '', 'Bu bir Denemedir\r\n', '0000-00-00'),
(12, '', 'Yeni kitaplar eklenmiştir', '2023-06-03'),
(13, 'Bestseller Alert:', 'Get your hands on the hottest books that everyone is talking about! Our bestselling titles are carefully curated to bring you captivating stories and unforgettable characters. Explore the books that have captured readers\' hearts and become cultural sensations.', '2023-05-31'),
(14, 'Reading Recommendations', ' Need a book suggestion? We&#039;ve got you covered! Fill out our reading recommendations form, and our librarians will provide tailored book suggestions based on your preferences. Let us help you find your next literary adventure.', '2023-06-03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `summary` mediumtext NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `summary`, `status`) VALUES
(13, 'Don Quixote', 'Miguel De Cervantes', 'Don Quixote is a middle-aged gentleman from the region of La Mancha in central Spain. Obsessed with the chivalrous ideals touted in books he has read, he decides to take up his lance and sword to defend the helpless and destroy the wicked.\r\n', 'available'),
(14, '1984', 'George Orwell', '1984 tells the futuristic story of a dystopian, totalitarian world where free will and love are forbidden. Although the year 1984 has long since passed, the prophecy of a society controlled by fear and lies is arguably more relevant now than ever.', 'available'),
(15, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Tolkien’s fantasy epic is one of the top must-read books out there. Set in Middle Earth – a world full of hobbits, elves, orcs, goblins, and wizards – The Lord of the Rings will take you on an unbelievable adventure', 'unavailable'),
(16, 'The Kite Runner', 'Khaled Hosseini', 'The Kite Runner is a moving story of an unlikely friendship between a wealthy boy and the son of his father’s servant. Set in Afghanistan during a time of tragedy and destruction, this unforgettable novel will have you hooked from start to finish.', 'available'),
(17, 'Harry Potter and the Philosopher’s Stone', 'J.K. Rowling', 'This global bestseller took the world by storm. So, if you haven’t read J.K. Rowling’s Harry Potter, now may be the time. Join Harry Potter and his schoolmates as this must-read book transports you deep into a world of magic and monsters.', 'available'),
(18, ' Slaughterhouse-Five', 'Kurt Vonnegut', 'Slaughterhouse-Five is arguably one of the greatest anti-war books ever written. This rich and amusing tale follows the life of Billy Pilgrim as he experiences World War II from a peculiar perspective.', 'available'),
(19, 'The Lion, the Witch, and the Wardrobe', 'C.S. Lewis', 'The Lion, The Witch, and the Wardrobe is undoubtedly one of the great books of all time. This renowned fantasy novel is set in Narnia, home to mythical beasts, talking animals, and warring kingdoms. The story follows a group of school children as they become entangled in this incredible world’s fate.', 'unavailable'),
(20, 'To Kill a Mockingbird', 'Harper Lee', 'To Kill a Mockingbird is one of the top must-read books of all time. Published in 1960, the story explores life in the Deep South during the early 20th century through the story of a man accused of a terrible crime. It’s poignant, humorous, and gripping.', 'available'),
(21, 'The Book Thief', 'Markus Zusak', 'The Book Thief is a story of bravery, hope, and friendship in a time of Nazi tyranny. Narrated by Death itself, this novel will have you holding your breath for chapters at a time.', 'available'),
(22, 'Wuthering Heights', 'Emily Bronte', 'Wuthering Heights is a classic novel published way back in 1847. This harrowing story, set on a lonely English moorland, follows Catherine Earnshaw and Heathcliff’s struggle with love, betrayal, and revenge. If you love dramatic novels, add this to your must-read book list.', 'available'),
(23, 'Animal Farm', 'George Orwell', 'Orwell tells a fairy tale of a revolution against tyranny that ends in even more unjust totalitarianism. The animals on the farm are rife with idealism and desire to create a world of justice, equality, and progress. However, the new regimen attempts to control every aspect of the animals’ lives.', 'available'),
(24, 'Fahrenheit 451', 'Ray Bradbury', 'Ray Bradbury’s dystopian world shines a light on Western societies’ dependence on the media. The main character’s job is to find and burn any books he can find – until he begins to question everything. Considering the state of current politics and world affairs, this is one of the absolute must-read books in life.', 'unavailable'),
(25, 'Frankenstein', 'Mary Shelley', 'English author Mary Shelley tells the story of Victor Frankenstein, a young scientist who creates a monster and brings it to life. This gripping novel evokes questions about what makes us human and what love and kindness truly mean. ', 'available'),
(26, 'Of Mice and Men', 'John Steinbeck', 'Of Mice and Men should be on every must-read book list. Set in the Great Depression, this is a controversial tale of friendship between two migrant workers in California. Filled with hope and tragedy, the two work towards the dream of owning land and pets.', 'unavailable'),
(27, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Scott Fitzgerald’s The Great Gatsby is said to be the quintessential novel of the Jazz Age. Set in 1922 amongst unfathomable indulgence and decadence, the novel highlights a man’s struggle to earn the love of the woman he’s obsessed with.', 'available'),
(28, 'A Brief History of Time', 'Stephen Hawking', 'Stephen Hawking’s A Brief History of Time is one of the most famous books in science. It discusses the history of cosmology and its development from Ancient Greece through to the 1980s', 'available'),
(29, 'Long Walk to Freedom', 'Nelson Mandela', 'Lists of must-read biographies almost always include this wonderful book. Mandela started writing this autobiography in prison and finished it right before becoming the president of South Africa. This inspiring story provides a glimpse into the end of apartheid and the blatant inequality in the country.', 'available'),
(30, 'Brave New Worl', 'Aldous Huxley', 'Set in a future dystopia, this novel portrays a society where every aspect of human life is tightly controlled. It examines themes such as the impact of technology, the loss of individuality, and the pursuit of happiness.', 'available'),
(31, 'Moby-Dick', 'Herman Melville', 'This epic novel follows the journey of Captain Ahab and his obsessive quest to hunt down the white whale, Moby Dick. It explores themes of obsession, fate, and the human struggle against nature.', 'unavailable'),
(32, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 'This comedic science fiction series follows the misadventures of Arthur Dent, who is swept off Earth moments before its destruction and embarks on a journey through space. It satirizes various aspects of society and explores themes of existentialism and the absurdity of life.', 'available'),
(33, 'The Picture of Dorian Gray', 'Oscar Wilde', 'This novel tells the story of Dorian Gray, a young man who remains eternally youthful while a portrait of him ages and reflects his moral corruption. It delves into themes of beauty, hedonism, and the consequences of living a life devoid of morality.', 'available'),
(34, 'The Bell Jar', ' Sylvia Plath', ' This semi-autobiographical novel follows Esther Greenwood, a talented young woman struggling with her identity and mental health. It offers a poignant exploration of depression, societal pressures, and the search for self-discovery.', 'unavailable'),
(35, 'One Hundred Years of Solitude', 'Gabriel García Márquez', 'This multi-generational saga traces the Buendía family in the fictional town of Macondo, blending elements of magical realism with historical events. It explores themes of love, time, and the cyclical nature of human existence.', 'unavailable'),
(36, 'A Clockwork Orange', 'Anthony Burgess', 'This dystopian novel is narrated by Alex, a young delinquent in a near-future society. It explores themes of violence, free will, and the morality of punishment, raising questions about the nature of humanity and the limits of social control.', 'unavailable'),
(37, 'The Hobbit', 'J.R.R. Tolkien', 'This fantasy adventure novel introduces readers to Bilbo Baggins, a hobbit who embarks on a quest to help a group of dwarves reclaim their homeland from a dragon. It explores themes of courage, friendship, and the transformative power of a grand adventure.', 'available'),
(38, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'The first book in the immensely popular Harry Potter series, it follows the journey of a young wizard named Harry Potter as he discovers his magical abilities and begins his education at Hogwarts School of Witchcraft and Wizardry.', 'available'),
(39, 'The Da Vinci Code', 'Dan Brown', 'A gripping thriller that combines art, history, and conspiracy, the book follows symbologist Robert Langdon as he unravels clues and deciphers codes to solve a mysterious murder and uncover a hidden secret.', 'unavailable'),
(40, 'Twilight', ' Stephenie Meyer ', 'The first book in the Twilight series, it tells the love story between Bella Swan, a human, and Edward Cullen, a vampire. Their relationship faces challenges as they navigate the supernatural world and deal with the conflicts between vampires and werewolves.', 'available'),
(41, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'The first book in the Millennium series, it follows investigative journalist Mikael Blomkvist and computer hacker Lisbeth Salander as they delve into a dark and complex mystery involving corruption, violence, and family secrets.', 'unavailable'),
(42, 'The Hunger Games', 'Suzanne Collins', 'The first book in the dystopian Hunger Games trilogy, it takes place in a post-apocalyptic world where teenagers are forced to participate in a televised fight to the death. Katniss Everdeen becomes a symbol of rebellion against the oppressive regime.', 'available'),
(43, 'Fifty Shades of Grey', 'E.L. James ', 'The first book in the Fifty Shades trilogy, it explores the unconventional relationship between Anastasia Steele, a college graduate, and Christian Grey, a wealthy businessman with particular sexual preferences.', 'unavailable'),
(44, 'Gone Girl', 'Gillian Flynn', 'A psychological thriller, the book revolves around the disappearance of Amy Dunne and the subsequent investigation that implicates her husband Nick. It explores themes of marriage, deceit, and the darker aspects of human relationships.', 'unavailable'),
(45, 'The Maze Runner', 'James Dashner', 'The first book in a dystopian science fiction series, it follows Thomas, a teenager who wakes up in a maze with no memory of his past. As he and a group of other teens try to escape the maze, they uncover secrets and face dangerous challenges.', 'unavailable'),
(46, 'A Game of Thrones', 'George R.R. Martin', 'The first book in the epic fantasy series A Song of Ice and Fire, it introduces readers to the complex and gritty world of Westeros, where noble families vie for power and a threat from the supernatural looms. The book inspired the popular television series \"Game of Thrones.\"', 'unavailable'),
(47, 'American Gods', 'Neil Gaiman', 'This fantasy novel follows Shadow Moon, a recently released convict who becomes entangled in a war between the old gods of mythology and the new gods of modernity. It explores themes of belief, identity, and the power of myth.', 'available'),
(48, 'The Girl on the Train', 'Paula Hawkins', 'A gripping psychological thriller, the book revolves around Rachel Watson, an alcoholic woman who becomes entangled in a missing person investigation after witnessing something suspicious during her daily train commute.', 'available'),
(49, 'The Shadow of the Wind', 'Carlos Ruiz Zafón', ' Set in post-war Barcelona, this novel follows a young boy named Daniel as he becomes obsessed with a mysterious book and embarks on a quest to uncover its author and unravel a dark secret.', 'unavailable'),
(50, 'Cloud Atlas', 'David Mitchell', 'This novel weaves together six interconnected stories set in different time periods, exploring themes of reincarnation, interconnectedness, and the impact of individual actions across time.', 'available'),
(51, 'Life of Pi', 'Yann Martel ', 'The novel follows the journey of Piscine Molitor Patel, a young Indian boy who survives a shipwreck and finds himself adrift in a lifeboat with a Bengal tiger named Richard Parker. It delves into themes of faith, survival, and the power of storytelling.', 'unavailable'),
(52, 'My Name is Red', 'Orhan Pamuk', ' Set in 16th-century Istanbul, the novel combines elements of historical fiction and mystery as it follows a group of miniaturist painters and their struggle to find their artistic identities. It explores themes of art, love, and the clash between Eastern and Western cultures.', 'unavailable'),
(53, 'Snow', 'Orhan Pamuk', 'This novel tells the story of a Turkish poet named Ka who returns to his homeland after many years of political exile. Set in the small town of Kars, it explores themes of identity, politics, and the clash between secularism and Islamism.', 'available'),
(54, 'Istanbul: Memories and the City', ' Orhan Pamuk', 'In this memoir, Orhan Pamuk reflects on his experiences growing up in Istanbul and explores the history, culture, and atmosphere of the city. It offers a personal and introspective perspective on Istanbul\'s transformation over time.', 'available'),
(55, 'The Time Regulation Institute', ' Ahmet Hamdi Tanpınar', 'This satirical novel follows the life of Hayri İrdal, who founds the Time Regulation Institute with the aim of enforcing punctuality and order in society. The book explores themes of bureaucracy, tradition, and the clash between modernization and conservatism.', 'available');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `usertype`) VALUES
(32, 'rambo@gmail.com', '78d4b6b273e7602c6d22984e267cf96d08bef84405cc3b0240dd66ee6b3da771', 'user'),
(34, 'fatih@gmail.com', '1c4ad5daccb08b24e33f15514c3625a257d8bc8a8426f4122213cd249be38eb3', 'admin'),
(35, 'yakup@gmail.com', '82a5c663481036616824c0510f21ede50f734e63d14e5f657716ac38f3c0f9f6', 'admin'),
(36, 'mert@gmail.com', '56681010b753e1abe52c449d0aab291b28f1808a3a91b6baeaa726883baad4b0', 'admin'),
(37, 'ryangosling@gmail.com', '49cb480eff7f8761691208f802883b3199697f76837a39a31f3060c0e5b122a8', 'admin'),
(38, 'pixelpioneer@gmail.com', '8bbf5e8766b278b28a3ffbdef161ac56748e754c6e90be2d35de62b546b3d894', 'user'),
(39, 'lunaglow@hotmail.com', '0e44ce7308af2b3de5232e4616403ce7d49ba2aec83f79c196409556422a4927', 'user'),
(40, 'nova.dreamer@yahoo.com', '423b8a4cd1d614870317e2f63ff3fe41983db788f5efd71687cd0d0379790223', 'user'),
(41, 'mysticwhisper@outlook.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(42, 'cipherwanderer@gmail.com', '81a103d766de77d8a2224fbab8294cc9e956c8224b30041c668cc98c205b8b82', 'user'),
(43, 'shadow.walker@gmail.com', 'e98cf1b64dce2adcd9eec61ba78c75c2ab774c93f61f1b551264dc4ea8c5f2ae', 'user'),
(44, 'radiantrhythm@yahoo.com', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd', 'user'),
(45, 'quill.quest@gmail.com', 'ae89eb22e8ee9889c343520363d2020b356e8ebf24f55be13c77689993be9939', 'user');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
