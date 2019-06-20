<?php


namespace App\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntityManagerService
{
    private $em;
    /**
     * EntityManagerService constructor.
     */
    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }

    public function getShared()
    {
        //return $this->getDoctrine()->getManager('shared');
        return $this->em;
    }

    /*public function getMovie()
    {
        return $this->em;
    }*/

   /* public function getSerie()
    {
        return $this->getDoctrine()->getManager('serie');
    }*/
}
