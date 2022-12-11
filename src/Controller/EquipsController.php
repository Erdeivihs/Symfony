<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Equip;
use Doctrine\Persistence\ManagerRegistry;
class EquipsController extends AbstractController
{

        #[Route('/equip/nota/{nota}', name:'filtrar_nota')]
        public function nota($nota, ManagerRegistry $doctrine)
        {
            $repositori = $doctrine->getRepository(Equip::class);
            $equips = $repositori->findAll();
            $a = array();

            foreach ($equips as $equip) {
                if ($equip->getNota() >= $nota) {
                    array_push($a, $equip);
                }
            }

            arsort($a);
            if ($a)
                return $this->render('inici.html.twig',
                array('equips' => $a));
            else
                return $this->render('dades_equip.html.twig',
                array('equip' => NULL));
        }

        #[Route('/equip/inserirmultiple', name:'inserir_multiple')]
        public function insersions(ManagerRegistry $doctrine)
        {
            $entityManager = $doctrine->getManager();
            $equip = new Equip();
            $equip1 = new Equip();
            $equip2 = new Equip();
            $equip->setNom("Calabaza");
            $equip->setCicle("DAW");
            $equip->setCurs("22/23");
            $equip->setNota("6");
            $equip->setImatge("equipPerDefecte.png");
            $entityManager->persist($equip);
            $equip1->setNom("Pepino");
            $equip1->setCicle("DAW");
            $equip1->setCurs("22/23");
            $equip1->setNota("2");
            $equip1->setImatge("equipPerDefecte.png");
            $entityManager->persist($equip1);
            $equip2->setNom("Jaumet");
            $equip2->setCicle("DAW");
            $equip2->setCurs("22/23");
            $equip2->setNota("5");
            $equip2->setImatge("equipPerDefecte.png");
            $entityManager->persist($equip2);

            $equips = array($equip,$equip1,$equip2);

            try {
                $entityManager->flush();
                return $this->render('inserir_equip_multiple.html.twig',
                        array('equips' => $equips, 'error' => NULL));
            } catch (\Exception $e) {
                    return $this->render('inserir_equip_multiple.html.twig',
                    array('equips' => $equips, 'error' => $e));
            }  
        }

        #[Route('/equip/inserir', name:'inserir')]
        public function inserir(ManagerRegistry $doctrine)
        {
            $entityManager = $doctrine->getManager();
            $equip = new Equip();
            $equip->setNom("Simarrets");
            $equip->setCicle("DAW");
            $equip->setCurs("22/23");
            $equip->setNota("9");
            $equip->setImatge("equipPerDefecte.png");
            $entityManager->persist($equip);
            try {
                $entityManager->flush();
                return $this->render('inserir_equip.html.twig',
                        array('equip' => $equip, 'error' => NULL));
            } catch (\Exception $e) {
                    return $this->render('inserir_equip.html.twig',
                    array('equip' => $equip, 'error' => $e));
            }            
        }

        #[Route('/equip/{id}' ,name:'dades_equips')]
                public function equip($id, ManagerRegistry $doctrine)
                {
                    $repositori = $doctrine->getRepository(Equip::class);
                    $equip = $repositori->find($id);
                    if ($equip)
                    return $this->render('dades_equip.html.twig',
                    array('equip' => $equip));
                    else
                    return $this->render('dades_equip.html.twig',
                    array('equip' => NULL));
                }

        }
?>