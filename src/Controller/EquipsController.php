<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class EquipsController extends AbstractController
{
private $equips = array(
    array("codi" => "1", "nom" => "Equip Roig", "cicle" =>"DAW",
    "curs" =>"22/23", "img" => "Roig.png" ,"membres" =>
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

        #[Route('/equip/{codi}' ,name:'dades_equips')]
            public function fitxa($codi = 1){
                $resultat = array_filter($this->equips,
                function($equip) use ($codi){
                    return $equip["codi"] == $codi;
                });
                if (count($resultat) > 0)
                    return $this->render('dades_equip.html.twig',
                    array('equip' => array_shift($resultat)));
                else
                    return $this->render('dades_equip.html.twig',
                    array('equip' => NULL));
            }

        }
?>