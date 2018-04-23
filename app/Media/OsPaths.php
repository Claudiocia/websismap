<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 18/04/2018
 * Time: 17:59
 */

namespace WebSisMap\Media;


trait OsPaths
{
    use FotoStorages;

    public function getFotoFolderStorageAttribute()
    {
        return "ordens/{$this->id}";
    }

    public function getFotoumRelativeAttribute()
    {
        return "{$this->fotoum_folder_storage}/{$this->foto1}";
    }

    public function getFotodoisRelativeAttribute()
    {
        return "{$this->fotodois_folder_storage}/{$this->foto2}";
    }

    public function getFototresRelativeAttribute()
    {
        return "{$this->fototres_folder_storage}/{$this->foto3}";
    }

    public function getFotoumPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fotoum_relative);
    }

    public function getFotodoisPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fotodois_relative);
    }

    public function getFototresPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fototres_relative);
    }

    public function getFotoumSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->foto1);
        return "{$this->foto_folder_storage}/{$name}_small1.{$extension}";
    }

    public function getFotodoisSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->foto2);
        return "{$this->foto_folder_storage}/{$name}_small2.{$extension}";
    }

    public function getFototresSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->foto3);
        return "{$this->foto_folder_storage}/{$name}_small3.{$extension}";
    }

    public function getFotoumSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fotoum_small_relative);
    }

    public function getFotodoisSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fotodois_small_relative);
    }

    public function getFototresSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->fototres_small_relative);
    }

    public function getFotoumAssetAttribute()
    {
        return route('ordens.ordens.fotoum_asset', ['ordem' => $this->id]);
    }

    public function getFotodoisAssetAttribute()
    {
        return route('ordens.ordens.fotodois_asset', ['ordem' => $this->id]);
    }

    public function getFototresAssetAttribute()
    {
        return route('ordens.ordens.fototres_asset', ['ordem' => $this->id]);
    }

    public function getFotoumSmallAssetAttribute()
    {
        return route('ordens.ordens.fotoum_small_asset', ['ordem' => $this->id]);
    }

    public function getFotodoisSmallAssetAttribute()
    {
        return route('ordens.ordens.fotodois_small_asset', ['ordem' => $this->id]);
    }

    public function getFototresSmallAssetAttribute()
    {
        return route('ordens.ordens.fototres_small_asset', ['ordem' => $this->id]);
    }

}