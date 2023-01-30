CREATE DATABASE IF NOT EXISTS TaskBoard;
use TaskBoard;

create table IF NOT EXISTS users (
    id_user int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(30) not null,
    email varchar(30) not null,
    passw varchar(30) not null,
    create_at timestamp default current_timestamp,
    update_at timestamp default current_timestamp
);


create table IF NOT EXISTS tasks (
    id_task int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user int UNSIGNED NOT NULL,
    description varchar(150) NOT NULL,
    status ENUM("U", "P", "H", "C") NOT NULL default "U",
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);


