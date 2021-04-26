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
        // sections for menuhaut
        $sections = $this->getDoctrine()
            ->getRepository(Section::class)
            ->findAll();

        // messages for content
        $messages = $this->getDoctrine()
            ->getRepository(Message::class)
            ->findBy([], ['idmessage' => 'desc']);

        return $this->render('home/index.html.twig', [
            'sectionsMenuHaut' => $sections,
            'messages' => $messages,
        ]);
    }
}
