<?php

namespace Suplink\LinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatsController extends Controller
{
    public function indexAction()
    {
        return $this->generateUrl('');
    }
}
