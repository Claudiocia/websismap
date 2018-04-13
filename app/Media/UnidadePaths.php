<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 10/04/2018
 * Time: 08:35
 */

namespace WebSisMap\Media;


trait UnidadePaths
{
    use FotoStorages;

    public function getThumbFolderStorageAttribute()
    {
        return "unidades/{$this->id}";
    }

    public function getThumbRelativeAttribute()
    {
        return "{$this->thumb_folder_storage}/{$this->foto}";
    }

    public function getThumbPathAttribute(){
        return $this->getAbsolutePath($this->getStorage(), $this->thumb_relative);
    }

    public function getThumbSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->foto);
        return "{$this->thumb_folder_storage}/{$name}_small.{$extension}";
    }

    public function getThumbSmallPathAttribute(){
        return $this->getAbsolutePath($this->getStorage(), $this->thumb_small_relative);
    }

    public function getThumbAssetAttribute()
    {
        return route('admin.unidades.thumb_asset', ['unidade' => $this->id]);
    }

    public function getThumbSmallAssetAttribute()
    {
        return route('admin.unidades.thumb_small_asset', ['unidade' => $this->id]);
    }

}