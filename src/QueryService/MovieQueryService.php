<?php


namespace App\QueryService;


use App\Entity\Movie\Movie;
use App\Service\EntityManagerService;

class MovieQueryService
{
    /**
     * @var EntityManagerService
     */
    private $em;

    /**
     * MovieQueryService constructor.
     */
    /*public function __construct(EntityManagerService $entityManagerService)
    {
        $this->em = $entityManagerService->getMovie();
    }

    public function fetchOneById(string $id)
    {
        // $em = (new EntityManagerService())->getMovie();
        return $this->em->getRepository(Movie::class)->fetchOneById($id);
    }*/

    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }

    public function fetchOneById(string $id)
    {
        return $this->em->getRepository(Movie::class)->fetchOneById($id);
    }
}
