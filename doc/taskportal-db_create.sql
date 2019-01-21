CREATE TABLE `statuses` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `tasks` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`email_id` int NOT NULL,
	`content` varchar(256) NOT NULL,
	`start_date` DATETIME NOT NULL,
	`fin_date` DATETIME,
	`status_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `emails` (
	`id` int NOT NULL AUTO_INCREMENT,
	`email` varchar(50) NOT NULL UNIQUE,
	`user_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk1` FOREIGN KEY (`email_id`) REFERENCES `emails`(`id`);

ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk2` FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`);

ALTER TABLE `emails` ADD CONSTRAINT `emails_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

