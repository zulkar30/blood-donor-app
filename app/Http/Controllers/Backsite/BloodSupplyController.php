<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodSupply\StoreBloodSupplyRequest;
use App\Http\Requests\BloodSupply\UpdateBloodSupplyRequest;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\MasterData\BloodSupply;

// Third Party

class BloodSupplyController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_supply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blood_supply = BloodSupply::all();

        return view('pages.backsite.master-data.blood-supply.index', compact('blood_supply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodSupplyRequest $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Kirim data ke database
        $blood_supply = BloodSupply::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.blood_supply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_supply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.blood-supply.show', compact('blood_supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_supply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.blood-supply.edit', compact('blood_supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodSupplyRequest $request, BloodSupply $blood_supply)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Update data ke database
        $blood_supply->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.blood_supply.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_supply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Menghapus data berdasarkan id
        $blood_supply->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
