<?php

namespace Melnikoved\PopplerBundle\Exception;

/**
 * Exception to be thrown when a file was not found
 */
class FileNotFound extends \RuntimeException
{
    public function __construct($filename)
    {
        parent::__construct(
            sprintf('The file "%s" was not found.', $filename)
        );
    }
}
