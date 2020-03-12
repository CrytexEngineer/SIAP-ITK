<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class ManajemenPrograsStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Datatable::of(Major::all()->get())
            /**  ->addColumn('action', function ($row) {
             * $action = '<a href="/akunpegawai/' . $row->email . '/edit" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
             * $action .= \Form::open(['url' => 'akunpegawai/' . $row->email, 'method' => 'delete', 'style' => 'float:right']);
             * $action .= "<button type='submit' class='btn btn-danger btn-sm'>Hapus</button>";
             * $action .= \Form::close();
             * return $action;
             *
             * })**/
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'PS_Kode_Prodi' => 'required|unique:matakuliah|min:6',
            'PS_Nama_Baru' => 'required|min:6',

        ]);

        $major = New Major();
        $major->create($request->all());
        //  return redirect('/matakuliah')->with('status', 'Data Matakuliah Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['major'] = Major::where('PS_Kode_Prodi', $id)->first();
        //  return view('matakuliah.edit', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'PS_Kode_Prodi' => 'required|unique:matakuliah|min:6',
            'PS_Nama_Baru' => 'required|min:6',

        ]);

        $major = Major::where('PS_Kode_Prodi', '=', $id);
        $major->update($request->except('_method', '_token'));
        //return redirect('/matakuliah')->with('status','Data Matakuliah Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $major = Major::where('PS_Kode_Prodi', $id);
        $major->delete();
        // return redirect('/matakuliah')->with('status','Data Matakuliah Berhasil Dihapus');;
    }
}
