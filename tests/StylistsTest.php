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
    // protected function tearDown()
    // {
    //     Stylists::deleteAll();
    // }

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


}

?>
