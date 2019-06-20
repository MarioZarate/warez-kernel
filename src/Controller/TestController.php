<?php


namespace App\Controller;



use App\QueryService\MovieQueryService;
use App\QueryService\SharedQueryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TestController
{
    /**
     * @var SharedQueryService
     */
    private $sharedQueryService;
    /**
     * @var MovieQueryService
     */
    private $movieQueryService;

    /**
     * TestController constructor.
     */
    public function __construct(SharedQueryService $sharedQueryService, MovieQueryService $movieQueryService)
    {
        $this->sharedQueryService = $sharedQueryService;
        $this->movieQueryService = $movieQueryService;
    }


    /**
     * @Route(methods={"GET"}, path="/", name="index")
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $actor = $this->sharedQueryService->fetchOneById(10);
        var_dump($actor);
        $movie = $this->movieQueryService->fetchOneById(10);
        var_dump($movie);
        exit();
    }
}
