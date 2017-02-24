<?php
    class Stylists
    {
        private $stylist_name;
        private $id;

        function __construct($stylist_name, $id=null)
        {
            $this->stylist_name = $stylist_name;
            $this->id = $id;
        }
        function setStylistName($new_stylist_name)
        {
          $this->stylist_name = (string) $new_stylist_name;
        }
        function getStylistName()
        {
          return $this->stylist_name;
        }

        function getId()
        {
          return $this->id;
        }

    }
?>
