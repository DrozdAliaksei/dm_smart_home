<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * UserController constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = random_int(0,100);

        //return new Response('<html><body>Lucky number: '.$number.'</body></html>');
        return $this->json(['number' => $number]);
    }
}