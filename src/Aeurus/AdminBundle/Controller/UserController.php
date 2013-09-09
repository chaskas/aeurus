<?php

namespace Aeurus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Application controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * Lists all Application entities.
     *
     * @Route("/", name="admin_user")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AeurusAdminBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/edit")
     * @Template()
     */
    public function editAction()
    {
    }

}
