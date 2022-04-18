<?php

namespace App\Http\Controllers;

use App\Models\Testcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestcaseRequest;
use App\Http\Requests\UpdateTestcaseRequest;

// $tc = Testcase::firstOrCreate([
//     'surah' => 'an-nisa'
// ]);

// $collection = collect($tc);

class DashboardTestcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.testcases.index', [
            'testcases' => Testcase::where('user_id', auth()->user()->id)->get()
            // ambil data testcase yang mana user_id nya sama dengan user yang lagi log in
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getdata = Testcase::surah();
        // return $getdata;
        return view('dashboard.testcases.create', [
            'surahs' => Testcase::surah()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestcaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestcaseRequest $request)
    {
        $validateData = $request->validate([
            'surah' => 'required',
            'ayat_surah' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Testcase::create($validateData);

        return redirect('/dashboard/testcases')->with('success', 'Testcase baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function show(Testcase $testcase)
    {
        // $getdata = Testcase::quran($testcase);
        // return $getdata;
        return view('dashboard.testcases.show', [
            'testcase' => $testcase,
            'quran' => Testcase::quran($testcase)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Testcase $testcase)
    {
        return view('dashboard.testcases.edit', [
            'testcase' => $testcase,
            'surahs' => Testcase::surah()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestcaseRequest  $request
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestcaseRequest $request, Testcase $testcase)
    {
        $rules = [
            'surah' => 'required',
            'ayat_surah' => 'required'
        ];

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;
        
        // salah satu cara untuk nge-update
        Testcase::where('id', $testcase->id)
            ->update($validateData);

        return redirect('/dashboard/testcases')->with('success', 'Testcase telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testcase $testcase)
    {
        Testcase::destroy($testcase->id); //hapus data post berdasarkan id
        return redirect('/dashboard/testcases')->with('success', 'Testcase telah dihapus');
    }
}
