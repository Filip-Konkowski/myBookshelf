<?php

namespace BookshelfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BookController extends Controller
{
    /**
     * @Route("/name")
     * @Template()
     */
    public function nameAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/raiting")
     * @Template()
     */
    public function raitingAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/description")
     * @Template()
     */
    public function descriptionAction()
    {
        return array(
                // ...
            );    }

}
