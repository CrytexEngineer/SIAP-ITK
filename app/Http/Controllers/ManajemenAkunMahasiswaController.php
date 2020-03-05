<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Middleware\Student;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class ManajemenAkunMahasiswaController extends Controller
{

    function json()
    {
        return Datatables::of(User::where('role', 10)->get()->all())
            ->addColumn('action', function ($row) {
                $action = '<a href="/akunmahasiswa/' . $row->email . '/edit" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action .= \Form::open(['url' => 'akunmahasiswa/' . $row->email, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit' class='btn btn-danger btn-sm'>Hapus</button>";
                $action .= \Form::close();
                return $action;

            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manajemen_akun.mahasiswa');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['users'] = User::where('email', $id)->first();
        return view('manajemen_akun.edit_mahasiswa', $data);
//        $user= User::find($id);
//        return View::make("user/regprofile")->with($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::where('email', $id)->first();
        $user->update($request->except(['_token', '_method']));

        $user->student->where('MA_Nrp', $user->student['MA_Nrp'])->update(
            [
                'MA_NamaLengkap' => $user['name'],
                'MA_Email' => $user['name'],]
        );
        return redirect('/akunmahasiswa')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('email', $id)->with('employee');
        if ($user->delete()) {
            $student = Student::where('MA_Email ', $id);
            $student->delete();
        }
        return redirect('/akunmahasiswa')->with('status_failed', 'Data Berhasil Dihapus');
    }
}
