<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Repository\ScheduleRepository;
use DateInterval;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{

    #[Route('/', name: 'app_index')]
    public function index(ScheduleRepository $scheduleRepository): Response
    {
        $today = new DateTime();
        $tomorrow = new DateTime();
        $tomorrow->add(new DateInterval("P1D"));
        $period = $scheduleRepository->findAllByPeriod($today, $tomorrow);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'schedules' => $period
        ]);
    }
}
