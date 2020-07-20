<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Company;
use App\Entity\Country;
use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api", name="api", methods="GET")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/country", name="api_country", methods="GET")
     * @return JsonResponse
     */
    public function CountryAjax(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository(Country::class)->allCountry();

        return new JsonResponse($country);
    }

    /**
     * @Route("/region", name="api_region", methods={"GET", "POST"})
     * @return JsonResponse
     */
    public function RegionsAjax(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $country = [];
        if($countryJSON = $request->getContent()){
            $country = json_decode($countryJSON, true);
        };
        $regions = $em->getRepository(Region::class)->RegionsCountry($country['country']);
        return new JsonResponse($regions);
    }

    /**
     * @Route("/region/company", name="api_region_company", methods={"GET", "POST"})
     * @return JsonResponse
     */
    public function RegionCompanyAjax(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $region = [];
        if($regionJSON = $request->getContent()){
            $region = json_decode($regionJSON, true);
        };
        $companies = $em->getRepository(Company::class)->CompaniesRegion($region['region']);
        return new JsonResponse($companies);
    }

    /**
     * @Route("/city", name="api_city", methods={"GET", "POST"})
     * @return JsonResponse
     */
    public function CitiesAjax(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $region = [];
        if($regionJSON = $request->getContent()){
            $region = json_decode($regionJSON, true);
        };
        $cites = $em->getRepository(City::class)->CitiesRegion($region['region']);
        return new JsonResponse($cites);
    }
}