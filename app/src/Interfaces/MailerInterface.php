<?php

namespace App\Interfaces;

interface MailerInterface
{
    function from(string $email, string $name = null) : self;
    function to(string $value) : self;
    function subject(string $value) : self;
    function text(string $value) : self;
    function html(string $value) : self;
    function send();
}