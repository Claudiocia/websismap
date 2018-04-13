<?php

namespace WebSisMap\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;


/**
 * Interface UnidadeRepository.
 *
 * @package namespace WebSisMap\Repositories;
 */
interface UnidadeRepository extends RepositoryInterface
{
    public function uploadThumb($id, UploadedFile $file);
}
