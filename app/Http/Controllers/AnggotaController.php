<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\PersonalData;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggotas = PersonalData::leftJoin('divisis', 'divisis.id', 'personal_data.divisi')
            ->where('personal_data.tipe', 'internal')
            ->get(['personal_data.id', 'personal_data.nama', 'divisis.nama as divisi', 'personal_data.no_hp']);
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisi = Divisi::pluck('nama', 'id');
        $role = Role::pluck('nama', 'id');
        return view('anggota.create', compact('divisi', 'role'));
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
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required'
        ]);
        $personalData = PersonalData::create($request->post());
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'personal_data_id' => $personalData->id,
            'role_id' => $request->role
        ]);
        return redirect()->route('anggota.index')->with('success', 'Sukses Menambah Data Anggota');
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
        //
        $personalData = PersonalData::findOrfail($id);
        $anggota = PersonalData::leftjoin('users', 'users.personal_data_id', 'personal_data.id')->where('personal_data.id', $personalData->id)->first(['personal_data.id', 'personal_data.nama', 'personal_data.divisi', 'personal_data.no_hp', 'users.username', 'users.role_id as role']);
        $divisi = Divisi::pluck('nama', 'id');
        $role = Role::pluck('nama', 'id');

        return view('anggota.edit', compact(['anggota', 'divisi', 'role']));
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
        //
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required'
        ]);
        $anggota = PersonalData::findOrfail($id);
        $anggota->fill($request->post())->save();
        $user = User::where('personal_data_id', $id)->first();
        if (!$user) {
            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'personal_data_id' => $id,
                'role_id' => $request->role
            ]);
        } else {
            $update = [];
            if ($request->password) {
                $update['password'] = Hash::make($request->password);
            }
            $update['role_id'] = $request->role;
            $user->fill($update)->save();
        }

        return redirect()->route('anggota.index')->with('success', 'Jenis Agenda Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $anggota = PersonalData::findOrfail($id);
        $anggota->delete();

        User::where('personal_data_id', $id)->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota Berhasil Dihapus');
    }
}
