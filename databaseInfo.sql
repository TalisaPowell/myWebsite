CREATE TABLE store_categories (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cat_title VARCHAR (50) UNIQUE,
cat_desc TEXT
);
CREATE TABLE store_items (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cat_id INT NOT NULL,
item_title VARCHAR (75),
item_price FLOAT (8,2),
item_desc TEXT,
item_image VARCHAR (50)
);
CREATE TABLE store_item_size (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
item_id INT NOT NULL,
item_size VARCHAR (25)
);
CREATE TABLE store_item_color (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
item_id INT NOT NULL,
item_color VARCHAR (25)
);

INSERT INTO store_categories VALUES
(1, 'Hats', 'Funky hats in all shapes and sizes!');

INSERT INTO store_categories VALUES (2, 'Shirts', 'From t-shirts to
sweatshirts to polo shirts and beyond.');

INSERT INTO store_categories VALUES (3, 'Books', 'Paperback, hardback,
books for school or play.');

INSERT INTO store_categories VALUES (4, 'Bakery', 'Fresh baked goods.');

INSERT INTO store_items VALUES (1, 1, 'Baseball Hat', 12.00,
'Fancy, low-profile baseball hat.', 'Pictures/baseballhat.gif');

INSERT INTO store_items VALUES (2, 1, 'Cowboy Hat', 55.00,
'10 gallon variety', 'Pictures/cowboy.jpg');

INSERT INTO store_items VALUES (3, 1, 'Top Hat', 15.00,
'Good for costumes.', 'Pictures/tophat.jpg');

INSERT INTO store_items VALUES (4, 2, 'Short-Sleeved T-Shirt',
12.00, '100% cotton, pre-shrunk.', 'Pictures/shortsleeve.jpg');

INSERT INTO store_items VALUES (5, 2, 'Long-Sleeved T-Shirt',
15.00, 'Just like the short-sleeved shirt, with longer sleeves.',
'Pictures/longsleeve.jpg');

INSERT INTO store_items VALUES (6, 2, 'Sweatshirt', 25.00,
'Heavy and warm.', 'Pictures/sweatshirt.jpg');

INSERT INTO store_items VALUES (7, 3, 'Dont Make Me Think',
45.00, 'Steve Krug gives helpful tips for developing websites.', 'Pictures/krugbook.jpg');

INSERT INTO store_items VALUES (8, 3, 'Generic Academic Book',
45.00, 'Some required reading for school, will put you to sleep.',
'Pictures/book.jpg');

INSERT INTO store_items VALUES (9, 3, 'Chicago Manual of Style',
9.99, 'Good for copywriters.', 'Pictures/chicagostyle.gif');

INSERT INTO store_items VALUES
(10, 4, 'Chocolate Cupcake', 4.45, 'Satisfy your Sweet Tooth.', 'Pictures/cupcake.jpg');

INSERT INTO store_items VALUES
(11, 4, 'Blueberry Muffin', 3.50, 'Nice for Breakfast.', 'Pictures/blueberry.jpg');

INSERT INTO store_items VALUES
(12, 4, 'Pumpkin Muffin', 3.50, 'Will remind you of Autumn months.', 'Pictures/pumpkin.jpg');



INSERT INTO store_item_size (item_id, item_size) VALUES (1,'One Size Fits All');
INSERT INTO store_item_size (item_id, item_size) VALUES (2,'One Size Fits All');
INSERT INTO store_item_size (item_id, item_size) VALUES (3,'One Size Fits All');
INSERT INTO store_item_size (item_id, item_size) VALUES (4,'S');
INSERT INTO store_item_size (item_id, item_size) VALUES (4,'M');
INSERT INTO store_item_size (item_id, item_size) VALUES (4,'L');
INSERT INTO store_item_size (item_id, item_size) VALUES (4,'XL');

INSERT INTO store_item_color (item_id, item_color) VALUES (1,'red');
INSERT INTO store_item_color (item_id, item_color) VALUES (1,'black');
INSERT INTO store_item_color (item_id, item_color) VALUES (1,'blue');