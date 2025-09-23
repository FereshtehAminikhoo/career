<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Repositories\AdvertisementRepository;
use App\Repositories\JobPositionRepository;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    protected $jobPositionRepo;
    public function __construct(AdvertisementRepository $advertisementRepository)
    {
        $this->advertisementRepo = $advertisementRepository;
    }
    public function show()
    {

    }

    public function create()
    {
        return view('panel.advertisement.create');
    }

    public function store(Request $request)
    {
        $data = $request->only("title", "category", );
        $advertisement = $this->advertisementRepo->store($data);
        return redirect()->route('panel.advertisement.show');
    }
}
