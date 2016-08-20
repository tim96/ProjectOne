<?php

namespace Tim\DataBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    protected $targetDir;

    protected $webDir;

    public function __construct($targetDir, $webDir)
    {
        $this->targetDir = $targetDir;
        $this->webDir = $webDir;
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

    public function getFileHash($filename)
    {
        $filePath = $this->targetDir . DIRECTORY_SEPARATOR . $filename;
        return $this->getHash($filePath);
    }

    public function getHash($filePath)
    {
        return sha1_file($filePath);
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

    public function getWebDir()
    {
        return $this->webDir;
    }

    public function getWebFilePath($filename)
    {
        return $this->webDir . '/' . $filename;
    }
}