# データベースを作成しておく
# 	データベース名：TomokoEto
# 	文字コード　　：utf8_bin

# DROP DATABASE TomokoEto;
# DROP USER 'TomokoEto'@'localhost';

# ユーザーの作成
# 	ユーザー名：TomokoEto
# 	パスワード：pass

*CREATE USER 'TomokoEto'@'localhost';

*SET PASSWORD FOR 'TomokoEto'@'localhost'=PASSWORD('pass');

*GRANT USAGE ON *.* TO 'TomokoEto'@'localhost' IDENTIFIED BY 'pass' WITH MAX_QUERIES_PER_HOUR 0
 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 
GRANT ALL PRIVILEGES ON TomokoEto.* TO 'TomokoEto'@'localhost' WITH GRANT OPTION;

#DROP TABLE item;
#DROP TABLE sales;

# テーブルの作成

CREATE TABLE item (
 icd INT PRIMARY KEY,
 iname VARCHAR(30),
 iprice INT DEFAULT 0,
 iimage VARCHAR(30)
);

INSERT INTO item VALUES (1,'Chocolateカップケーキ',250,'thick_chocolate.jpg');
INSERT INTO item VALUES (2,'Caramelカップケーキ',250,'.jpg');
INSERT INTO item VALUES (3,'Espressoカップケーキ',250,'Espresso.jpg');
INSERT INTO item VALUES (4,'Lemonカップケーキ',250,'lemon-cupcake.jpg');
INSERT INTO item VALUES (5,'BlueberryChocolateカップケーキ',250,'blueberry_chocolate.jpg');
INSERT INTO item VALUES (6,'Rasberryカップケーキ',250,'rasberry.jpg');
INSERT INTO item VALUES (7,'Vanillaロッシェ',250,'vanilla_roche.jpg');
INSERT INTO item VALUES (8,'HazelnutsChocolateロッシェ',250,'Hazelnut-Chocolate.jpg');
INSERT INTO item VALUES (9,'GingerbreadManクッキー',180,'gingerbread_man.jpg');


CREATE TABLE sales (
 salesid INT AUTO_INCREMENT PRIMARY KEY,
 date DATETIME,
 icd INT,
 iname VARCHAR(30),
 scount INT DEFAULT 0,
 sprice INT DEFAULT 0,
 subtotal INT DEFAULT 0,
 payment VARCHAR(10),
 cname VARCHAR(30),
 cemail VARCHAR(30),
 ctel VARCHAR(15),
 czip VARCHAR(8),
 caddr VARCHAR(100),
 cmemo VARCHAR(200)
);

