<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CitasRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class CitasController extends AbstractController
{
    #[Route('/citas', name: 'citas_list')]
    public function list(CitasRepository $citasRepository, Request $request): Response
    {
        
        $citas = $citasRepository->findAll();

        // Preparando los datos para ser devueltos en formato JSON
        $citasArray = [];
        foreach ($citas as $cita) {
            $citasArray[] = [
                'id' => $cita->getId(),
                'id_cita' => $cita->getIdCita(),
                'dni' => $cita->getDni()->getDni(), 
                'usuario' => $cita->getDni()->getNombre(),
                'id_tratamiento' => $cita->getIdTratamiento()->getNombreTratamiento(),
                'fecha' => $cita->getFecha()->format('Y-m-d'),
                'pagado' => $cita->isPagado(),
                'activo' => $cita->isActivo(),
            ];
        }

        return new JsonResponse($citasArray);
    }
}
