<?php

namespace App\Twig;

use App\Repository\SocieteRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MenuExtension extends AbstractExtension
{
    public function __construct(protected SocieteRepository $repository, protected UrlGeneratorInterface $urlGenerator)
    {
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('showLinksSocieteNotEmpty', [$this, 'showLinksSocieteNotEmpty'],  ['is_safe' => ['html']]),
        ];
    }

    public function showLinksSocieteNotEmpty()
    {
        $html = '';
        $societes = $this->repository->findAllWithAtLeast1Contact();

        foreach ($societes as $s) {
            $html .= '<a href="' . $this->urlGenerator->generate('societe_show', ['id' => $s->getId()]) .  '">' . htmlspecialchars($s->getNom()) . '</a> ';
        }

        return $html;
    }
}
