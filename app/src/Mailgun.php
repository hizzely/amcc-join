<?php

namespace App;

use App\Interfaces\MailerInterface;
use Psr\Container\ContainerInterface;

class Mailgun implements MailerInterface
{
    protected $transporter;

    protected $domain;

    protected $data = [];

    public function __construct(ContainerInterface $ci)
    {
        $this->domain = getenv('MAILGUN_DOMAIN');

        $this->transporter = $ci->get('mailgun');
    }

    public function from(string $email, string $name = null) : self
    {
        $this->data['from'] = $email;

        return $this;
    }

    public function to(string $value) : self
    {
        $this->data['to'] = $value;

        return $this;
    }

    public function subject(string $value) : self
    {
        $this->data['subject'] = $value;

        return $this;
    }

    public function text(string $value) : self
    {
        $this->data['text'] = $value;

        return $this;
    }

    public function html(string $value) : self
    {
        $this->data['html'] = $value;

        return $this;
    }

    public function send()
    {
        $this->transporter->messages()->send($this->domain, $this->data);
    }
}