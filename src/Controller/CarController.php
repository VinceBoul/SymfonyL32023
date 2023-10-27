<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/', name: 'app_car_index', methods: ['GET'])]
    public function index(Request $request, CarRepository $carRepository, MarqueRepository $marqueRepository): Response
    {
        $kMin = $request->query->get('kMin');
        $kMax = $request->query->get('kMax');
        $priceOrder = $request->query->get('price');
        $marqueId = $request->query->get('marque');

        $cars = $carRepository->filterCars($kMin, $kMax, $priceOrder, null, $marqueId);

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'kMax' => $kMax,
            'kMin' => $kMin,
            'priceOrder' => $priceOrder,
            'brands' => $marqueRepository->findAll()
        ]);
    }

    #[Route('/new', name: 'app_car_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car/new.html.twig', [
            'car' => $car,
            'formCar' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/quantity/{var}', name: 'app_car_quantity', methods: ['GET'])]
    public function quantity(Request $request, Car $car, $var, EntityManagerInterface $entityManager): Response
    {
        if ($var === 'plus'){
            $car->setQuantity($car->getQuantity()+1);
        }else{
            $car->setQuantity($car->getQuantity()-1);
        }
        $entityManager->flush();

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/quantity-sub', name: 'app_car_quantity_sub', methods: ['GET'])]
    public function quantitySub(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        $car->setQuantity($car->getQuantity()-1);
        $entityManager->flush();

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}', name: 'app_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }
}
