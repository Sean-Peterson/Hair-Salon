# _Hair Salon_

#### _This website allows the user to manage Hairriette's Hair Salon._

#### By _**Sean Peterson**_


## Description

_Hair Salon allows the user to manage Hairriete's hair salon. The user can hire and fire stylists and decide who their clients are._

## Setup/Installation Requirements

* In terminal run the following commands:

1. _Fork and clone this repository onto your desktop from_ [gitHub](https://github.com/Sean-Peterson/hair-salon).
2. Open chrome and enter localhost:8888/phpmyadmin
3. Click on Import, Choose File, desktop/hair-salon/data/hair_salon.sql.zip
4. Ensure [composer](https://getcomposer.org/) is installed on your computer.
5. Navigate to the root directory of the project in which ever CLI shell you are using and run the command: `composer install`.
6. To run tests enter `composer test` in terminal.
7. Create a local server in the /web directory within the project folder using the command: `php -S localhost:8000` (assuming you are using macOS - commands are different on other operating systems).
8. Open the directory http://localhost:8000/ in any standard web browser.
9. Make sure MAMP is started and change the MySQL number in the src files to your computer's sql port number. 

## Specifications

1. Home page lists all stylists, user selects a stylist and app navigates to that stylist's page

2. On homepage user inputs new stylist type and clicks Add. App adds new stylist to list of stylists

3. On a stylist page, user inputs the details of a client and app adds it to the list for that stylist

5. On homepage, user inputs new name. App changes stylist name to new name

6. On stylist page, user clicks fire this stylist and app deletes the stylist

9. On a stylist page, user clicks a client and app navigates to the client's page

11. On client page, user inputs new name. App changes client name to new name

12. On client page, user clicks Dont let this client come back and app deletes the client

13. On client page, user clicks back link and app navigates back to stylist page

14. On client page, user clicks home and app navigates them back to home page

## Known Bugs

_None so far._

## Support and contact details

_Please contact seanpeterson11@gmail.com with concerns or comments._

## Technologies Used

* _HTML_
* _CSS_
* _PHP_
* _PHPUnit_
* _Composer_
* _Silex_
* _Twig_
* _MySQL_

### License

*MIT license*

Copyright (c) 2017 **_Sean Peterson_**










Database Commands
create database hair_salon;
use hair_salon;
create table stylists (id serial PRIMARY KEY, name varchar (255));
create table clients (id serial PRIMARY KEY, name varchar (255), stylist_id bigint);
in phpmyadmin copy hair_salon as hair_salon_test
