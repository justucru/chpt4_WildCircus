<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $email = (new Email())
                ->from($contactFormData['from'])
                ->to('admin@wildcircus.com')
                ->subject('Someone sent a message via wild-circus.com')
                ->html($contactFormData['message'], 'text/plain');

            $mailer->send($email);
            $this->addFlash('success', 'Your message was sent!');
            return $this->redirectToRoute('contact');
        }

        return $this->render('home/contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
