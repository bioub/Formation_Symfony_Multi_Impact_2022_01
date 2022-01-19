<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashesExtension extends AbstractExtension
{
    public function __construct(protected FlashBagInterface $flashBag) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('showFlashes', [$this, 'showFlashes'], ['is_safe' => ['html']]),
        ];
    }

    public function showFlashes($type)
    {
        $html = "";

        foreach ($this->flashBag->get($type) as $msg) {
            $html .= "<p>$msg</p>";
        }

        return $html;
    }
}
