-- To create a new database, run MySQL client:
--   mysql -u root -p
-- Then in MySQL client command line, type the following (replace <password> with password string):
--   create database blog;
--   grant all privileges on blog.* to blog@localhost identified by '<password>';
--   quit
-- Then, in shell command line, type:
--   mysql -u root -p blog < schema.mysql.sql

set names 'utf8';

-- Post
CREATE TABLE `post` (     
  `id` int(11) PRIMARY KEY AUTO_INCREMENT, -- Unique ID
  `title` text NOT NULL,      -- Title  
  `content` text NOT NULL,    -- Text 
  `status` int(11) NOT NULL,  -- Status  
  `date_created` datetime NOT NULL -- Creation date    
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Comment
CREATE TABLE `comment` (     
  `id` int(11) PRIMARY KEY AUTO_INCREMENT, -- Unique ID  
  `post_id` int(11) NOT NULL,     -- Post ID this comment belongs to  
  `content` text NOT NULL,        -- Text
  `author` varchar(128) NOT NULL, -- Author's name who created the comment  
  `date_created` datetime NOT NULL -- Creation date          
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Tag
CREATE TABLE `tag` (     
  `id` int(11) PRIMARY KEY AUTO_INCREMENT, -- Unique ID.  
  `name` VARCHAR(128) NOT NULL,            -- Tag name.  
  UNIQUE KEY `name_key` (`name`)          -- Tag names must be unique.      
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Post-Tag
CREATE TABLE `post_tag` (     
  `id` int(11) PRIMARY KEY AUTO_INCREMENT, -- Unique ID  
  `post_id` int(11),                       -- Post id
  `tag_id` int(11),                        -- Tag id
   UNIQUE KEY `unique_key` (`post_id`, `tag_id`), -- Tag names must be unique.
   KEY `post_id_key` (`post_id`),
   KEY `tag_id_key` (`tag_id`)      
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
--Clientes
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `estado_fk` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

--Productos
CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `estado_fk` tinyint(4) NOT NULL,
  `precio_producto` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

--Estados
CREATE TABLE `estados` (
  `id_estados` tinyint(4) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codigo_producto` (`nombre_cliente`);

-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estados`);

-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estados` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `estado_fk`, `date_added`) VALUES
(1, 'victor ml nunez lopez', '+50663408687', 'victornunezcr@gmail.com', 'Guapiles\r\nRio Frio, Sarapiqui', 1, '2019-03-15 22:11:01');

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `estado_fk`, `precio_producto`) VALUES
(1, 'ser01', 'Soporte TI', 1, 15000);

INSERT INTO `estados` (`id_estados`, `descripcion`) VALUES(1, 'Activo');
INSERT INTO `estados` (`id_estados`, `descripcion`) VALUES(2, 'Inactivo');

INSERT INTO tag(`name`) VALUES('ZF3');
INSERT INTO tag(`name`) VALUES('book');
INSERT INTO tag(`name`) VALUES('magento');
INSERT INTO tag(`name`) VALUES('bootstrap');

INSERT INTO post(`title`, `content`, `status`, `date_created`) VALUES(
   'A Free Book about Zend Framework',
   'I''m pleased to announce that now you can read my new book "Using Zend Framework 3" absolutely for free! Moreover, the book is an open-source project hosted on GitHub, so you are encouraged to contribute.', 
   2, '2016-08-09 18:49');

INSERT INTO post(`title`, `content`, `status`, `date_created`) VALUES(
   'Getting Started with Magento Extension Development - Book Review',
   'Recently, I needed some good resource to start learning Magento e-Commerce system for one of my current web projects. For this project, I was required to write an extension module that would implement a customer-specific payment method.', 
   2, '2016-08-10 18:51');

INSERT INTO post(`title`, `content`, `status`, `date_created`) VALUES(
   'Twitter Bootstrap - Making a Professionaly Looking Site',
   'Twitter Bootstrap (shortly, Bootstrap) is a popular CSS framework allowing to make your web site professionally looking and visually appealing, even if you don''t have advanced designer skills.', 
   2, '2016-08-11 13:01');

INSERT INTO post_tag(`post_id`, `tag_id`) VALUES(1, 1);
INSERT INTO post_tag(`post_id`, `tag_id`) VALUES(1, 2);
INSERT INTO post_tag(`post_id`, `tag_id`) VALUES(2, 2);
INSERT INTO post_tag(`post_id`, `tag_id`) VALUES(2, 3);
INSERT INTO post_tag(`post_id`, `tag_id`) VALUES(3, 4);

INSERT INTO comment(`post_id`, `content`, `author`, `date_created`) VALUES(
    1, 'Excellent post!', 'Oleg Krivtsov', '2016-08-09 19:20');