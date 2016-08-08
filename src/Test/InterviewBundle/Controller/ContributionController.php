<?php

namespace Test\InterviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContributionController extends Controller
{
    private $myservice;

    public function __construct()
    {
        $this->myservice = $this->get('BiosService');
    }
    /**
     * @Route("/contributions")
     */
    public function contributionsAction()
    {
        $all_contribs = $this->myservice->getAllContributions();

        $response = new JsonResponse();
        $response->setData($all_contribs);

        return $response;
    }

    /**
     * @Route("/contributions/{contributionName}")
     */
    public function biosByContributionAction($contributionName)
    {
        $all_bios_by_contrib = $this->myservice->getAllBiosByContribution($contributionName);

        $response = new JsonResponse();
        $response->setData($all_bios_by_contrib);

        return $response;
    }
}
