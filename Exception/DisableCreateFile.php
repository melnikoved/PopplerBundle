<?php

namespace Melnikoved\PopplerBundle\Exception;

/**
 * Exception to be thrown when a file was not found
 */
class DisableCreateFile extends \RuntimeException
{
    public function __construct($filename, $comment = '')
    {
        parent::__construct(
            sprintf('The file "%s" can`t be created. ' . $comment, $filename)
        );
    }
}
