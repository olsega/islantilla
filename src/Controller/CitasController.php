<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CitasRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
// Para el formulario
use App\Form\CrearCitasType;
use App\Entity\Citas;
use Doctrine\ORM\EntityManagerInterface;


class CitasController extends AbstractController
{
    #[Route('/citas', name: 'citas_list')]
    public function list(CitasRepository $citasRepository, Request $request): Response
    {
        
        $citas = $citasRepository->findAll();

        // Preparando los datos para ser devueltos en formato JSON. Hace un JOIN con Usuarios
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

    // JOIN Citas y Tratamientos
    #[Route('/tratamiento_citas', name: 'tratamiento_citas_list')]
    public function list_tto(CitasRepository $citasRepository, Request $request): Response
    {
        
        $citas = $citasRepository->findAll();

        // Preparando los datos para ser devueltos en formato JSON. Hace un JOIN con Usuarios
        $citasArray = [];
        foreach ($citas as $cita) {
            $citasArray[] = [
                //'id' => $cita->getId(),
                'id_cita' => $cita->getIdCita(),
                'usuario' => $cita->getDni()->getNombre(),
                'id_tratamiento' => $cita->getIdTratamiento()->getNombreTratamiento(),
                'fecha' => $cita->getFecha()->format('Y-m-d'),
                'precio' => $cita->getIdTratamiento()->getPrecio(),
                'pagado' => $cita->isPagado(),
            ];
        }

        return new JsonResponse($citasArray);
    }


    // Para insertar nuevas citas mediante formulario
    #[Route('citas/new', name: 'app_citas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cita = new Citas();
        $form = $this->createForm(CrearCitasType::class, $cita);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cita);
            $entityManager->flush();

            return $this->redirectToRoute('citas_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('citas/new.html.twig', [
            'cita' => $cita,
            'form' => $form,
        ]);
    }
}
