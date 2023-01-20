CREATE DATABASE IF NOT EXISTS TaskBoard;
use TaskBoard;

create table IF NOT EXISTS users (
    id_user int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(30) not null,
    surname varchar(30) not null,
    email varchar(30) not null,
    create_at timestamp default current_timestamp,
    update_at timestamp default current_timestamp
);


create table IF NOT EXISTS tasks (
    id_task int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user int UNSIGNED NOT NULL,
    description varchar(150) NOT NULL,
    status ENUM("U", "P", "H", "C") NOT NULL default "U",
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);


-- Testing

insert into users(name, surname, email) values ("Mario", "Perez", "marioperezmarrero@gmail.com");
insert into tasks(id_user, description, status) values (1, "Esta tarea es una prueba", "U");
insert into tasks(id_user, description, status) values (1, "Esta tarea es una prueba 2", "P");
insert into tasks(id_user, description, status) values (1, "Esta tarea es una prueba 3", "H");  
insert into tasks(id_user, description, status) values (1, "Esta tarea es una prueba 4", "C");