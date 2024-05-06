<?php 

namespace TynChristian\Belajar\PHP\MVC\Middleware;

interface Middleware
{
    function before(): void;
}