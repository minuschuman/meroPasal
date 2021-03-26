--Table structure for user
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `delete_status` int(11) NOT NULL
)
--Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`)
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
-- Indexes for table `categories`
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`)
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
-- Indexes for table `products`
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`)

--Dumpping data in product table
INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `cat_id`, `date`, `delete_status`)
VALUES
(1, 'A', '10', '4000.00', '40000.00', 1, 'SYSDATE()', 0),
(2, 'B', '10', '100.00', '1000.00', 1, 'SYSDATE()', 0);

-- --Table structure for Sold Goods
-- CREATE TABLE `sales` (
--   `id` int(11) NOT NULL,
--   `product_id` int(11) NOT NULL,
--   `qty` int(11) NOT NULL,
--   `price` decimal(11,0) NOT NULL,
--   `date` date NOT NULL,
--   `delete_status` int(11) NOT NULL
-- )


CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `buy_date` date NOT NULL,
  `cid` int(11) NOT NULL,
  `total` double(10,2) NOT NULL,
  `remark` text NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ;


CREATE TABLE `sales` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `date` date NOT NULL,
  `delete_status` int(11) NOT NULL
)
-- Indexes for table `sales`
/*ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);*/
  ALTER TABLE `sales` ADD  CONSTRAINT `prod_sale` FOREIGN KEY (`prod_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- --
-- -- Dumping data for table `sales`
-- --
--
INSERT INTO `sales` (`id`, `prod_id`, `qty`, `price`, `date`, `delete_status`) VALUES
(0, 0, 5, 5000.00, '2020-08-04', 0);




CREATE TABLE `customer`(
  --`id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `reg_date` date NOt NULL,
  `delete_status` int(11) NOT NULL,
  `t_buy` double(10,2) NOT NULL
);
