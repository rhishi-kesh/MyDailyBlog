-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2023 at 02:19 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `blog_body` text COLLATE utf8mb4_general_ci NOT NULL,
  `blog_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` int NOT NULL,
  `author_id` int NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `blog_img`, `category`, `author_id`, `publish_date`) VALUES
(3, 'This is title', '<h1><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur doloribus pariatur repellat facilis, itaque explicabo illum optio molestias quam modi doloremque tempora suscipit dolorem aspernatur labore ratione illo odio corrupti?</strong></h1>\r\n', 'fruit3.jpg', 7, 1, '2023-01-18 18:52:23'),
(4, 'This is heading 3', '<p>this is dumy text 2</p>\r\n', 'cat4.jpg', 12, 1, '2023-01-19 06:11:49'),
(5, 'Yybb', '<p>Ghhz</p>\r\n', 'cat1.jpg', 12, 3, '2023-01-21 10:04:16'),
(6, 'Jjf', '<p>Kgf</p>\r\n', 'cat2.jpg', 9, 4, '2023-01-21 10:09:04'),
(7, 'কুমিল্লার তরুণ বাঁহাতি স্পিনারে মুগ্ধ রিজওয়ান', '<p>এক হাতের আঙুল তুলে আউট দেওয়ার ভঙ্গি, আরেক হাতের আঙুল ঠোঁটে, যেন সবাইকে চুপ করতে বলছেন তানভীর ইসলাম। এবারের বিপিএলে কুমিল্লা ভিক্টোরিয়ানসের হয়ে খেলা এই বাঁহাতি স্পিনার প্রতিটি উইকেট নেওয়ার পরেই এমন ভঙ্গিতে উদ্&zwnj;যাপন করেছেন।</p>\r\n\r\n<p>তানভীরের এ উদ্&zwnj;যাপনের দৃশ্য এখন সবার পরিচিত। কারণ, এবারের বিপিএলে মাত্র ৪ ম্যাচ খেলে ৮ উইকেট শিকার করে শীর্ষ উইকেটশিকারিদের তালিকায় তৃতীয় অবস্থানে আছেন তানভীর, ইকোনমি মাত্র ৫.৭৫।</p>\r\n\r\n<p>মোস্তাফিজুর রহমান ও হাসান আলীর মতো বোলারদের মধ্যেও প্রতিপক্ষের কাছে কুমিল্লার বোলিং আক্রমণে &lsquo;মূল বোলার&rsquo; এখন তানভীরই। নিয়ন্ত্রিত বোলিং তো আছেই। সঙ্গে উইকেটও নিচ্ছেন। কুমিল্লার অধিনায়ক ইমরুল কায়েস তো তানভীরকে জাতীয় দলের জন্য প্রস্তুতই মনে করেন। চট্টগ্রামে এক সংবাদ সম্মেলনে তানভীরের প্রশংসা করে তিনি বলেছেন, &lsquo;সে এখন প্রস্তুত জাতীয় দলে খেলার জন্য। সে মাথা খাটিয়ে বোলিং করে।&rsquo;</p>\r\n', 'prothomalo-bangla_2023-01_1c8e4317-3235-4e64-8463-fcdabd4f09b2_Tanvir_reacts_after_Mashrafe_Bowled_out__1.jpg', 9, 3, '2023-01-22 16:51:01'),
(8, 'জগন্নাথ বিশ্ববিদ্যালয়ে এককভাবে ভর্তি পরীক্ষা চান শিক্ষকেরা', '<p>সমন্বিত বিশ্ববিদ্যালয় ভর্তি পরীক্ষা (গুচ্ছ পদ্ধতি) থেকে বের হয়ে নিজস্ব ব্যবস্থাপনায় এককভাবে ভর্তি পরীক্ষা নিতে চান জগন্নাথ বিশ্ববিদ্যালয়ের শিক্ষকেরা।</p>\r\n\r\n<p>বিশ্ববিদ্যালয়ের শিক্ষকদের সংগঠন শিক্ষক সমিতির সাধারণ সভায় এই বিষয়ে একমত হয়েছেন শিক্ষকেরা। বিষয়টি বিশ্ববিদ্যালয়ের উপাচার্যকে অবহিতকরণ ও প্রয়োজনীয় ব্যবস্থা নিতে অনুরোধ জানিয়েছেন শিক্ষক প্রতিনিধিরা।</p>\r\n\r\n<p>রোববার উপাচার্যকে দেওয়া চিঠিতে বলা হয়েছে, ভর্তি-ইচ্ছুকদের পছন্দের তালিকায় ঢাকা বিশ্ববিদ্যালয়ের পরেই জগন্নাথ বিশ্ববিদ্যালয়ের অবস্থান। শিক্ষা ও গবেষণায় জগন্নাথ বিশ্ববিদ্যালয় সারা দেশের বিশ্ববিদ্যালয়গুলোর মধ্যে এক অনন্য অবস্থান তৈরি করে এগিয়ে যাচ্ছে। জগন্নাথ বিশ্ববিদ্যালয়ের ভর্তিপ্রক্রিয়া ও কৌশল উন্নততর হওয়ায় যখন তা ঢাকা বিশ্ববিদ্যালয়ের মতো পুরোনো বিশ্ববিদ্যালয়গুলো গ্রহণ করেছে, ঠিক সেই মুহূর্তে সাধারণ শিক্ষকদের সঙ্গে কোনো পরামর্শ না করেই প্রশাসনিক একক সিদ্ধান্তে গুচ্ছ পদ্ধতির নামে নতুন এক পরীক্ষা পদ্ধতির মধ্যে জগন্নাথ বিশ্ববিদ্যালয়কে ঢোকানো হয়।</p>\r\n\r\n<p>চিঠিতে আরও বলা হয়, গুচ্ছ পদ্ধতিতে পরীক্ষা নেওয়ায় শিক্ষার্থীদের ভোগান্তি কমার পরিবর্তে আরও বেড়েছে। এ ছাড়া আর্থিক স্বচ্ছতার অভাব, অপেক্ষাকৃত দুর্বল মেধার শিক্ষার্থী প্রাপ্তিসহ নানা সমস্যার কারণে জগন্নাথ বিশ্ববিদ্যালয়ের সুনাম ব্যাপকভাবে ক্ষুণ্ন হচ্ছে।</p>\r\n\r\n<p>পরিবর্তিত পরিস্থিতিতে বিশ্ববিদ্যালয় শিক্ষক সমিতি গত বছরের ১৮ এপ্রিল তৃতীয় সাধারণ সভায় উপরিউক্ত সমস্যা সমাধানে ১০ দফা দাবি বাস্তবায়নের লক্ষ্যমাত্রা দিয়ে শেষবারের মতো গুচ্ছে থাকার সিদ্ধান্ত নেয়। কিন্তু অধিকাংশ দাবি বাস্তবায়ন না হওয়ায় গত বছরের ১৯ অক্টোবর বিশ্ববিদ্যালয়ের শিক্ষকেরা সর্বসম্মতিক্রমে গুচ্ছ পদ্ধতি থেকে বের হয়ে নিজস্ব ব্যবস্থাপনায় এককভাবে ভর্তি পরীক্ষা গ্রহণের সিদ্ধান্ত নেন।</p>\r\n\r\n<p>রোববারের সাধারণ সভায় শিক্ষক সমিতির সভাপতি আইনুল ইসলাম, সাধারণ সম্পাদক লুৎফর রহমানসহ বিভিন্ন বিভাগের শিক্ষকেরা উপস্থিত ছিলেন।</p>\r\n', 'prothomalo-bangla_2021-12_5318cae0-9da1-470c-9f30-09f5f45b07d1_Untitled_4 (1).png', 5, 3, '2023-01-22 18:41:40'),
(10, 'ফুলকির শিশুদের বকবধ পালা মঞ্চায়ন', '<p>পাণ্ডবেরা একবার বনবাসে গিয়ে ব্রাহ্মণের ঘরে আশ্রয় নিলেন। তাঁরা ভিক্ষা করে যা আনতেন, মা কুন্তী তা দুই ভাগ করে এক ভাগ পুত্র ভীমকে দিতেন। অন্য ভাগ অপর চার ভাই ও কুন্তী খেতেন। একদিন যুধিষ্ঠিররা ভিক্ষা করতে গেছেন। শুধু ভীম আর কুন্তী ঘরে আছেন। এমন সময় তাঁদের আশ্রয়দাতা ব্রাহ্মণের ঘর থেকে আর্তনাদ শুনতে পেলেন।</p>\r\n\r\n<p>কুন্তী ব্রাহ্মণের কাছে তাদের বিলাপ করার কারণ জানতে চাইলেন। তখন ব্রাহ্মণ জানান, তাঁদের নগরের কাছে বক নামে এক মহাশক্তিশালী রাক্ষস বাস করে, সে&ndash;ই এদেশের রাজা। বক মানুষ, মহিষ আর খাদ্য খায়। আজ ব্রাহ্মণের যাবার পালা, দরিদ্র ব্রাহ্মণ স্ত্রী, পুত্র, কন্যাকে সঙ্গে নিয়ে রাক্ষসের কাছে যাবে ঠিক করেছেন।</p>\r\n\r\n<p>কুন্তী ব্রাহ্মণকে আশ্বস্ত করে বলে যে তাদের পরিবর্তে ভীম যাবে সেই রাক্ষসের কাছে। পরদিন মায়ের আদেশে ভীম রাক্ষসের খাবারদাবার নিয়ে রাক্ষসের বনে গেলেন এবং রাক্ষসকে নাম ধরে ডাকতে লাগলেন। বক রাক্ষস এসে দেখে ভীম বসে বসে রাক্ষসের খাবারগুলো নিজে খেয়ে ফেলছে। এরপর ভীমের সঙ্গে বক রাক্ষসের তুমুল লড়াই হলো। ভীম বক রাক্ষসকে গলা টিপে হত্যা করল।</p>\r\n\r\n<p>পৌরাণিক কাহিনি অবলম্বে লীলা মজুমদারের &lsquo;বক বধ&rsquo; পালার এই গল্প দারুণভাবে মঞ্চে তুলে এনেছে শিশুদের সাংস্কৃতিক জগৎ ফুলকির শিক্ষার্থীরা। গত বৃহস্পতি ও শুক্রবার রাতে চট্টগ্রামের শিল্পকলা একাডেমি মিলনায়তনে &lsquo;বক বধ&rsquo; পালার মঞ্চায়ন হয়ে গেল। পালাটির নির্মাণ ভাবনায় ছিলেন মুবিদুর রহমান সুজাত। পালার গানগুলোর সুরারোপ করেছেন সত্যজিৎ দাশ।</p>\r\n\r\n<p>কুন্তী ব্রাহ্মণকে আশ্বস্ত করে বলে যে তাদের পরিবর্তে ভীম যাবে সেই রাক্ষসের কাছে। পরদিন মায়ের আদেশে ভীম রাক্ষসের খাবারদাবার নিয়ে রাক্ষসের বনে গেলেন এবং রাক্ষসকে নাম ধরে ডাকতে লাগলেন। বক রাক্ষস এসে দেখে ভীম বসে বসে রাক্ষসের খাবারগুলো নিজে খেয়ে ফেলছে। এরপর ভীমের সঙ্গে বক রাক্ষসের তুমুল লড়াই হলো। ভীম বক রাক্ষসকে গলা টিপে হত্যা করল।</p>\r\n\r\n<p>পৌরাণিক কাহিনি অবলম্বে লীলা মজুমদারের &lsquo;বক বধ&rsquo; পালার এই গল্প দারুণভাবে মঞ্চে তুলে এনেছে শিশুদের সাংস্কৃতিক জগৎ ফুলকির শিক্ষার্থীরা। গত বৃহস্পতি ও শুক্রবার রাতে চট্টগ্রামের শিল্পকলা একাডেমি মিলনায়তনে &lsquo;বক বধ&rsquo; পালার মঞ্চায়ন হয়ে গেল। পালাটির নির্মাণ ভাবনায় ছিলেন মুবিদুর রহমান সুজাত। পালার গানগুলোর সুরারোপ করেছেন সত্যজিৎ দাশ।</p>\r\n', 'prothomalo-bangla_2023-01_c5233f7a-6e9e-4b52-a565-2e15ef125ad8_325352785_761329448662629_3407789049789122384_n.jpg', 7, 3, '2023-01-22 18:45:26'),
(12, 'hello', '<p>who are you</p>\r\n', 'Screenshot 2022-08-14 at 00-18-38 Find the best global talent.png', 6, 4, '2023-01-24 12:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(5, 'politics'),
(6, 'Sports'),
(7, 'Entertainment'),
(9, 'News'),
(12, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(3, 'Reshi', 'admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(4, 'Reshi kash', 'moderator@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
