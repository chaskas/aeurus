<?php

namespace Aeurus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aeurus\AdminBundle\Entity\ThemeQuestion;
use Aeurus\AdminBundle\Form\ThemeQuestionType;

/**
 * ThemeQuestion controller.
 *
 * @Route("/themequestion")
 */
class ThemeQuestionController extends Controller
{
    /**
     * Lists all ThemeQuestion entities.
     *
     * @Route("/", name="themequestion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new ThemeQuestion entity.
     *
     * @Route("/", name="themequestion_create")
     * @Method("POST")
     * @Template("AeurusAdminBundle:ThemeQuestion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ThemeQuestion();
        $form = $this->createForm(new ThemeQuestionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('themequestion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ThemeQuestion entity.
     *
     * @Route("/new", name="themequestion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ThemeQuestion();
        $form   = $this->createForm(new ThemeQuestionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ThemeQuestion entity.
     *
     * @Route("/{id}", name="themequestion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeQuestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ThemeQuestion entity.
     *
     * @Route("/{id}/edit", name="themequestion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeQuestion entity.');
        }

        $editForm = $this->createForm(new ThemeQuestionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ThemeQuestion entity.
     *
     * @Route("/{id}", name="themequestion_update")
     * @Method("PUT")
     * @Template("AeurusAdminBundle:ThemeQuestion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeQuestion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ThemeQuestionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('themequestion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ThemeQuestion entity.
     *
     * @Route("/{id}", name="themequestion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AeurusAdminBundle:ThemeQuestion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ThemeQuestion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('themequestion'));
    }

    /**
     * Creates a form to delete a ThemeQuestion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
