<?php
    class Stylists
    {
        private $stylist_name;
        private $client_id;
        private $id;

        function __construct($stylist_name, $client_id, $id=null)
        {
            $this->stylist_name = $stylist_name;
            $this->client_id = $client_id;
            $this->id = $id;
        }
        function setCuisineName($new_stylist_name)
        {
          $this->stylist_name = (string) $new_stylist_name;
        }
        function getStylistName()
        {
          return $this->stylist_name;
        }

        function getClientId()
        {
          return $this->client_id;
        }
        function getId()
        {
          return $this->id;
        }

    }
?>
