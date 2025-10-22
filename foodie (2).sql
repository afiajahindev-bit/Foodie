-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 11:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `food_id`, `rev_id`, `user_id`, `result`) VALUES
(40, 4, 2, '8', 'dislike'),
(42, 4, 4, '8', 'like'),
(67, 4, 1, '8', 'like'),
(70, 4, 2, '10', 'dislike'),
(76, 4, 4, '10', 'like'),
(80, 10, 7, '12', 'dislike'),
(86, 1, 11, '12', 'dislike'),
(92, 2, 15, '3', 'dislike'),
(96, 2, 80, '3', 'like'),
(99, 1, 11, '3', 'dislike'),
(101, 4, 4, '3', 'dislike'),
(110, 10, 87, '12', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$DnvebmkV0p5rNaQXpxhjFu56guaeFZH8iHHJrzG1g.FUfJLlz6gji');

-- --------------------------------------------------------

--
-- Table structure for table `food_info`
--

CREATE TABLE `food_info` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `location_name` varchar(500) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_info`
--

INSERT INTO `food_info` (`food_id`, `food_name`, `restaurant_name`, `image`, `type`, `catagory`, `price`, `rating`, `latitude`, `longitude`, `location_name`, `description`) VALUES
(1, 'BBQ Giant Meal', 'BFC', 'bbq-meal.jpg', 'Combo Meal', 'Main-Course', '1460.00', '3.5', '23.811094', '90.356588', 'BFC, বেগম রোকেয়া সরণী, Mirpur 6, Mirpur, Mirpur 6, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', '4 pcs Chicken ,French fries (L),Coleslaw (S),2 Buns ,2 bottles soft drinks (250ml)'),
(2, 'Burger', 'Chillox,Mirpur-1', 'burger.jpg', 'Burgers', 'Burgers', '280.00', '5.0', '23.802457', '90.353854', 'Chillox, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Bun,Patty,Lettuce,Tomato,Pickle,Chedder Cheese,Cucumber,Oninon.'),
(3, 'Cheese Mountain', 'Cheese Factory', 'cheese-mountain.jpg', 'Pasta', 'Pasta-And-Noodles', '250.00', '4.3', '23.803432', '90.355062', 'Cheese Factory, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Milk Powder, Chicken, Capsicum, Mushroom, Mozzarella Cheese, Secret Pasta Sauce.'),
(4, 'Cheese and BBQ Chicken Pizza', 'Cheese Factory', 'bbq pizza.jpg', 'Pizza', 'Pizza', '560.00', '4.0', '23.803432', '90.355062', 'Cheese Factory, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Full of Chicken Blended in BBQ Flavored Sauce, Imported Mozzarella, Cheese decorated with Green Capsicum & Black Olive.'),
(5, 'Cheesy chicken Box', 'Fire and forks', 'chicken-box.jpg', 'Chicken', 'Main-Course', '255.00', '1.0', '23.869327', '90.392689', 'Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1231, Bangladesh', '1:1 Cheesy chicken served with own made sauce'),
(6, 'Chicken and fries meal', 'KFC', 'kfc-chicken.jpg', 'Combo Meal', 'Main-Course', '789.00', '2.0', '23.814716', '90.366275', 'KFC, Begum Rokeya Sharani, Mirpur 6, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', '4 pcs hot and crispy chicken, 1 Medium fries and 2 pepsi'),
(7, 'Chicken lollipop', 'Pizza Burg', 'chicken-lollipop.jpg', 'Chicken', 'Sides', '175.00', '3.0', '23.803349', '90.355019', 'Pizza Burg, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Decorated with garden salad and a cup of secret sauce'),
(8, 'Chicken Steak', 'Roadside kitchen', 'chicken-steak.jpg', 'Steak', 'Main-Course', '349.00', '3.0', '23.816670', '90.429426', 'Roadside Kitchen Bashundhara R/A, 1229 Dhaka, Dhaka Division', '1:1 served with potato wedges and garlic mushroom'),
(9, 'Chicken Tenders', 'Kudos', 'chicken-tenders.jpg', 'Chicken', 'Appetizers', '239.00', '4.0', '23.810415', '90.361383', 'Kudos, Avenue 5, Mirpur 6, Mirpur, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Prepared with chicken, Masala and spices'),
(10, 'Chicken Tenders', 'The Hub Rooftop', 'chicken-tender.jpg', 'Chicken', 'Appetizers', '575.00', '3.8', '23.803045', '90.353187', '29, Zoo Road, 1\\G, Mirpur-1, Dhaka, Dhaka Division, Bangladesh, 1216', 'Breaded chicken tenders, coleslaw, fries, plum sauce, pickles'),
(11, 'Chicken Wings', 'The Hub Rooftop', 'chicken-wings.jpg', 'Chicken', 'Appetizers', '325.00', '3.0', '23.803045', '90.353187', '29, Zoo Road, 1\\G, Mirpur-1, Dhaka, Dhaka Division, Bangladesh, 1216', 'BBQ, buffalo, Cajun dry rub, honey garlic,   lemon pepper, butter parm, spicy Thai, sweet sriracha'),
(12, 'Classic Burger', 'The Hub Rooftop', 'classic-burger.jpg', 'Burgers', 'Burgers', '290.00', '3.5', '23.803045', '90.353187', '29, Zoo Road, 1\\G, Mirpur-1, Dhaka, Dhaka Division, Bangladesh, 1216', 'Lettuce, tomato, pickles, special sauce'),
(13, 'Etalia Meatball', 'The Etalia', 'meatball.jpg', 'Pizza', 'Pizza', '350.00', '3.0', '23.800527', '90.355097', 'The Eatalia, Mirpur, Dhaka, Bangladesh', 'Prepared with fresh dough, Topped with freshly cubed Chicken'),
(14, 'French Fries', 'Burger King', 'french fries.jpg', 'Fries', 'Sides', '209.00', '3.0', '23.795485', '90.413541', 'Burger King, Gulshan Tower, 31, Road 53, Gulshan 2, Gulshan, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1212, Bangladesh', 'Deep fried thinly cut potato chips'),
(15, 'Fried Chicken', 'Burger King ', 'fried-chicken.jpg', 'Chicken', 'Appetizers', '299.00', '3.5', '23.795485', '90.413541', 'Burger King, Gulshan Tower, 31, Road 53, Gulshan 2, Gulshan, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1212, Bangladesh', '2 Pcs. Tender & Juicy chicken, Fried until crispy outside'),
(16, 'Masala Chicken Tikka', 'Pizza Hut', 'tikka-pizza.jpg', 'Pizza', 'Pizza', '899.00', '4.0', '23.861317', '90.399113', 'Pizza Hut, 06, Road 2, Sector 3, Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1230, Bangladesh', 'Chicken Tikka, Capsicum, Tomato, Green Chili'),
(17, 'Oven baked pasta', 'YellowKnife', 'oven-baked.jpg', 'Pasta', 'Pasta-And-Noodles', '360.00', '4.0', '23.803045', '90.353187', 'Nasim Tower, 26-29 Zoo Road 1216 Mirpur, Dhaka Division, Bangladesh', '1:2 prepared with chicken'),
(18, 'Pasta Basta', 'YellowKnife', 'pasta-basta.jpg', 'Pasta', 'Pasta-And-Noodles', '380.00', '3.0', '23.803045', '90.353187', 'Nasim Tower, 26-29 Zoo Road 1216 Mirpur, Dhaka Division, Bangladesh', '1:2 Prepared with beef'),
(19, 'Pizza', 'Pizza Burg', 'pizza-burg.jpg', 'Pizza', 'Pizza', '325.00', '3.0', '23.803349', '90.355019', 'Pizza Burg, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Spicy chicken ball, diced onion,Green chili,cheese, Marinara sauce'),
(20, 'Smoky chicken sandwich', 'Kudos', 'chicken-sandwich.jpg', 'Sandwich', 'Sandwitch', '210.00', '4.0', '23.810415', '90.361383', 'Kudos, Avenue 5, Mirpur 6, Mirpur, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Hot, smoky and cheesy sandwich'),
(21, 'Spiced Tandoori Chicken', 'Pizza Hut', 'tandori-pizza.jpg', 'Pizza', 'Pizza', '799.00', '2.0', '23.861317', '90.399113', 'Pizza Hut, 06, Road 2, Sector 3, Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1230, Bangladesh', 'Chicken Tandoori, Capsicum, Onion, Green Chili, Sweet corn'),
(22, 'Strips and Rice combo ', 'KFC', 'fried-rice.jpg', 'Combo Meal', 'Main-Course', '519.00', '2.5', '23.814716', '90.366275', 'KFC, Begum Rokeya Sharani, Mirpur 6, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Get a full rice bowl with 3 boneless chicken strips'),
(23, 'T-Bone steak', 'Fire and forks', 't-bone.jpg', 'Steak', 'Main-Course', '1665.00', '5.0', '223.869327', '90.392689', 'Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1231, Bangladesh', '350gm- Grass fed angus beef, @ regular side and sauce'),
(24, 'Tartar Chicken Burger', 'Burger King', 'chicken-burger.jpg', 'Burgers', 'Burgers', '299.00', '3.7', '23.795485', '90.413541', 'Burger King, Gulshan Tower, 31, Road 53, Gulshan 2, Gulshan, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1212, Bangladesh', 'Delicious Burger with chicken patty and inside sauce'),
(25, 'Thrift Combo', 'BFC', 'chicken-fries.jpg', 'Combo Meal', 'Main-Course', '2238.00', '4.0', '23.811094', '90.356588', 'BFC, বেগম রোকেয়া সরণী, Mirpur 6, Mirpur, Mirpur 6, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', 'Total 6pc Chicken, 3 serves french fries, 3 Bun, 3 coleslaw salad and 3 drinks.');

-- --------------------------------------------------------

--
-- Table structure for table `food_review`
--

CREATE TABLE `food_review` (
  `rev_id` int(11) NOT NULL,
  `rev_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_review`
--

INSERT INTO `food_review` (`rev_id`, `rev_name`, `email`, `username`, `image`, `user_id`, `food_id`, `rating`, `comment`, `date`) VALUES
(1, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 1, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(4, 'ratun', 'ratun@gmail.com', 'ratun123', 'profile.jpg', 9, 4, 4, 'good but need more juicy', 'Tuesday, 12/12/2023 11:09 AM'),
(69, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 2, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(70, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 3, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(87, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 10, 4, 'Very good', 'Saturday, 4/11/2023 03:13 AM'),
(93, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 24, 3, 'good', 'Saturday, 4/11/2023 07:07 PM'),
(95, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 10, 4, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(96, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 12, 2, 'not good', 'Tuesday, 12/12/2023 11:09 AM'),
(97, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 24, 5, 'ok', 'Tuesday, 12/12/2023 02:38 PM'),
(98, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 9, 4, 'Good', 'Tuesday, 12/12/2023 09:55 PM'),
(99, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 2, 5, 'Very tasty', 'Tuesday, 12/12/2023 09:55 PM'),
(100, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 5, 1, 'Not so good', 'Tuesday, 12/12/2023 09:56 PM'),
(101, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 11, 3, 'Need improvement', 'Tuesday, 12/12/2023 09:57 PM'),
(102, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 7, 3, 'Ok', 'Tuesday, 12/12/2023 09:58 PM'),
(103, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 15, 5, 'So good', 'Tuesday, 12/12/2023 09:59 PM'),
(104, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 1, 5, 'Enjoyed the food', 'Tuesday, 12/12/2023 10:00 PM'),
(105, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 6, 2, 'To salty', 'Tuesday, 12/12/2023 10:00 PM'),
(106, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 22, 2, 'Not well cooked', 'Tuesday, 12/12/2023 10:00 PM'),
(107, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 25, 4, 'preferable', 'Tuesday, 12/12/2023 10:01 PM'),
(108, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 14, 3, 'Not in good quantity', 'Tuesday, 12/12/2023 10:01 PM'),
(109, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 3, 5, 'Loved it', 'Tuesday, 12/12/2023 10:02 PM'),
(110, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 18, 3, 'Not well cooked', 'Tuesday, 12/12/2023 10:03 PM'),
(111, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 17, 4, 'Good', 'Tuesday, 12/12/2023 10:09 PM'),
(112, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 4, 3, 'Well', 'Tuesday, 12/12/2023 10:10 PM'),
(113, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 13, 3, 'Good in taste', 'Tuesday, 12/12/2023 10:14 PM'),
(114, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 19, 3, 'Good', 'Tuesday, 12/12/2023 10:15 PM'),
(115, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 21, 2, 'Over priced', 'Tuesday, 12/12/2023 10:15 PM'),
(116, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 16, 4, 'Very good', 'Tuesday, 12/12/2023 10:16 PM'),
(117, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 20, 4, 'Yummy', 'Tuesday, 12/12/2023 10:16 PM'),
(118, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 23, 5, 'So tasty', 'Tuesday, 12/12/2023 10:17 PM'),
(119, 'Afia Jahin', 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 3, 8, 3, 'So spicy', 'Tuesday, 12/12/2023 10:17 PM'),
(120, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 1, 2, 'bad', 'Tuesday, 12/12/2023 10:46 AM'),
(121, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 2, 5, 'Very good', 'Tuesday, 12/12/2023 10:48 AM'),
(122, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 3, 4, 'good', 'Tuesday, 12/12/2023 10:50 AM'),
(123, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 4, 4, 'tasty', 'Tuesday, 12/12/2023 10:52 AM'),
(124, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 5, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(125, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 6, 2, 'Salty', 'Tuesday, 12/12/2023 10:46 AM'),
(126, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 7, 2, 'So spicy', 'Tuesday, 12/12/2023 10:46 AM'),
(127, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 8, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(128, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 9, 4, 'Bad quality', 'Tuesday, 12/12/2023 10:46 AM'),
(129, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 10, 3, 'Poor quality', 'Tuesday, 12/12/2023 10:46 AM'),
(130, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 11, 4, 'So yummy', 'Tuesday, 12/12/2023 10:46 AM'),
(131, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 12, 5, 'Superb', 'Tuesday, 12/12/2023 10:46 AM'),
(132, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 13, 1, 'Bad taste', 'Tuesday, 12/12/2023 11:46 AM'),
(133, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 14, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(134, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 15, 2, 'Improvement needed', 'Tuesday, 12/12/2023 10:46 AM'),
(135, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 16, 2, 'Didn\'t like', 'Tuesday, 12/12/2023 10:46 AM'),
(136, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 17, 4, 'Loved the food', 'Tuesday, 12/12/2023 11:30 AM'),
(137, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 18, 4, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(138, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 19, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(139, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 20, 4, 'Loved it', 'Tuesday, 12/12/2023 10:46 AM'),
(140, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 21, 4, 'So tasty', 'Tuesday, 12/12/2023 10:03 AM'),
(141, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 22, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(142, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 23, 4, 'So yummy', 'Tuesday, 12/12/2023 10:46 AM'),
(143, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 24, 3, 'good', 'Tuesday, 12/12/2023 10:46 AM'),
(144, 'kazi Ratun', 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 12, 25, 5, 'So yummy food', 'Tuesday, 12/12/2023 10:46 AM'),
(145, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 4, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(146, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 5, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(147, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 6, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(148, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 7, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(149, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 8, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(150, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 9, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(151, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 10, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(152, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 11, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(153, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 12, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(154, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 13, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(155, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 14, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(156, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 15, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(157, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 16, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(158, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 17, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(159, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 18, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(160, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 19, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(161, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 20, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(162, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 21, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(163, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 22, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM'),
(164, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 23, 5, 'Very tasty', 'Sunday, 24/09/2023 02:52 AM'),
(165, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 24, 4, 'Good', 'Sunday, 24/09/2023 10:15 AM'),
(166, 'Medha R', 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 10, 25, 4, 'quality was good but quantity was not satisfied.', 'Sunday, 24/09/2023 10:15 AM');

-- --------------------------------------------------------

--
-- Table structure for table `forkers`
--

CREATE TABLE `forkers` (
  `num` int(11) NOT NULL,
  `reviewers` int(20) NOT NULL,
  `forker` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forkers`
--

INSERT INTO `forkers` (`num`, `reviewers`, `forker`) VALUES
(1, 3, 9),
(2, 7, 9),
(3, 7, 10),
(4, 1, 12),
(6, 3, 12),
(7, 12, 3),
(8, 9, 12),
(9, 10, 12),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `getfood_id`
--

CREATE TABLE `getfood_id` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `getfood_id`
--

INSERT INTO `getfood_id` (`id`, `food_id`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `locationName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `locationName`) VALUES
(1, '23.867536', '90.393942', 'Kabab Factory, Lake Drive Road, Sector 7, Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1231, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `location_names`
--

CREATE TABLE `location_names` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_names`
--

INSERT INTO `location_names` (`id`, `location_name`) VALUES
(1, 'Dhanmondi'),
(2, 'Gulshan'),
(3, 'Banani'),
(4, 'Uttara'),
(5, 'Mirpur'),
(6, 'Mohammadpur'),
(7, 'Lalmatia'),
(8, 'Baridhara'),
(9, 'Bashundhara'),
(10, 'Motijheel'),
(11, 'Ramna'),
(12, 'Karwan Bazar'),
(13, 'Tejgaon'),
(14, 'Khilgaon'),
(15, 'Malibagh'),
(16, 'Jatrabari'),
(17, 'Old Dhaka (Puran Dhaka)'),
(18, 'Wari'),
(19, 'Shantinagar'),
(20, 'Kamrangirchar'),
(21, 'Farmgate'),
(22, 'New Market'),
(23, 'Elephant Road'),
(24, 'Lalbagh'),
(25, 'Badda'),
(26, 'Rampura'),
(27, 'Baily Road'),
(28, 'Eskaton'),
(29, 'Mohakhali'),
(30, 'Banglamotor');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `req_id` int(11) NOT NULL,
  `mistakes` text NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `req_id`, `mistakes`, `food_name`, `res_name`, `price`, `location`, `description`, `Status`) VALUES
(1, 3, 15, 'Please correct these mistakes: food_name, image, res_name and re-upload your request', 'flowers', 'Pizza Burg', '250', 'Khulna, Khulna District, Khulna Division, 9100, Bangladesh', 'ertert', 'Read'),
(2, 3, 14, 'Please correct these mistakes: Food Name, Image, Location, and re-upload your request', 'flower', 'Cheese Factory', '250', 'Khulna Division, Bangladesh', 'afadf', 'Read'),
(3, 3, 10, 'Please correct these mistakes: Food Name, Image, Price, and re-upload your request', 'spring rolls', 'kaktua', '1450', 'Adabor Road 8, Shekhertek, Adabar, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1207, Bangladesh', 'it\'s tasty.', 'Read'),
(4, 3, 15, 'Please correct these mistakes: Food Name, Restaurant Name, Location, Price, and re-upload your request', 'flowers', 'Pizza Burg', '250', 'Khulna, Khulna District, Khulna Division, 9100, Bangladesh', 'ertert', 'Read'),
(5, 3, 15, 'Please correct these mistakes: Image, Location, and re-upload your request', 'flowers', 'Pizza Burg', '250', 'Khulna, Khulna District, Khulna Division, 9100, Bangladesh', 'ertert', 'Read'),
(6, 3, 10, 'Please correct these mistakes: Food Name, Image, Restaurant Name, and re-upload your request', 'spring rolls', 'kaktua', '1450', 'Adabor Road 8, Shekhertek, Adabar, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1207, Bangladesh', 'vegetable roll', 'Read'),
(8, 3, 14, 'Please correct these mistakes: Food Name, and re-upload your request', 'flower', 'Cheese Factory', '250', 'Khulna Division, Bangladesh', 'afadf', 'Read'),
(9, 3, 14, 'Please correct these mistakes: Food Name, and re-upload your request', 'flower', 'Cheese Factory', '250', 'Khulna Division, Bangladesh', 'afadf', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `notif_read`
--

CREATE TABLE `notif_read` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `req_id` int(11) NOT NULL,
  `mistakes` text NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `username`, `image`, `firstname`, `lastname`, `address`, `contact`, `password`, `youtube`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'afia@gmail.com', 'afia', 'profile.jpg', 'Afia', 'Jahin', 'Rupnogor', '01754346749', '$2y$10$GZttvm6eLq/HoOGJwA43d.oAr0LFZ2pX4lxjgZXBvaAuWrbsZtpBi', '', '', '', ''),
(3, 'afiajahin.p25@gmail.com', 'afia1234', 'profile.jpg', 'Afia', 'Jahin', 'Rupnogor', '01754346749', '$2y$10$3LDtboLTYwTZ1FLRWV84sO5i9mhzt00cwoxct1jBfVQQwd7cGDtvm', 'www.youtube.com', 'www.instagram.com', '', 'www.twitter.com'),
(8, 'aj@gmail.com', '_afiaj', 'face1.jpg', 'Afia', 'Jahin', 'Mirpur', '01234567898', '$2y$10$6eqUpCRxijuXmckjHyC6Vud3as1ssmtMvQE1MIo3v640UVtb4mWA2', '', '', '', ''),
(9, 'ratun@gmail.com', 'ratun123', 'profile.jpg', 'kazi', 'ratun', 'mirpur 2', '01736537766', '$2y$10$PIwN4LpY4s2JHHFb/Ycwr.lWWg1/OUKxxZqgaD0Fdj7hnSTwkhr6S', '', '', '', ''),
(10, 'medha12@gmail.com', 'medha12', 'faceless-woman-icon-image-vector-14391791 (1).jpg', 'Medha', 'R', 'Mirpur', '01754129456', '$2y$10$ci.ZrbFRKPDegpPVxj07ROz4038wlzoLSy4EnToQwOKa2AMSzQx3y', '', '', '', ''),
(12, 'ratunprince2014@gmail.com', 'ratun', 'profile.jpg', 'kazi', 'Ratun', 'hojorborolo', '01111111111', '$2y$10$/vMddlc9zvKjqy5wAqC3q.xAfBoD7Zp8H80OeWD9nMAECLIuJe7Du', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `locationName` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `user_id` int(30) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `food_name`, `image`, `res_name`, `locationName`, `price`, `description`, `latitude`, `longitude`, `user_id`, `user_email`) VALUES
(23, 'Beef Pizza', 'chicken pizza.jpg', 'Pizza Burg', 'Pizza Burg, Avenue-1, Mirpur 2, Shah Ali Bagh, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1216, Bangladesh', '450', 'Chicken large pizza with extra cheese', '23.803350', '90.355019', 12, 'ratunprince2014@gmail.com'),
(24, 'Shrimp ', 'Shrimp.jpg', 'Hangout', 'hangout, Road 10A, West Dhanmondi, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1205, Bangladesh', '300', 'Fried Shrimp', '23.746101', '90.371135', 12, 'ratunprince2014@gmail.com'),
(25, 'Burger Combo', 'burger-combo.jpg', 'Burger King', 'burger king, Satmasjid Road, West Dhanmondi, Dhanmondi, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1209, Bangladesh', '650', 'Chicken cheese Burger with french fries and cold drinks', '23.738083', '90.375840', 3, 'afiajahin.p25@gmail.com'),
(26, 'Chicken Rice', 'chicken-rice.jpg', 'Dhaba', 'dhaba, Road 12A, Dhanmondi Residential Area, West Dhanmondi, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1205, Bangladesh', '540', 'Masala chicken with rice and roti', '23.747869', '90.370888', 3, 'afiajahin.p25@gmail.com'),
(27, 'Grilled Chicken', 'grill.jpg', 'Kabab Factory', 'Kabab Factory, Lake Drive Road, Sector 7, Uttara, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1231, Bangladesh', '630', 'Grilled Chicken', '23.867536', '90.393942', 10, 'medha12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rev_id` (`rev_id`,`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_info`
--
ALTER TABLE `food_info`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_review`
--
ALTER TABLE `food_review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `forkers`
--
ALTER TABLE `forkers`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `getfood_id`
--
ALTER TABLE `getfood_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_names`
--
ALTER TABLE `location_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_read`
--
ALTER TABLE `notif_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_info`
--
ALTER TABLE `food_info`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `food_review`
--
ALTER TABLE `food_review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `forkers`
--
ALTER TABLE `forkers`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `getfood_id`
--
ALTER TABLE `getfood_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_names`
--
ALTER TABLE `location_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notif_read`
--
ALTER TABLE `notif_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
