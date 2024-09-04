<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Province.
 *
 * @package namespace App\Entities;
 */
class Province extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    protected $table = 'provinces';

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function districts()
    {
        return $this->hasMany(District::class, 'province_code', 'code');
    }
}
