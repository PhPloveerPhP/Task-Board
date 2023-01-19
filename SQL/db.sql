CREATE DATABASE TaskBoard;
use TaskBoard;

create table users (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(30) not null,
    surname varchar(30) not null,
    email varchar(30) not null,
    create_at timestamp default current_timestamp,
    update_at timestamp default current_timestamp
);


create table tasks (
    id_task int UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
    id int,
    description varchar(255) NOT NULL,
    
    FOREIGN KEY (id) REFERENCES tasks users(id)
);
