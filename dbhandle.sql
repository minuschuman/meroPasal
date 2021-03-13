--Table structure for user
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `delete_status` int(11) NOT NULL
)
--Dumpping Data in user table
INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `status`, `last_login`, `delete_status`) VALUES
(1, 'me', 'me@me', '202cb962ac59075b964b07152d234b70', 1, 1, NULL, 0);
--password 123


--table structure for Goods category
CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `delete_status` int(11) NOT NULL
)
--Dumpping Data in categories.table
INSERT INTO `categories` (`id`,`name`,`delete_status`) VALUES (1,'testproduct','0')

--Table structure for Products
CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `delete_status` int(11) NOT NULL
)
--Dumpping data in product table
INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `cat_id`, `date`, `delete_status`)
VALUES
(1, 'A', '10', '4000.00', '40000.00', 1, 'SYSDATE()', 0),
(2, 'B', '10', '100.00', '1000.00', 1, 'SYSDATE()', 0);

--Table structure for Sold Goods
CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `date` date NOT NULL,
  `delete_status` int(11) NOT NULL
)


-- CREATE TABLE `sales` (
--   `id` int(50) NOT NULL,
--   `build_date` date NOT NULL,
--   `customer_name` varchar(100) NOT NULL,
--   `total` double(10,2) NOT NULL,
--   `remark` text NOT NULL,
--   `delete_status` tinyint(4) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- --
-- -- Dumping data for table `sales`
-- --
--
-- INSERT INTO `sales` (`id`, `build_date`, `customer_name`, `total`, `remark`, `delete_status`) VALUES
-- (1, '2020-08-04', 'Pooja', 55000.00, 'Sale remark', 0);
