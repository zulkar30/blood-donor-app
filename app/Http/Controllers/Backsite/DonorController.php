<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Donor\StoreDonorRequest;
use App\Http\Requests\Donor\UpdateDonorRequest;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\MasterData\Donor;

// Third Party

class DonorController extends Controller
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
        abort_if(Gate::denies('donor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada tabel
        $donor = Donor::orderBy('created_at', 'desc')->get();
        return view('pages.backsite.master-data.donor.index', compact('donor'));
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
    public function store(StoreDonorRequest $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // Kirim data ke database
        $donor = Donor::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Donor');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.donor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        abort_if(Gate::denies('donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.donor.show', compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        abort_if(Gate::denies('donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.donor.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonorRequest $request, Donor $donor)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // Update data ke database
        $donor->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Donor');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        abort_if(Gate::denies('donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donor->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Donor');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
