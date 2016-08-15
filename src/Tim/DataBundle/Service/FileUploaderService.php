<?php

namespace Tim\DataBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    protected $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        mt_srand();

        // $randomString = substr(str_shuffle(md5(microtime())), 0, 10);
        $randomString = mt_rand();

        // add function to check file exists
        $fileName = sha1($randomString).'.'.$file->guessExtension();

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }

    public function remove($filename)
    {
        $file_path = $this->targetDir . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($file_path)) { unlink($file_path); }
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}