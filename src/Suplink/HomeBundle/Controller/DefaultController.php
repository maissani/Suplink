<?php

namespace Suplink\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		if ($this->get('security.context')->isGranted('ROLE_USER')) {
			$user = $this->get('security.context')->getToken()->getUser();
			return $this->render('SuplinkHomeBundle:Default:index.html.twig',array(
				'user' => $user,
				));	
		}
		return $this->render('SuplinkHomeBundle:Default:index.html.twig');
	}

	public function aboutAction()
	{
		$firstname = "Mehdi";
		$lastname = "Aïssani";
		$idnumber = 151929;
		return $this->render('SuplinkHomeBundle:Default:about.html.twig',array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'idnumber' => $idnumber,
			));
	}
}
