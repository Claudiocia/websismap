<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 10/04/2018
 * Time: 08:26
 */

namespace WebSisMap\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait FotoStorages
{
    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage(){
        return \Storage::disk($this->getDiskDriver());

    }

    protected function getDiskDriver(){
        return config('filesystems.default');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath){
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }

}