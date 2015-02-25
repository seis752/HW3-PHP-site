-- insert-data.sql

USE `seis752justin_db`;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
INSERT INTO `user`
(`id`,
`username`,
`password`,
`display_name`)
VALUES
(1,'user1','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','A'),
(2,'user2','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','B'),
(3,'user3','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','C'),
(4,'user4','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','D'),
(5,'user5','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','E'),
(6,'user6','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','F'),
(7,'user7','$1$Yh0.B50.$JaoTIafemHYbEr65N9HhZ0','G');

-- -----------------------------------------------------
-- Table `relationship`
-- -----------------------------------------------------
INSERT INTO `relationship`
(`user_1_id`,
`user_2_id`)
VALUES
(1,3),
(3,1),
(2,4),
(4,2),
(2,6),
(6,2);

