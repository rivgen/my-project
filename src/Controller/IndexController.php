<?php
namespace App\Controller;

use App\Entity\Country;
use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index_index", methods="GET")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $countryRepository = $em->getRepository(Country::class);
        $regionRepository = $em->getRepository(Region::class);
        $countries = $countryRepository -> findAll();
        $regions = $regionRepository -> findAll();

        return $this->render('index/index.html.twig',[
            'countries' => $countries,
            'regions' => $regions,
        ]);
    }
}