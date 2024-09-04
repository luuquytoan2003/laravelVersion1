<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WardRepository;
use App\Entities\Ward;
use App\Validators\WardValidator;

/**
 * Class WardRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WardRepositoryEloquent extends BaseRepository implements WardRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ward::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
