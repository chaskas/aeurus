<?php

namespace Aeurus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aeurus\AdminBundle\Entity\ThemeComment;
use Aeurus\AdminBundle\Form\ThemeCommentType;

/**
 * ThemeComment controller.
 *
 * @Route("/themecoment")
 */
class ThemeCommentController extends Controller
{
    /**
     * Lists all ThemeComment entities.
     *
     * @Route("/", name="admin_themecoment")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AeurusAdminBundle:ThemeComment')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new ThemeComment entity.
     *
     * @Route("/", name="admin_themecoment_create")
     * @Method("POST")
     * @Template("AeurusAdminBundle:ThemeComment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ThemeComment();
        $form = $this->createForm(new ThemeCommentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_themecoment_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ThemeComment entity.
     *
     * @Route("/new", name="admin_themecoment_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ThemeComment();
        $form   = $this->createForm(new ThemeCommentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ThemeComment entity.
     *
     * @Route("/{id}", name="admin_themecoment_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeComment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ThemeComment entity.
     *
     * @Route("/{id}/edit", name="admin_themecoment_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeComment entity.');
        }

        $editForm = $this->createForm(new ThemeCommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ThemeComment entity.
     *
     * @Route("/{id}", name="admin_themecoment_update")
     * @Method("PUT")
     * @Template("AeurusAdminBundle:ThemeComment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AeurusAdminBundle:ThemeComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ThemeComment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ThemeCommentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_themecoment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ThemeComment entity.
     *
     * @Route("/{id}", name="admin_themecoment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AeurusAdminBundle:ThemeComment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ThemeComment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_themecoment'));
    }

    /**
     * Creates a form to delete a ThemeComment entity by id.
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
