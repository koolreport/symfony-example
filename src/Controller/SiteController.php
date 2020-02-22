<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SiteController extends AbstractController
{
    /**
    * @Route("/site/report")
    */
    public function report()
    {
        $report =  new \App\Reports\MyReport;
        return new Response($report->run()->render());
    }

    /**
    * @Route("/site/reportwithtemplate")
    */
    public function template()
    {
        $report =  new \App\Reports\MyReport;
        return $this->render('report.html.twig', [
            'myreport' =>$report->run()->render(true)
        ]);
    }

}