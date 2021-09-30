<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TestemonialRepositoryInterface;

class TestemonialController extends Controller
{
    private $testemonialRepository;

    public function __construct(TestemonialRepositoryInterface $testemonialRepository)
    {
        $this->testemonialRepository = $testemonialRepository;
    }

    public function allTestemonials()
    {
        $testemonials = $this->testemonialRepository->all();

        return view('adminpanel.testemonials', [
          "testemonials" => $testemonials
        ]);
    }
}
