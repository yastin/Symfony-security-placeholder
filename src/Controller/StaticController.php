<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class StaticController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/mailtest', name: 'mailtest')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('yastin@ukr.net')
            ->to('andrew.yastin@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!');
            //->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            dump($e);
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }
        dd('here');
        return $this->render('base.html.twig', [
            'controller_name' => 'mailtest',
        ]);
    }
}
