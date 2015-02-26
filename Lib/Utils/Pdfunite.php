<?php

namespace Melnikoved\PopplerBundle\Lib\Utils;

use InvalidArgumentException;
use Melnikoved\PopplerBundle\Exception\DisableCreateFile;
use Melnikoved\PopplerBundle\Exception\FileNotFound;
use Symfony\Component\Process\Process;

class Pdfunite {

    private $command;

    function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * @param $inputFileNamesArray array
     * @param $outputFileName string
     */
    public function execute( $inputFileNamesArray, $outputFileName){

        $this->validateInputFileNamesArray($inputFileNamesArray);

        $this->validateOutputFileName($outputFileName);

        $this->process($inputFileNamesArray, $outputFileName);

    }

    private function validateInputFileNamesArray($inputFileNamesArray){
        if(!is_array($inputFileNamesArray)){
            throw new InvalidArgumentException('does not match with array value');
        }

        if(!count($inputFileNamesArray)){
            throw new InvalidArgumentException('It`s required at least two files to merge');
        }

        foreach ($inputFileNamesArray as $inputFileName) {
            if(!file_exists($inputFileName)){
                throw new FileNotFound($inputFileName);
            }
        }
    }

    private function validateOutputFileName($outputFileName){
        if(file_exists($outputFileName)){
            if(!is_writable($outputFileName)){
                throw new DisableCreateFile($outputFileName, 'File exists, but is disable to write');
            }
        }else{
            $folderPath = '';
            //todo check folder exist

            //todo check that folder is writable
        }
    }

    private function process($inputFileNamesArray, $outputFileName){
        $process = new Process($this->command . ' ' . join(' ' , $inputFileNamesArray) . ' ' . $outputFileName);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }
    }


}