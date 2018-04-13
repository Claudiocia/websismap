<?php


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use WebSisMap\Repositories\UnidadeRepository;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootPath = config('filesystems.disks.fotos_local.root');
        \File::deleteDirectory($rootPath, true);
        /** @var Collection $unidades */
        $unidades = factory(\WebSisMap\Models\Unidade::class, 20)->create();
        $repository = app(UnidadeRepository::class);
        $collectionThumbs = $this->getThumbs();
        $unidades->each(function ($unidade) use($repository, $collectionThumbs){
            $repository->uploadThumb($unidade->id, $collectionThumbs->random());
        });
    }

    protected function getThumbs()
    {
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/fotos/varanda_ideal.jpg'),
                'varanda_ideal.jpg'
            ),
        ]);
    }
}
