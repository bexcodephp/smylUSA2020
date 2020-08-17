<?php 
namespace App\Shop\Facility\Repositories\Interfaces;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface FacilityRepositoryInterface extends BaseRepositoryInterface 
{
    public function listFacilities($columns, String $orderBy ,  String $sortBy ) : Collection;
    public function saveFacilityImage(UploadedFile $file) : string;
}