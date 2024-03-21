
create database if not exists boat_rental;

use boat_rental;

create table users (
	id int not null auto_increment,
    firstname varchar(30) not null,
    lastname varchar(30) not null,
    telephone varchar(50) not null,
    email text not null,
    password text not null,
    primary key (id)
);

create table boats (
	id int not null auto_increment,
    photo1 text not null,
    photo2 text not null,
    brand varchar(30) not null,
    model smallint not null,
    fuel_type varchar(15) not null,
    price float not null,
    available boolean not null,
    primary key (id)
);

create table rentals (
	id int not null auto_increment,
    rental_date date not null,
    return_date date not null,
    price float not null,
    user_id int,
    boat_id int,
    primary key (id),
    foreign key (user_id) references users(id),
    foreign key (boat_id) references boats(id)
);

insert into boats (photo1, photo2, brand, model, fuel_type, price, available) values
('https://images.boatsgroup.com/images/1/84/15/9138415_20231211164036994_1_XLARGE.jpg',
'https://images.boatsgroup.com/images/1/84/15/9138415_20231211164036994_1_XLARGE.jpg',
'BASS TRACKER CLASSIC XL', 2019, 'diesel', 50, 0),

('https://images.boatsgroup.com/images/1/64/25/9006425_20230831122305579_1_XLARGE.jpg',
'https://images.boatsgroup.com/images/1/64/25/9006425_20230831122305579_1_XLARGE.jpg',
'Tracker Grizzly 1648 SC', 2021, 'diesel', 80, 1);
