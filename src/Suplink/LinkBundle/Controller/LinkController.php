<?php

namespace Suplink\LinkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

Use Suplink\UserBundle\Entity\User;
Use Suplink\LinkBundle\Entity\link;
use Suplink\LinkBundle\Form\LinkType;

/**
 * Link controller.
 *
 */
class LinkController extends Controller
{
    /**
     * Lists all Link entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SuplinkLinkBundle:Link')->findAll();

        return $this->render('SuplinkLinkBundle:Link:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Link entity.
     *
     */
    public function showAction($id)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SuplinkLinkBundle:Link')->find($id);
        $query = $em->createQueryBuilder();
        $query-> select('count(stats.id)');
        $query->from('SuplinkLinkBundle:Stats','stats');
        $query->where('stats.link = :total');
        $query->setParameter('total', $id);
        $number = $query->getQuery()->getSingleScalarResult();
        $entity->statistic = $number;

        $week = $em->createQueryBuilder();
        $week-> select('count(stats.id)');
        $week->from('SuplinkLinkBundle:Stats','stats');
        $week->where('stats.link = :total');
        $week->setParameter('total', $id);
        $weeknumber = $query->getQuery()->getSingleScalarResult();
        $entity->week = $weeknumber;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SuplinkLinkBundle:Link:show.html.twig', array(
            'user' => $user,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Link entity.
     *
     */
    public function newAction()
    {
        $entity = new Link();
        $form   = $this->createForm(new LinkType(), $entity);

        return $this->render('SuplinkLinkBundle:Link:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Link entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Link();
        $form = $this->createForm(new LinkType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $currentUser = $this->get('security.context')->getToken()->getUser();
            $entity->setUser($currentUser);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('suplink_link_dashboardpage'));
        }

        return $this->render('SuplinkLinkBundle:Link:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Link entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SuplinkLinkBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        $editForm = $this->createForm(new LinkType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SuplinkLinkBundle:Link:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Link entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SuplinkLinkBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LinkType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('suplink_link_dashboardpage'));
        }

        return $this->render('SuplinkLinkBundle:Link:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Link entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SuplinkLinkBundle:Link')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Link entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('suplink_link_dashboardpage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
