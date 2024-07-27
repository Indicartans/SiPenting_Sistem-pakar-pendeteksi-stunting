<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('pakar');
        $user = User::all();
        return view('admin/User/list_admin', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = User::pluck('role');
        return view('admin/User/add_admin', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->authorize('pakar');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.index')->with('pesan', 'Berhasil menambahkan pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        // Validasi input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'password' => 'nullable|string|min:8|confirmed',
        //     'role' => 'required|string'
        // ]);

        $request["password"] = bcrypt($request->password);

        $update = User::find($id)->update($request->all());
        if ($update) {
            return redirect()->route('admin.index')->with('pesan', 'pengguna berhasil di update');
        }
        return redirect()->route('admin.index')->with('pesan', 'admin kontol');
        // dd($request->all(), $id);
        //
        // dd($valid);
        // Temukan user berdasarkan ID

        // Redirect ke halaman daftar admin dengan pesan sukses
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('pakar');
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.index')->with('pesan', 'pengguna ditemukan');
        }
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.index')->with('pesan', 'pengguna telah dihapus');
    }
}
