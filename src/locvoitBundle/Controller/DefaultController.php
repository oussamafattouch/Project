<?php

namespace locvoitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('locvoitBundle:Default:index.html.twig');
    }
}
