<?php
/**
 * Created by PhpStorm.
 * User: ClaudioSouza
 * Date: 10/04/2018
 * Time: 09:23
 */

namespace WebSisMap\Media;


use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Imagine\Image\Box;

trait ThumbUploads
{
    public function uploadThumb($id, UploadedFile $file)
    {
        $model = $this->find($id);
        $this->deleteThumbOld($model);
        $name = $this->upload($model,$file);
        if ($name){
            $model->foto = $name;
            $this->makeThumbSmall($model);
            $model->save();
        }
        return $model;
    }

    protected function makeThumbSmall($model)
    {
        $storage = $model->getStorage();
        $thumbFile = $model->thumb_path;
        $format = \Imagem::format($thumbFile);
        $thumbnailSmall = \Imagem::open($thumbFile)->thumbnail(new Box(60, 60));
        $storage->put($model->thumb_small_relative, $thumbnailSmall->get($format));
    }

    /**
     * @param $model
     * @param UploadedFile $file
     */
    public function upload($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();

        $name = md5(time() . "{$model->id}-{$file->getClientOriginalName()}") . ".{$file->guessExtension()}";

        $result = $storage->putFileAs($model->thumb_folder_storage, $file, $name);

        return $result ? $name : $result;
    }

    public function deleteThumbOld($model){
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        if ($storage->exists($model->thumb_relative)){
            $storage->delete([$model->thumb_relative, $model->thumb_small_relative]);
        }
    }

}