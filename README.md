create database hair_salon;
create table stylists (id serial PRIMARY KEY, name varchar (255));
create table clients (id serial PRIMARY KEY, name varchar (255), stylist_id bigint);
