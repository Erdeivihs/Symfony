<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class IniciController
{
private $equips = array(
    array("codi" => "1", "nom" => "Equip Roig", "cicle" =>"DAW",
    "curs" =>"22/23", "membres" =>
        array("Elena","Vicent","Joan","Maria")),
    array("codi" => "2", "nom" => "Equip Blau", "cicle" =>"DAW",
    "curs" =>"22/23", "membres" =>
            array("Maria","Fernando","Jaun","Alejandro")),
    array("codi" => "3", "nom" => "Equip Verd", "cicle" =>"DAW",
    "curs" =>"22/23", "membres" =>
            array("Laura","Sara","David","Marc")),
    array("codi" => "4", "nom" => "Equip Negre", "cicle" =>"DAW",
    "curs" =>"22/23", "membres" =>
            array("Manolo","Eric","Alex","Vero")),
);

    #[Route('/' ,name:'inici')]
        public function inici()
            {
            return new Response("Gestió d’equips del projecte de 2n de DAW");
            }

        #[Route('/equip/{codi}' ,name:'dades_equip')]
            public function dades($codi)
            {
                $resultat = array_filter($this->equips,
                function($equip) use ($codi)
                {
                    return $equip["codi"] == $codi;
                });
                if (count($resultat) > 0)
                {
                    $resposta = "";
                    $resultat = array_shift($resultat); #torna el primer element
                    $resposta .= "<ul><li>" . $resultat["nom"] . "</li>".
                    "<li>" . $resultat["membres"][0] ."</li>".
                    "<li>" . $resultat["membres"][1] ."</i>".
                    "<li>" . $resultat["membres"][2] ."</li>".
                    "<li>" . $resultat["membres"][3] ."</li>".
                    "</ul>";
                    return new Response("<html><body>$resposta</body></html>");
                }
                else
                    return new Response("No s’ha trobat l’equip: " . $codi);
            }
        }
?>