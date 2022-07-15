-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for upwork-test
DROP DATABASE IF EXISTS `upwork-test`;
CREATE DATABASE IF NOT EXISTS `upwork-test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `upwork-test`;

-- Dumping structure for table upwork-test.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_id` (`stock_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table upwork-test.product_balance
DROP TABLE IF EXISTS `product_balance`;
CREATE TABLE IF NOT EXISTS `product_balance` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table upwork-test.stocks
DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table upwork-test.transactions
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL DEFAULT '0',
  `transaction_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table upwork-test.transactions_details
DROP TABLE IF EXISTS `transactions_details`;
CREATE TABLE IF NOT EXISTS `transactions_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `balance` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table upwork-test.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for trigger upwork-test.transactions_details_before_insert
DROP TRIGGER IF EXISTS `transactions_details_before_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `transactions_details_before_insert` BEFORE INSERT ON `transactions_details` FOR EACH ROW  BEGIN 
 DECLARE _stock_id INT	;
 DECLARE _product_id INT	;
 DECLARE _unit_id INT;
 DECLARE _transaction_type_id INT;
 DECLARE _is_input tinyint;
 DECLARE _quantity Double;
 DECLARE is_exists int;
 
 SELECT product_id  INTO _product_id from transactions_details WHERE id= NEW.ID;
 SELECT quantity  INTO _quantity from transactions_details WHERE id= NEW.ID;
 SELECT stock_id  INTO _stock_id from transactions_details WHERE id= NEW.ID;
 
 SET  _stock_id = (SELECT stock_id FROM transactions WHERE id= NEW.transaction_id LIMIT 1);
 
 SET _transaction_type_id= (SELECT  transaction_type_id FROM transactions  WHERE id=NEW.transaction_id LIMIT 1);
 
 SET _is_input= (SELECT  is_input FROM transactions  WHERE id=NEW.transaction_id);
 
 SET is_exists = (SELECT COUNT(*) FROM product_balance WHERE poduct_id = _product_id AND stock_id= _stock_id);
 
 if(_transaction_type_id= 5) then
	 if(is_exists=1)
		 then 
		 
			 UPDATE product_balance SET balance= _quantity,
			 updated_at =SYSDATE()
			 WHERE stock_id=_stock_id AND product_id= _product_id;
			 
		 ELSE
		 	if(_quantity > 0)
		 		then
		 		insert INTO product_balance(product_id, stock_id, balance, created_at)
		 			VALUES(_porduct_id,_stock_id,_quantity,SYSDATE());
		 			
		 	end if;
		end if;
		
	ELSE	
			if(_is_input = 0)
			then 
			SET _quantity = _quantity * -1;
			END if;
			
		 	if(is_exists = 1)
		 	then
				UPDATE product_balance SET balance= balance+_quantity,
				update_at= SYSDATE()
				 WHERE stock_id = _stock_id AND product_id= _product_id;
			 
			 ELSE	
				 if(_quantity>0) then 
				  insert INTO product_balance(product_id,stock_id,balance,created_at)
					 VALUES(_product_id,_stock_id,_quantity,SYSDATE());
					 
					END if;
				END if;
				
		END if;
			

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
