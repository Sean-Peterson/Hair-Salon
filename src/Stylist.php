<?php
    class Stylist
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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->stylist_name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist)
            {
                $new_stylist = new Stylist($stylist['stylist_name'], $stylist['id']);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function findStylist($id)
        {
            $find_stylist = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = {$id};");
            $found_stylist = null;
            foreach($find_stylist as $stylist)
            {
                $found_stylist = new Stylist($stylist['stylist_name'], $stylist['id']);
            }
            return $found_stylist;
        }


    }
?>
