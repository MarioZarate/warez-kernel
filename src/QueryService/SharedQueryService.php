<?php


namespace App\QueryService;


use App\Entity\Shared\Actor;


class SharedQueryService
{
    private $em;

    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }

    public function fetchOneById(string $id)
    {
        return $this->em->getRepository(Actor::class)->fetchOneById($id);
    }
}
