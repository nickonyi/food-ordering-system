-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2021 at 02:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(40, 'Administration', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(59, 'Foods', 'food_category_452.jpeg', 'Yes', 'Yes'),
(60, 'Drinks', 'food_category_110.jpg', 'Yes', 'Yes'),
(61, 'Desserts', 'food_category_392.jpg', 'Yes', 'Yes'),
(62, 'Cakes', 'food_category_279.jpg', 'Yes', 'Yes'),
(63, 'Snacks', 'food_category_703.jpg', 'Yes', 'Yes'),
(64, 'Salads', 'food_category_796.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(27, 'Kenyan Beef Samosas', ' Kenyan fried or baked pastry with a savory filling of beef', '30.00', 'food-name-9455.jpeg', 59, 'Yes', 'Yes'),
(28, 'Pilau', 'rice flavored with spices and cooked in stock, to which meat, poultry, or fish may be added.', '100.00', 'food-name-7982.jpg', 59, 'Yes', 'Yes'),
(29, 'Cabernet Sauvignon', ' Cabernet Sauvignon would be delicious with a burger, short rib, or lamb.', '3500.00', 'food-name-5919.jpg', 60, 'Yes', 'Yes'),
(30, 'Buttery Raspberry Crumble Bars', 'Fresh raspberries, jam, and sweet peaches sandwiched between two layers of buttery, cinnamon oat crumble.Delicious breakfast\r\n ', '300.00', 'food-name-3672.jpg', 61, 'Yes', 'Yes'),
(31, 'Ultimate Gooey Brownies', 'Ultimate Gooey Brownies are ridiculously tall, chocolaty, ooey, and gooey with a thick layer of sweetened condensed milk and chocolate in the middle', '150.00', 'food-name-6169.jpg', 61, 'Yes', 'Yes'),
(32, 'Butterfinger Cookie Dough Cheesecake Bars', 'Going from the bottom up you’ll find a chocolate chip cookie dough crust that’s been layered with a heavy bricking of 5 king size packages of Butterfinger. ', '100.00', 'food-name-9044.jpg', 61, 'Yes', 'Yes'),
(33, 'Chips with chicken', 'Hot french fries deeped in sauce and served with hot and tasty chicken', '350.00', 'food-name-1337.jpg', 59, 'Yes', 'Yes'),
(36, 'Snickers rolls', 'Snickers Bars Cinnamon Rolls, pillowy soft dough is full of buttery caramel, rich chocolate, and crunchy peanuts. These gourmet sweet rolls are pure decadence.', '70.00', 'food-name-4628.jpeg', 61, 'Yes', 'Yes'),
(37, 'Coke', 'Nice cold coke with hot served food is just wonderful!', '100.00', 'food-name-6486.jpg', 60, 'Yes', 'Yes'),
(41, 'Chips Masala', ' The recipe takes your normal average plate of fries to a whole other level. Saucy and spicy, these masala fries work beautifully with bbq dishes or even as a snack on their own!', '200.00', 'food-name-4178.jpg', 59, 'Yes', 'Yes'),
(42, 'Lays Masala Chips', 'A nice deep with your guacamole,it is incredible!!!', '55.00', 'food-name-4370.jpg', 63, 'Yes', 'Yes'),
(43, 'Bingo potato salad', 'These chips are totally amazing!!!', '55.00', 'food-name-3304.jpeg', 63, 'Yes', 'Yes'),
(44, 'Pizza', 'A  nice beef pizza to entice your appetite', '800.00', 'food-name-3644.jpg', 59, 'Yes', 'Yes'),
(45, 'Fanta', 'Tasteful and colorful', '80.00', 'food-name-3146.jpeg', 60, 'Yes', 'Yes'),
(46, 'Mountain dew', '. Original Mountain Dew is a citrus-flavored soda. The soft drink is unique in that it includes a small amount of orange juice', '120.00', 'food-name-3899.jpeg', 60, 'Yes', 'Yes'),
(47, 'Vanilla Pudding Fruit Salad', 'Vanilla Pudding Fruit Salad is a simple and sweet twist on a traditional fruit salad recipe.  This easy dessert has a beautiful rainbow of fruit in an easy vanilla sauce making it the perfect dessert or ice cream topping!', '450.00', 'food-name-6060.jpeg', 64, 'Yes', 'Yes'),
(48, 'Gatorade', 'When you sweat, you lose more than water. Gatorade Thirst Quencher contains critical electrolytes to help replace what’s lost in sweat', '150.00', 'food-name-9597.jpeg', 60, 'Yes', 'Yes'),
(49, 'Black Forest cake', 'The taste of the chocolate was pure and yummy. The cream covered on cake is mind blowing.', '350.00', 'food-name-2226.jpg', 62, 'Yes', 'Yes'),
(50, 'vanilla cake', 'The Choco Vanilla Cake is so delicious and best in taste.', '250.00', 'food-name-9679.jpg', 62, 'Yes', 'Yes'),
(51, 'Funneti Cake', 'Confetti cake is a type of cake that has rainbow colored sprinkles baked into the batter', '450.00', 'food-name-66.jpeg', 62, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(16, 'Pilau', '100.00', 9, '900.00', '2021-12-05 07:19:38', 'cancel', 'Melanie Guy', 'Molestiae dolore off', 'rygaz@mailinator.com', 'Id sunt illo sint ul'),
(17, 'Pilau', '100.00', 5, '500.00', '2021-12-05 09:35:37', 'delivered', 'Brody Mcfadden', 'Dolores consequatur ', 'taqo@mailinator.com', 'Nairobi,kenya'),
(18, 'Kenyan Beef Samosas', '30.00', 30, '900.00', '2021-12-05 12:03:35', 'delivered', 'Margaret Tran', '+1 (714) 777-7697', 'rucoz@mailinator.com', 'Proident est liber'),
(19, 'Ultimate Gooey Brownies', '150.00', 12, '1800.00', '2021-12-05 09:51:09', 'ordered', 'Mara Figueroa', '+1 (712) 821-7913', 'juqydyd@mailinator.com', 'Assumenda est dolor'),
(20, 'Lays Masala Chips', '55.00', 7, '385.00', '2021-12-05 12:48:43', 'ordered', 'Sophia Camacho', '+254 (203) 829-1705', 'borekopoba@gmail.com', 'kahawa sukari,Nairobi'),
(21, 'Mountain dew', '120.00', 8, '960.00', '2021-12-05 13:01:38', 'delivered', 'Lucas Clements', '+1 (318) 101-5155', 'zalovabyw@mailinator.com', 'Nisi ea culpa ad au'),
(22, 'Vanilla Pudding Fruit Salad', '450.00', 3, '1350.00', '2021-12-05 13:11:02', 'delivered', 'Chantale Craft', '+1 (325) 301-6325', 'palunuweby@mailinator.com', 'Ronald Ngala St,Nairobi'),
(23, 'Pizza', '800.00', 2, '1600.00', '2021-12-05 13:16:24', 'ordered', 'Iliana Knox', '+1 (525) 666-5516', 'pynodalyf@mailinator.com', 'Langata Link Complex, Langata South Rd'),
(24, 'Funneti Cake', '450.00', 568, '255600.00', '2021-12-05 13:43:10', 'delivered', 'Charissa Navarro', '+1 (748) 982-1946', 'lobudedaf@mailinator.com', ' Parklands,Nairobi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
