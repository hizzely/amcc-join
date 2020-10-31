<?php

namespace App;

use App\Interfaces\MailerInterface;
use Psr\Container\ContainerInterface;

class PhpMailer implements MailerInterface
{
    protected $transporter;

    protected $data = [];

    public function __construct(ContainerInterface $ci)
    {
        $this->transporter = $ci->get('phpmailer');
    }

    public function from(string $email) : self
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
        $this->transporter->setFrom($this->data['from']);
        
        $this->transporter->addAddress($this->data['to']);

        $this->transporter->Subject = $this->data['subject'];
        
        if ($this->data['html']) {
            $this->transporter->Body = $this->data['html'];
            $this->transporter->isHTML(true);
        } else {
            $this->transporter->Body = $this->data['text'];
            $this->transporter->AltBody = $this->data['text'];
        }

        $this->transporter->send();
    }
}