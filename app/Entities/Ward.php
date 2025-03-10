<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Ward.
 *
 * @package namespace App\Entities;
 */
class Ward extends Model implements Transformable
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
    protected $table = 'wards';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
