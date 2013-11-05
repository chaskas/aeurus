<?php

namespace Aeurus\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Aeurus\AdminBundle\Entity\Application;
use Aeurus\AdminBundle\Form\ApplicationType;

use Aeurus\AdminBundle\Entity\ThemeQuestion;
use Aeurus\AdminBundle\Form\ThemeQuestionType;

use Aeurus\AdminBundle\Entity\Receiver;
use Aeurus\AdminBundle\Form\ReceiverType;

class DefaultController extends Controller
{

    /**
     * Displays a form to create a new Application entity.
     *
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $entity = new Application();
        $form   = $this->createForm(new ApplicationType(), $entity);

        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AeurusAdminBundle:Tag')->findAll();

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'tags'   => $tags,
        );
    }

    /**
     * Creates a new Application entity.
     *
     * @Route("/order/create", name="order_step_1")
     * @Method("POST")
     * @Template("AeurusFrontendBundle:Application:index.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Application();
        $entity->setUser($this->get('security.context')->getToken()->getUser());
        $form = $this->createForm(new ApplicationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Has creado una nueva orden!"
            );

            return $this->redirect($this->generateUrl('order_step_2', array('id' => $entity->getId())));
        } else {

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Ocurrió un problema."
            );

        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Application entity.
     *
     * @Route("/order/{id}", name="order_step_2")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Lists all Application entities.
     *
     * @Route("/orders", name="orders")
     * @Method("GET")
     * @Template()
     */
    public function ordersAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AeurusAdminBundle:Application')->findByUser($this->get('security.context')->getToken()->getUser());

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Lists all comments entities on an theme application.
     *
     * @Route("/order/{id}/theme/{theme_id}", name="application_theme_comments")
     * @Method("GET")
     * @Template()
     */
    public function order_theme_commentsAction($theme_id,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $theme = $em->getRepository('AeurusAdminBundle:Theme')->find($theme_id);

        $question = new ThemeQuestion();

        $form   = $this->createForm(new ThemeQuestionType(), $question);

        $questions = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->findBy(array('application' => $id, 'theme' => $theme_id));

        $receivers = $em->getRepository('AeurusAdminBundle:Receiver')->findBy(array('application' => $id, 'theme' => $theme_id));

        $receiver = new Receiver();
        $receiverForm = $this->createForm(new ReceiverType(), $receiver);


        return array(
            'form'   => $form->createView(),
            'theme' => $theme,
            'application' => $id,
            'questions' => $questions,
            'receivers' => $receivers,
            'receiverForm' => $receiverForm->createView()
        );
    }

    /**
     * Creates a new ThemeQuestion entity.
     *
     * @Route("/question/create/{id}/{theme_id}", name="frontend_themequestion_create")
     * @Method("POST")
     * @Template()
     */
    public function createQuestionAction(Request $request, $id, $theme_id )
    {
        $entity  = new ThemeQuestion();

        $em = $this->getDoctrine()->getManager();

        $application = $em->getRepository('AeurusAdminBundle:Application')->find($id);
        $theme = $em->getRepository('AeurusAdminBundle:Theme')->find($theme_id);

        $entity->setApplication($application);
        $entity->setTheme($theme);


        $form = $this->createForm(new ThemeQuestionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Has agregado una pregunta!"
            );

            return $this->redirect($this->generateUrl('application_theme_comments', array('id' => $id, 'theme_id' =>$theme_id)));
        } else {

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Ocurrió un problema."
            );

        }

    }

    /**
     * Creates a new Receiver entity.
     *
     * @Route("/receiver/create/{id}/{theme_id}", name="frontend_receiver_create")
     * @Method("POST")
     * @Template()
     */
    public function createReceiverAction(Request $request, $id, $theme_id )
    {
        $entity  = new Receiver();

        $em = $this->getDoctrine()->getManager();

        $application = $em->getRepository('AeurusAdminBundle:Application')->find($id);
        $theme = $em->getRepository('AeurusAdminBundle:Theme')->find($theme_id);

        $entity->setApplication($application);
        $entity->setTheme($theme);


        $form = $this->createForm(new ReceiverType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Has agregado un destinatario!"
            );

            return $this->redirect($this->generateUrl('application_theme_comments', array('id' => $id, 'theme_id' =>$theme_id)));
        } else {

            $this->get('session')->getFlashBag()->add(
                'notice',
                "Ocurrió un problema."
            );

        }

    }
}
