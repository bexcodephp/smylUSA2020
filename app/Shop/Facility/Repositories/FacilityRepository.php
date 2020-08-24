<?php 
namespace App\Shop\Facility\Repositories;

use App\Shop\Facility\Facility;
use Illuminate\Http\UploadedFile;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Shop\Facility\Repositories\Interfaces\FacilityRepositoryInterface;

class FacilityRepository extends BaseRepository implements FacilityRepositoryInterface
{
    protected $primaryKey;

    public function __construct(Facility $facility)
    {
        parent::__construct($facility);
        $this->model = $facility;
    }
    
    public function listFacilities($columns = ['*'], string $orderBy = 'facility_id', string $sortBy = 'asc') :  Collection
    {
        return $this->all(['*'], $orderBy, $sortBy);
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveFacilityImage(UploadedFile $file) : string
    {
        return $file->store('facility', ['disk' => 'public']);
    }
}

