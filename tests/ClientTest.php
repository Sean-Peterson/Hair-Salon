<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Client.php";

$server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class ClientTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Client::deleteAll();
    }

    function test_getters()
    {
        // Arrange
        $id = 1;
        $client_name = 'Dave';
        $stylist_id = 1;
        $test_client = new Client ($client_name, $stylist_id, $id);

        // Act
        $result = array($test_client->getId(), $test_client->getClientName(), $test_client->getStylistId());
        $expected_result = array(1, 'Dave', 1);

        // Assert
        $this->assertEquals($result, $expected_result);
    }




}

?>
