<?php

namespace App\Controller;

use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContentController extends AbstractController
{
    #[Route('/content', name: 'app_content')]
    public function index(): Response
    {
        return $this->render('content/index.html.twig', [
            'controller_name' => 'ContentController',
        ]);
    }

    #[Route('/api/content', name: 'export_content')]
    public function exportContent(ContentRepository $contentRepository): JsonResponse
    {
        $content = $contentRepository->getContent();

        $newContent = [];
        foreach ($content as $line) {
            $newContent[$line['component_name']] = $line;

        }


        return $this->json($newContent);
    }



}
