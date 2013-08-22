<?php

namespace Aeurus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    		$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AeurusAdminBundle:Theme')->findAll();

        return array(
            'entities' => $entities,
        );
    }
}
