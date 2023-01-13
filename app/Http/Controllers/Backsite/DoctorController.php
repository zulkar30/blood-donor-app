<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

// Everything Else
use Auth;
use Gate;
use File;

// Model
use App\Models\User;
use App\Models\MasterData\Doctor;

// Third Party

class DoctorController extends Controller
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
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada tabel
        $doctor = Doctor::orderBy('created_at', 'desc')->get();
        $user = User::whereHas('detail_user', function($query){
            $query->where('type_user_id', 1);
        })->orderBy('name', 'asc')->get();

        return view('pages.backsite.master-data.doctor.index', compact('doctor', 'user'));
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
    public function store(StoreDoctorRequest $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-doctor');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-doctor');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-doctor', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        // Kirim data ke database
        $doctor = Doctor::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Doctor');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::whereHas('detail_user', function($query){
            $query->where('type_user_id', 1);
        })->orderBy('name', 'asc')->get();

        return view('pages.backsite.master-data.doctor.edit', compact('doctor', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $doctor['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-doctor', 'public'
            );

            // delete old photo from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // Update data ke database
        $doctor->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Doctor');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $doctor['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $doctor->forceDelete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Doctor');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
