<?php

namespace Suplink\LinkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Suplink\LinkBundle\Entity\Link;
use Suplink\LinkBundle\Entity\Stats;

class DefaultController extends Controller
{
    public function indexAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('SuplinkLinkBundle:Link');
        $tinylink = $repository->findOneBy(array('tinyUrl' => $slug, 'active' => true));
        if (!$tinylink) {
            throw $this->createNotFoundException('Your link is disable or does not exist please enter a valid link.');
        }
        $url = $tinylink->getoriginalUrl();

        $stats = new Stats();
        $stats->setIp($_SERVER['REMOTE_ADDR']);
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $stats->setReferer($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $stats->setReferer($this->generateUrl('suplink_home_homepage',array() ,true));
        }


        $stats->setLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $stats->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $stats->setLink($tinylink);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($stats);
        $em->flush();

        return $this->redirect('http://'.$url);

    }
}