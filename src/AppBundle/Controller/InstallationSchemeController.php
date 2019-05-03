<?php

namespace AppBundle\Controller;

use AppBundle\Repository\InstallationSchemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class InstallationSchemeController extends Controller
{
    /**
     * @var InstallationSchemeRepository
     */
    private $installationSchemeRepository;

    /**
     * InstallationSchemeController constructor.
     * @param InstallationSchemeRepository $installationSchemeRepository
     */
    public function __construct(InstallationSchemeRepository $installationSchemeRepository)
    {
        $this->installationSchemeRepository = $installationSchemeRepository;
    }

    /**
     * @Route("/installation-scheme")
     */
    public function list()
    {
        $schemes = $this->installationSchemeRepository->getList();

        return $this->json(['schemes' => $schemes]);
    }

    /**
     * @Route("/installation-scheme/{id}/{status}/change-status")
     */
    public function changeStatus($id, $status)
    {
        $scheme = $this->installationSchemeRepository->getScheme($id);
        if ($scheme === null) {
            throw new NotFoundException('Scheme not found');
        }

        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->installationSchemeRepository->changeStatus($id, $status);

        return new RedirectResponse('/installation-scheme');
    }

}