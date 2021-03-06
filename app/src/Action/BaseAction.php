<?php
namespace App\Action;

use App\Interfaces\MailerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BaseAction
{
    protected $ci;
    protected $csrf;
    protected $db;
    protected $flash;
    protected $helper;
    protected $logger;
    protected $router;
    protected $view;
    protected $mailer;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci   = $ci;
        $this->csrf   = $ci->get('csrf');
        $this->db     = $ci->get('db');
        $this->flash  = $ci->get('flash');
        $this->helper = $ci->get('helper');
        $this->logger = $ci->get('logger');
        $this->router = $ci->get('router');
        $this->view   = $ci->get('view');
        $this->mailer = $ci->get(MailerInterface::class);
    }
}
