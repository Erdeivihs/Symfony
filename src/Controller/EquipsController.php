<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ServeiDadesEquips;
class EquipsController extends AbstractController
{

        private $equips;
        public function __construct(ServeiDadesEquips $dades)
        {
            $this->equips = $dades->get();
        }

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