create database LoginSystem;
use LoginSystem;

create table `users`(
    `id` int(11) null auto_increment,
    `username` varchar(100) not null,
    `password` text,
    `dateRgistered` datetime not null default current_timestamp on update current_timestamp,
    primary key (`id`)
);