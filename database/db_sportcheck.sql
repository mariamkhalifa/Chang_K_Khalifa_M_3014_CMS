-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 02, 2020 at 12:10 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportcheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(1, 'Shoes and Footwear'),
(2, 'Jackets, Coats and Vests'),
(4, 'Tops and Hoodies'),
(5, 'Pants, Tights and Dresses'),
(6, 'Socks and Underwear'),
(7, 'Boardshorts and Swimwear'),
(8, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_specifications` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_specifications`) VALUES
(1, 'adidas Men\'s Questar Flow Shoes - Black', '$109.99', 'men-black-sneakers.png', 'Ready for the streets. These shoes borrow their modern look and feel from lightweight runners. They have a flexible knit upper with floating 3-Stripes integrated into the lacing system. Pillow-soft midsole and outsole cushioning provides all-day comfort.', 'Vendor Product Number: F36255'),
(2, 'Merrell Men\'s Ashford Classic Chukka Leather Boots - Butternut', '$179.99', 'men-casual-brown.png', 'Designed to stand the test of time, The Ashford Classic Chukka Leather gives a nod to our heritage. Featuring premium leather and an M Select™ GRIP outsole.', 'Vendor Product Number: J11077'),
(4, 'Merrell Boys\' Outback Low Pre-School Hiking Shoes - Blue', '$54.99', 'kid-sneakers.png', 'Hitting the trail or the playground, Merrell’s Outback Low shoe is designed to keep up with kids. An easy hook and loop closure, plus comfy EVA footbed, and a slip and trip resistant outsole make it the ideal summer shoe for your active adventurer.', 'Vendor Product Number: MK262285'),
(5, 'Timberland Women\'s Ellendale Casual Boot - Brown', '$139.99', 'women-boot.png', 'The Timberland Women\'s Ellendale Boot have a leather upper, rubber lug outsole and cushioned footbed. These casual boots can be worn for hiking or keep it relaxed and casual around the city.', 'Vendor Product Number: TB0A1R3DD35'),
(6, 'Reef Women\'s Escape Lux T Strap Sandals - Clay', '$23.97', 'women-sandals.png', 'The Reef Escape Lux T is the newest addition to the Escape family. By adding a stylish and strong comfort lined t-strap with an adjustable button closure for the perfect fit, the Escape Lux T adds another element to this revolutionary line of sandals.', 'Vendor Style Number: RF0A3FD5-CLY'),
(7, 'Columbia Men\'s Lake 22 Down Hooded Jacket', '$189.99', 'men-winter-jacket.png', 'This water-resistant jacket with 650-fill-power down, Heat Seal Construction, and binding at the hood, hem and cuff ensures zero cold spots, making it a winter must-have.', 'HEAT SEAL'),
(8, 'Ripzone Men\'s Bomber Jacket', '$89.99', 'men-casual.png', 'Level up your style with the Ripzone Bomber jacket. This classic jacket is easily pairable with your wardrobe and will bring some versatility to your outfit.', '100% polyester'),
(9, 'Helly Hansen Women\'s Lifaloft Propile Reversible Vest', '$199.99', 'women-vest.png', 'Stay warm without the bulk and weight with the new LifaLoft™ and propile insulated women’s vest.', '100% polyamide'),
(10, 'Helly Hansen Women\'s Welsey II Trench Coat', '$249.99', 'women-trench-coat.png', 'For full weather protection you can trust this technical version take of a classic longer trench coat for women!', '100% Polyester Back: 100% Polyurethane'),
(11, 'The North Face Girls’ Zipline Rain Jacket', '$79.99', 'girl-rain-coat.png', 'The Youth Zipline Rain Jacket provides spring-season waterproofing and breathability so they can move beyond their \"comfort zones\" in comfort.', 'Lining: 40D 50 g/m2 100% polyester mesh'),
(12, 'Champion Men\'s Powerblend Fleece Pullover Hoodie', '$59.99', 'men-hoodie.png', 'The same feel as the classic sweatshirt, the Champion Powerblend Pullover Hoodie is made of comfortable fleece fabric and comes with a drawstring hoodie. Keep warm with this hoodie version of a Champion sweater.', 'Vendor Style Number: GF89H-BKC'),
(13, 'Under Armour Men\'s Overtime T Shirt', '$34.99', 'men-short-sleeve.png', 'Under Armour Men’s Overtime T Shirt comes with loose fit and 4-way stretch construction which moves better in every direction.', 'Material: 57% Cotton / 38% Polyester / 5% Elastane'),
(14, 'Nike Dry Women\'s Yoga Tank - Mystic Navy', '$31.50', 'women-tank.png', 'The Nike Yoga Dri-FIT Tank is made of soft tri-blend fabric that’s lightweight with a little bit of stretch. Sweat-wicking technology helps keep you dry and comfortable on the mat.', 'Vendor Style Number: CI7434-469'),
(15, 'Helly Hansen Women\'s Nightfall Pullover Fleece - Blue Tint', '$64.99', 'women-long-sleeves.png', 'This super lightweight 1/2 zip design is a must-have. With great full year versatility, this brushed fleece jacket works just as well for both sport and casual.', 'Vendor Style Number: 51882-501'),
(16, 'Nike Toddler Boys\' Sport Performance Long Sleeve 2-Fer Shirt', '$19.50', 'boy-long-sleeves.png', 'The Nike ’Sport Performance 2-Fer’ Tee is designed to keep him warm and comfortable.\r\n\r\n', 'Material: 100% Polyester'),
(17, 'Nike Men\'s Flex Woven Shorts - Mystic Navy', '$36.00', 'men-shorts.png', 'The Nike Flex Woven Training Shorts are made with sweat-wicking stretch fabric for natural range of motion and dry comfort during your workout.', 'Vendor Style Number: CD0093-469'),
(18, 'Under Armour Men\'s Rival Fleece Logo Jogger Pants', '$30.00', 'men-pants.png', 'There are no rivals when it comes to comfortable sweatpants. The UA Rival Fleece Joggers are those go-to pants for rest days or weekends with the boys.', 'Vendor Style Number: 1345634'),
(19, 'Nike Women\'s Yoga Tights - Black', '$80.00', 'women-leggings.png', 'Bring confidence to your practice with the Nike Yoga Tights. They combine quick-drying fabric with plenty of stretch to let you move through your flow with ease.', 'Vendor Style Number: BV5715-010'),
(20, 'O\'Neill Women\'s Bryson Button Front Dress - Blush', '$35.97', 'women-dress.png', 'Whether you’re strolling the shore at sunset or heading out for lunch with friends, the O’Neill Women’s Bryson Button Front Dress - Blush will have you looking and feeling your best. This dress has a classic shirt-inspired look with a collar and full-length buttons and is made out of soft viscose material.', 'Vendor Style Number: FA9416004C-BSH'),
(21, 'Under Armour Girls\' 4-6X Emoji Best Life Capri Tight', '$31.99', 'girl-tights.png', 'The UA Girls’ 4-6X Emoji Best Life Capri Tights have a standard fit, perfect to keep her comfortable in the house and outside playing. ', NULL),
(22, 'Nike Men\'s NSW Futura Crew Sock - 3 Pack - Black', '$15.00', 'men-socks.png', 'The Nike Sportswear Crew Socks feature stretchy fabric that molds to your foot and a soft cotton blend for all-day comfort.', 'Vendor Style Number: SK0109-010-L'),
(23, 'Nike Pro Women\'s Classic T Back Sports Bra', '$35.97', 'women-sportsbra.png', 'The Nike Classic Pro T-Back Sports Bra updates a classic silhouette, adding a T-back design for breathable style that lets you move freely. Sweat-wicking technology and a back mesh panel help keep you dry and comfortable during high-intensity workouts such as spin and running.', 'Vendor Style Number: AQ0150-010'),
(24, 'Ripzone Boys\' Freestyle Boxer Brief Underwear - 2 Pack - Novelty', '$14.97', 'boy-underwear.png', 'Ripzone wants you to forget about your underwear. Get yourself in a pair of breathable ‘Freestyles’and go about your business with uninterrupted confidence. Designed with your needs in mind, Ripzone underwear supports you where it counts.', 'Vendor Style Number: 7903F003-9048% '),
(25, 'Quiksilver Men\'s Slab Volley Shorts - Hibiscus', '$49.99', 'men-swimwear.png', 'Hit the beach for surf and sand in the Quiksilver Men’s Slab volley short with mesh lining and side pockets.', 'Vendor Style Number: AQYJV03076-RMZ6'),
(26, 'Speedo Women\'s Endurance Side Shirred Tank Plus Size Swimsuit', '$94.99', 'women-swimwear.png', 'Daily swimmers and casual water lovers alike will benefit from this performance-enhanced swimsuit designed to flatter. Endurance+ engineering delivers chlorine-resistant fabric with four-way stretch for a long-lasting fit that won’t sag or bag. Built-in cups provide smooth support and coverage, while shirred sides and placed compression technology at the waist create a slimming effect.', 'Vendor Style Number: 7234014-001'),
(27, 'Nike Swim Girls\' Racerback 1 Piece Swimsuit', '$37.50', 'girl-swimwear.png', 'The Girls\' Nike Swim Racerback Sport One Piece embodies ultimate performance in a lightweight one-piece swimsuit. Stretch fabric moves with you to provide a contoured shape and racerback straps give you enhanced support and optimal range of motion.', 'Vendor Style Number: NESS8600'),
(28, 'Fitbit Versa 2 Smartwatch - Carbon', '$249.95', 'men-watch.png', 'Meet Fitbit Versa 2​™​—a smartwatch that elevates every moment. Use your voice to create alarms, set bedtime reminders or check the weather with Amazon Alexa Built-in.​ Take your look from the gym to the office with its modern and versatile design. Control your favourite playlists and podcasts with Spotify. ​Plus get Fitbit Pay​™​, daily in-app sleep quality scores, notifications, 24/7 heart rate and store 300+ songs for an experience that revolves around you.', NULL),
(29, 'The North Face Women\'s Purrl Stitch Beanie - Blue', '$34.99', 'women-hat.png', 'The North Face Purrl Stich Beanie is a slouchy smooth-knit beanie with a double layer cuff delivers style and warmth when the temperature drops.', '100% acrylic yarn'),
(30, 'Dakine Kids\' Campus Mini 18L Backpack - Pine', '$33.97', 'kid-backpack.png', 'The Dakine Campus Mini offers features of our popular Campus pack scaled down to the elementary basics in a grom-friendly size. This 18L (1,100 cubic inch) kids’ backpack features a roomy main compartment with additional storage in the dual zippered front compartments, including the front cooler pocket for snacks and drinks. The Campus Mini features safety reflective details as well as a sternum strap to balance the load.', '500/1000D Waxed Nylon ( Pine Trees )'),
(31, 'Fitbit Inspire HR Fitness Tracker - Lilac', '$129.95', 'women-fitness-tracker.png', 'Fitbit Inspire HR™ is a friendly heart rate & fitness tracker for every day that helps you build healthy habits. This encouraging companion motivates you to reach your weight and fitness goals and even enjoy the journey with 24/7 heart rate, workout features, calorie burn tracking, goal celebrations, sleep stages and up to 5 days of battery life. ', NULL),
(32, 'Kombi Men\'s Original Mitts - Black Crosshatch', '$44.99', 'men-gloves.png', 'Get full value from the lift ticket with waterproof-breathable mitts designed for all-day comfort. Heat pack pockets let you add external warmth for super-cold situations.', '100% nylon'),
(33, 'Ripzone Men\'s Freestyle Boxer Briefs', '$19.99', 'men-underwear.png', 'Ripzone wants you to forget about your underwear. Get yourself in a pair of breathable ‘Freestyles’ or ‘Icons’ and go about your business with uninterrupted confidence. Designed with your needs in mind, Ripzone underwear supports you where it counts.', NULL),
(34, 'Nike Swim Boys\' Just Do It Breaker 8\" Volley Short', '$25.97', 'boy-swimwear.png', 'This Nike Swim Boys’ JDI Breaker 8\" Volley Short makes a splash with bold styling on soft, water-repellent fabric. Comfort features like a stretch waistband, inner drawcord and built-in mesh brief provide support and a great fit.', 'Vendor Style Number: NESS9696'),
(35, 'adidas Women\'s Superlite No Show Socks - 6-Pack', '$14.97', 'women-socks.png', 'From work to your training session, these socks keep your feet dry. They’re made from sweat-wicking fabric that’s super-light. With a no-show length, they stay hidden inside of trainers.', 'Vendor Style Number: CK0645'),
(36, 'Parkland Kids\' The Goldie 5L Backpack - Bon Bon', '$17.97', 'girl-backpack.png', 'The new kid on the block. Say hello to the Parkland Goldie, a kids backpack designed with style and sustainability in mind. Thinner straps make putting on and taking off a breeze. The Goldie’s smaller silhouette makes it the ideal “first” backpack for your little one.', NULL),
(37, 'Nike Swoosh Headband - Pink Gaze/Oil Grey', '$5.25', 'dc67085d85f9ebbc6d96052893b9d58e.png', 'Stay drier on the court and off it with the Nike Swoosh Headband. Absorbent fabric absorbs perspiration before it can run down into your eyes, and the embroidered Swoosh logo adds style to sports apparel and uniforms.', 'Vendor Style Number: N.000.1544.677'),
(43, 'Test', '0', '485ae925ee2114817f997fa32d158d71.png', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_categories`
--

CREATE TABLE `tbl_products_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products_categories`
--

INSERT INTO `tbl_products_categories` (`product_category_id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 4),
(13, 13, 4),
(14, 14, 4),
(15, 15, 4),
(16, 16, 4),
(17, 17, 5),
(18, 18, 5),
(19, 19, 5),
(20, 20, 5),
(21, 21, 5),
(22, 22, 6),
(23, 23, 6),
(24, 24, 6),
(25, 25, 7),
(26, 26, 7),
(27, 27, 7),
(28, 28, 8),
(29, 29, 8),
(30, 30, 8),
(31, 31, 8),
(32, 32, 8),
(33, 33, 6),
(34, 34, 7),
(35, 35, 6),
(36, 36, 8),
(37, 37, 8),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(250) NOT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_full_name`, `user_username`, `user_password`, `user_email`, `user_date`, `user_ip`) VALUES
(4, 'mm', 'mm', '111', 'mm@mm.test', '2020-04-01 13:51:47', '::1'),
(7, 'Kayla', 'kc', '$2y$10$RTQxCt/azLQyruJNe8pja.SvdUdHV5nb36TqGQILXhUxN1JlqnR7e', '111', '2020-04-01 18:25:54', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_products_categories`
--
ALTER TABLE `tbl_products_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_products_categories`
--
ALTER TABLE `tbl_products_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
