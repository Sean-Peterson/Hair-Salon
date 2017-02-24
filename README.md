create database hair_salon;
create table stylist (id serial PRIMARY KEY, name varchar (255), client_id bigint);
create table clients (id serial PRIMARY KEY, name varchar (255));
