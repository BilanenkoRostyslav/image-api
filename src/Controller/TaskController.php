<?php

namespace App\Controller;

use App\Attribute\RequestFormDataBody;
use App\Attribute\RequestImageBody;
use App\DTO\ConvertTaskParamDTO;
use App\DTO\ImageDTO;
use App\DTO\ResizeTaskParamDTO;
use App\Enum\ImageTaskOperation;
use App\Service\Image\ImageServiceInterface;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

class TaskController extends AbstractController
{
    public function __construct(
        private readonly ImageServiceInterface $imageService,
        private readonly TaskService           $taskService,
    )
    {
    }

    /**
     * @throws ExceptionInterface
     */
    #[Route('/api/tasks/convert', name: 'convert', methods: ['POST'])]
    public function convertTask(#[RequestFormDataBody] ConvertTaskParamDTO $dto, #[RequestImageBody('image')] ImageDTO $imageDTO): JsonResponse
    {
        $url = $this->imageService->uploadImage($imageDTO);
        $result = $this->taskService->createTask(ImageTaskOperation::CONVERT, $url, $dto);

        return $this->json($result);
    }

    /**
     * @throws ExceptionInterface
     */
    #[Route('/api/tasks/resize', name: 'resize', methods: ['POST'])]
    public function resizeTask(#[RequestFormDataBody] ResizeTaskParamDTO $dto, #[RequestImageBody('image')] ImageDTO $imageDTO): JsonResponse
    {
        $url = $this->imageService->uploadImage($imageDTO);
        $result = $this->taskService->createTask(ImageTaskOperation::RESIZE, $url, $dto);

        return $this->json($result);
    }
}