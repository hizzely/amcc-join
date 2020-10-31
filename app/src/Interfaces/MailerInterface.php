<?php

namespace App\Interfaces;

interface MailerInterface
{
    public function from(string $email) : self;
    public function to(string $value) : self;
    public function subject(string $value) : self;
    public function text(string $value) : self;
    public function html(string $value) : self;
    public function send();
}