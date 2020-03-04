<?php

namespace App\Http\Controllers;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use App\ManajemenAkun;
class ManajemenAkunPegawaiController extends Controller
{

    function json(){
        return Datatables::of(User::where('role', '<', 10)->get()->all())
            ->addColumn('action', function ($row) {
            $action = '<a href="/akunpegawai/'.$row->email.'/edit" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action .= \Form::open(['url'=>'akunpegawai/'.$row->email,'method'=>'delete', 'style'=>'float:right']);
            $action .= "<button type='submit' class='btn btn-danger btn-sm'>Hapus</button>";
            $action .= \Form::close();
            return $action;

        })
            ->make(true);
        //Khusus di pegawai harus query ke roles selain mahasiswa
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manajemen_akun.pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['users'] = User::where('email', $id)->first();
        return view('manajemen_akun.edit_pegawai',$data);
//        $user= User::find($id);
//        return View::make("user/regprofile")->with($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $akunpegawai = User::where('email',$id);
        $akunpegawai->update($request->except(['_token','_method']));
        return redirect('/akunpegawai')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akunpegawai = User::where('email',$id);
        $akunpegawai->delete();
        return redirect('/akunpegawai')->with('status_failed', 'Data Berhasil Dihapus');
    }
}

