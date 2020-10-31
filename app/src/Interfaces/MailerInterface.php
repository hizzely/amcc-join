<?php

namespace App\Interfaces;

interface MailerInterface
{
    public function from(string $email);
    public function to(string $value);
    public function subject(string $value);
    public function text(string $value);
    public function html(string $value);
    public function send();
}