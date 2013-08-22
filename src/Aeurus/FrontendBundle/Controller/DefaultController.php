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

        $themes = $em->getRepository('AeurusAdminBundle:Theme')->findAll();

        $tags = $em->getRepository('AeurusAdminBundle:Tag')->findAll();

        return array(
            'themes' => $themes,
            'tags'   => $tags,
        );
    }
}
