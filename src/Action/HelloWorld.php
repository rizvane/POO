<?php

declare(strict_types=1);

namespace App\Action;

use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zend\Expressive\Template\TemplateRendererInterface;

final class HelloWorld
{
    private $renderer;

    private $userService;

    public function __construct(TemplateRendererInterface $renderer, UserService $userService)
    {
        $this->renderer = $renderer;
        $this->userService = $userService;
    }

    public function handle(Request $request): Response
    {
        $value = $request->query->get('param1');
        $this->userService->find($value);

        return new Response($this->renderer->render('helloworld.html.twig'));
    }
}
