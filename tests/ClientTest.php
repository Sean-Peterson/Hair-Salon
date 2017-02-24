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
        $client_id = 1;
        $test_client = new Client ($client_name, $client_id, $id);

        // Act
        $result = array($test_client->getId(), $test_client->getClientName(), $test_client->getStylistId());
        $expected_result = array(1, 'Dave', 1);

        // Assert
        $this->assertEquals($result, $expected_result);
    }

    function test_setter()
       {
           // Arrange
           $id = 1;
           $client_name = 'Dave';
           $stylist_id = 1;
           $test_client = new Client ($client_name, $stylist_id, $id);
           $new_name = 'Frank';
           $test_client->setClientName($new_name);

           // Act
           $result = array($test_client->getId(), $test_client->getClientName(), $test_client->getStylistId());
           $expected_result = array(1, 'Frank', 1);

           // Assert
           $this->assertEquals($result, $expected_result);
       }

   function test_save_getAll()
       {
           // Arrange
           $client_name_one = 'Dave';
           $stylist_id_one = 1;
           $test_client_one = new Client ($client_name_one, $stylist_id_one);
           $test_client_one->save();
           $client_name_two = 'Frank';
           $stylist_id_two = 2;
           $test_client_two = new Client ($client_name_two, $stylist_id_two);
           $test_client_two->save();
           // Act
           $result = Client::getAll();
           var_dump($result);
           $expected_result = array($test_client_one, $test_client_two);
        //    var_dump($expected_result);
           // Assert
           $this->assertEquals($result, $expected_result);
       }

       function test_findClient()
       {
           // Arrange
           $client_name_one = 'Dave';
           $stylist_id_one = 1;
           $test_client_one = new Client ($client_name_one, $stylist_id_one);
           $test_client_one->save();
           $client_name_two = 'Frank';
           $stylist_id_two = 2;
           $test_client_two = new Client ($client_name_two, $stylist_id_two);
           $test_client_two->save();
           // Act
           $result = Client::findClient($test_client_one->getId());

           // Assert
           $this->assertEquals($test_client_one, $result);
       }
       //
    //    function test_updateClient()
    //    {
    //        // Arrange
    //        $client_name_one = 'Dave';
    //        $stylist_id = 1;
    //        $test_client_one = new Client ($client_name_one, $stylist_id);
    //        $test_client_one->save();
    //        $property = "client_name";
    //        $update_value = "Marge";
    //        $result = $test_client_one->updateClient($property, $update_value);
    //        // Act
    //        $result = Client::getAll();
    //        $expected_result = new Client($update_value, $stylist_id);
    //        // Assert
    //        $this->assertEquals($expected_result, $result);
    //    }
       //
    //    function test_deleteClient()
    //    {
    //        // Arrange
    //        $client_name_one = 'Dave';
    //        $stylist_id = 1;
    //        $test_client_one = new Client ($client_name_one, $stylist_id);
    //        $test_client_one->save();
    //        $client_name_two = 'Frank';
    //        $stylist_id = 2;
    //        $test_client_two = new Client ($client_name_two, $stylist_id);
    //        $test_client_two->save();
    //        // Act
    //        $test_client_two->deleteClient();
    //        $result = Client::getAll();
    //        $expected_result = array($test_client_one);
       //
    //        // Assert
    //        $this->assertEquals($result, $expected_result);
    //    }



}

?>
