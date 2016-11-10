<?php
require __DIR__ . '/BaseLying.php';

class Lying extends lying\BaseLying
{
}
spl_autoload_register([Lying::class, 'autoload']);
Lying::$classes = require __DIR__ . '/classes.php';
require __DIR__ . '/functions.php';
set_exception_handler([\lying\core\Exception::class, 'exceptionHandler']);
set_error_handler([lying\core\Exception::class, 'errorHandler']);

get('233');