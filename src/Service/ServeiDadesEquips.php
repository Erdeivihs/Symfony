<?php
namespace App\Service;
    class ServeiDadesEquips
    {
        private $equips = array(
            array("img" => "Roig.png", "codi" => "1", "nom" => "Equip Roig", "cicle" =>"DAW",
            "curs" =>"22/23", "img" => "Roig.png" ,"membres" =>
                array("Elena","Vicent","Joan","Maria")),
            array("img" => "blue.png", "codi" => "2", "nom" => "Equip Blau", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
                    array("Maria","Fernando","Jaun","Alejandro")),
            array("img" => "green.png", "codi" => "3", "nom" => "Equip Verd", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
                    array("Laura","Sara","David","Marc")),
            array("img" => "black.gif", "codi" => "4", "nom" => "Equip Negre", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
                    array("Manolo","Eric","Alex","Vero")),
        );
        public function get()
        {
            return $this->equips;
        }
    }
?>