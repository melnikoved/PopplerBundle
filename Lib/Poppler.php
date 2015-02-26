<?php

namespace Melnikoved\PopplerBundle\Lib;

use Melnikoved\PopplerBundle\Lib\Utils\Pdfunite;

class Poppler {
    /**
     * @var Pdfunite
     */
    private $pdfunite;

    function __construct(Pdfunite $pdfunite)
    {
        $this->pdfunite = $pdfunite;
    }

    public function merge($inputFileNamesArray, $outputFileName){
        $this->pdfunite->execute($inputFileNamesArray, $outputFileName);
    }
}