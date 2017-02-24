<?php
    class Client
    {
        private $client_name;
        private $stylist_id;
        private $id;

        function __construct($client_name, $stylist_id, $id=null)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }
        function setClientName($new_client_name)
        {
          $this->client_name = (string) $new_client_name;
        }
        function getClientName()
        {
          return $this->client_name;
        }
        function getStylistId()
        {
          return $this->stylist_id;
        }

        function getId()
        {
          return $this->id;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->client_name}', {$this->stylist_id});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client)
            {
                $new_client = new Client($client['client_name'], $client['stylist_id'], $client['id']);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function findClient($id)
        {
            $find_client = $GLOBALS['DB']->query("SELECT * FROM clients WHERE id = {$id};");
            $found_client = null;
            foreach($find_client as $client)
            {
                $found_client = new Client($client['client_name'], $client['stylist_id'], $client['id']);
            }
            return $found_client;
        }

        function updateClient($property, $update_value)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET {$property} = '{$update_value}' WHERE id = {$this->getId()};");
            $this->$property = $update_value;
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()}");
        }


    }
?>
