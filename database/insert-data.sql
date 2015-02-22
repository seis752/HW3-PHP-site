-- insert-data.sql

USE `seismcdo8429`;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
INSERT INTO `user`
(`id`,
`username`,
`password`,
`display_name`)
VALUES
(1,'user1','password','A'),
(2,'user2','password','B'),
(3,'user3','password','C'),
(4,'user4','password','D'),
(5,'user5','password','E'),
(6,'user6','password','F'),
(7,'user7','password','G');

-- -----------------------------------------------------
-- Table `relationship`
-- -----------------------------------------------------
INSERT INTO `relationship`
(`id`,
`user_1_id`,
`user_2_id`)
VALUES
(1,1,3),
(2,2,4),
(3,2,6);

