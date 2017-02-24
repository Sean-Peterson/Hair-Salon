<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylists.php";

$server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class StylistsTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Stylists::deleteAll();
    }

    function test_getters()
    {
        // Arrange
        $id = 1;
        $stylist_name = 'Shannon';
        $test_stylist = new Stylists ($stylist_name,$id);

        // Act
        $result = array($test_stylist->getId(), $test_stylist->getStylistName());
        $expected_result = array(1, 'Shannon');

        // Assert
        $this->assertEquals($result, $expected_result);
    }

    function test_setter()
    {
        // Arrange
        $id = 1;
        $stylist_name = 'Shannon';
        $test_stylist = new Stylists ($stylist_name,$id);
        $test_stylist->setStylistName('Molly');
        // Act
        $result = array($test_stylist->getId(), $test_stylist->getStylistName());
        $expected_result = array(1, 'Molly');

        // Assert
        $this->assertEquals($result, $expected_result);
    }
    function test_save_getAll()
    {
        // Arrange
        $stylist_name_one = 'Shannon';
        $test_stylist_one = new Stylists ($stylist_name_one);
        $test_stylist_one->save();
        $stylist_name_two = 'Molly';
        $test_stylist_two = new Stylists ($stylist_name_two);
        $test_stylist_two->save();
        // Act
        $result = Stylists::getAll();
        $expected_result = array($test_stylist_one, $test_stylist_two);

        // Assert
        $this->assertEquals($result, $expected_result);
    }




}

?>
