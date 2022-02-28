<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestMh\CreateTestRequest;
use App\Http\Requests\TestMh\UpdateTestRequest;
use App\Repositories\Eloquents\TestEloquent;
use App\TetsMh;
use Illuminate\Http\Request;

class TestMhController extends Controller
{
    private $test;

    public function __construct(TestEloquent $testEloquent)
    {
        $this->test = $testEloquent;
    }

    public function index()
    {
//        dd();
//        $test = TetsMh::all();
        return view(admin_test_vw() . '.index');
    }


    public function anyData()
    {
        return $this->test->anyData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(admin_test_vw() . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestRequest $request)
    {
        return $this->test->create($request->all());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
//        $auth = authAdmin()->id;
        $test = $this->test->getById($id);
        $data = [
            'test' => $test
        ];
        return view(admin_test_vw() . '.edit', $data);
    }

    // edit admin company page

    public function update(UpdateTestRequest $request, $id)
    {
        return $this->test->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->test->delete($id);
    }
}
