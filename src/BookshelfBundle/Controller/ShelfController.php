<?php

namespace BookshelfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BookshelfBundle\Entity\Shelf;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class ShelfController extends Controller
{
    /**
     * @Route("/show/{shelfId}")
     * @Template()
     */
    public function showAction($shelfId)
    {
        $shelf = $this->getDoctrine()->getRepository("BookshelfBundle")->find($shelfId);

        return array(
            "shelf" => $shelf
        );
    }
    /**
     * @Route("/add")
     * @Template()
     *
     */
    public function createAction(Request $request)
    {
        $shelf = new Shelf;
        $form = $this->createFormBuilder($shelf)
                    ->add("name", "text")
                    ->add("save", "submit",
                        array("label" => "create shelf"))
                    ->getForm();
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $validator = $this->get("validator");
        $errors = $validator->validate($shelf);
        if(!$form->isValid()) {
            $errorString = (string) $errors;
            return $this->render("BookshelfBundle:Shelf:add.html.twig",
                                    array("errors" => $errors,"form" => $form->createView())
            );
        }
        $em->persist($shelf);
        $em->flush();
        return $this->redirectToRoute("bookshelf_shelf_showallshelfs");
    }
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction()
    {
        $shelf = new Shelf;
        $form = $this->createFormBuilder($shelf)
            ->add("name", "text")
            ->add("save", "submit",
                array("label" => "create shelf"))
            ->getForm();
        return array(
            "form" => $form->createView()
        );
    }

    /**
     * @Route("/del/{shelfId}")
     */

    public function delAction($shelfId) {
        $bookToDel = $this->getDoctrine()->getRepository("BookshelfBundle:Shelf")->find($shelfId);
        $em = $this->getDoctrine()->getManager();
        $em->remove($bookToDel);
        $em->flush();
        return $this->redirectToRoute("bookshelf_shelf_showallshelfs");
    }

    /**
     * @Route("/showAllShelfs")
     * @Template()
     */
    public function showAllShelfsAction() {
        $allShelfs = $this->getDoctrine()->getRepository("BookshelfBundle:Shelf")->findAll();
        return array(
            "shelfs" => $allShelfs
        );
    }

}
