<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Entity\Section;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // sections to menuhaut
        $sections = $this->getDoctrine()
            ->getRepository(Section::class)
            ->findAll();

        // messages to content
        $messages = $this->getDoctrine()
            ->getRepository(Message::class)
            ->findBy([], ['idmessage' => 'desc']);

        // Twig's view
        return $this->render('home/index.html.twig', [
            'sectionsMenuHaut' => $sections,
            'messages' => $messages,
        ]);
    }

    /**
     * @Route("/section/{slug}", name="section")
     */
    public function section(string $slug): Response
    {
        // sections to menuhaut
        $sections = $this->getDoctrine()
            ->getRepository(Section::class)
            ->findAll();

        // section to page
        $section = $this->getDoctrine()
            ->getRepository(Section::class)
            ->findOneBy(["sectionslug" => $slug]);


        // Twig's view
        return $this->render('home/section.html.twig', [
            'sectionsMenuHaut' => $sections,
            'section' => $section,
            //'messages' => $messages,
        ]);
    }
}
