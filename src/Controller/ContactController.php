<?php


namespace App\Controller;



use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        return $this->render('contact/contact.html.twig');
    }

    public function form (Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message('[Site] Contact'))
                ->setFrom('admin@site.com')
                ->setTo('test@gmail.com')
                ->setBody('Nom : ' . $contact->getName());
            $mailer->send($message);
            $this->addFlash('success', 'Message envoyé');
            return $this->redirectToRoute('home');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}