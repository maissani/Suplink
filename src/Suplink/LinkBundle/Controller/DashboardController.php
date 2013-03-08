<?php

namespace Suplink\LinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Suplink\LinkBundle\Entity\Link;
use Suplink\LinkBundle\Entity\Stats;

class DashboardController extends Controller
{
    public function indexAction()
    {
		if ($this->get('security.context')->isGranted('ROLE_USER')) {

			$user = $this->get('security.context')->getToken()->getUser();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('SuplinkLinkBundle:Link')->findBy(array('user' => $user));
            foreach($entities as $obj){
                $total =  $obj->getId();
                $query = $em->createQueryBuilder();
                $query-> select('count(stats.id)');
                $query->from('SuplinkLinkBundle:Stats','stats');
                $query->where('stats.link = :total');
                $query->setParameter('total', $total);
                $number = $query->getQuery()->getSingleScalarResult();
                $obj->statistic = $number;
            }
			return $this->render('SuplinkLinkBundle:Dashboard:index.html.twig',array(
				'user' => $user,
                'entities' => $entities,
				));

		}
		return $this->redirect($this->generateUrl('fos_user_security'));
    }
}
