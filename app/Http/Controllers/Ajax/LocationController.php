<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\DistrictRepository;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;
    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository
    ) {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }
    public function getLocation(Request $request)
    {
        $data = $request->input();
        if ($data['target'] === 'district') {
            $province = $this->provinceRepository->with('districts')->find($data['data']['id'], ['code', 'name']);
            $districts = $province->districts;
            return response()->json($districts);
        } elseif ($data['target'] === 'ward') {
            $district = $this->districtRepository->with('wards')->find($data['data']['id'], ['code', 'name']);
            $wards = $district->wards;
            return response()->json($wards);
        }
    }
}
