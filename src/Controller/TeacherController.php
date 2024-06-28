<?php

namespace App\Controller;

use App\Repository\TeacherRepository;
use Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }

    #[Route('/api/teachers', name: 'export_teachers')]
    public function exportTeachers(TeacherRepository $teacher): JsonResponse
    {
        $teachers = $teacher->getTeachers();

        return $this->json($teachers);
    }


    #[Route('/api/teacher/{teacherId}', name: 'export_teachers')]
    public function exportTeacher(TeacherRepository $teacher, $teacherId): JsonResponse
    {
        $content = $teacher->getTeacher($teacherId);
        if ($content) {
            $json = $content[0];
            return $this->json($json);
        } else {
            return $this->json(data: $content, status: 404);
            ;
        }
    }





}
