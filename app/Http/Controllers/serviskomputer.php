<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserQuery;

class serviskomputer extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('u');
        $password = $request->input('p');

        $condition = [
            'username' => $username,
            'password' => $password,
        ];

        $query = new UserQuery;
        $user = $query->findUser('users', $condition);

        if ($user) {
            session(['username' => $user->username]);
            return redirect('/homepage');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function homepage()
    {
        if (session('username')) {
            $query = new UserQuery;
            $data['users'] = $query->getAll('users');

            return view('homepage', $data);
        } else {
            return redirect('/');
        }
    }

    public function registerform()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama_petugas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $query = new UserQuery;
        $query->tambah('petugas', $data);

        return redirect('/')->with('success', 'Registrasi berhasil');
    }

    public function editform($id)
    {
        $user = UserQuery::find($id);
        return view('edit', ['user' => $user]);
    }

    public function editsave(Request $request, $id)
    {
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required',
        ]);

        $user = UserQuery::find($id);
        $user->update($data);

        return redirect('/homepage');
    }

    public function delete($id)
    {
        $user = UserQuery::find($id);
        $user->delete();

        return redirect('/homepage');
    }

    public function inputpetugas()
    {
        return view('inputpetugas');
    }

    public function aksipetugas(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $nama_petugas = $request->input('nama_petugas');
        $jeniskelamin = $request->input('jenis_kelamin');
        $level = $request->input('level');

        $query = new UserQuery;

        $condition = [
            'username' => $username
        ];

        $user = $query->pull('users', $condition);

        if (!$user) {
            $dataUser = [
                'username' => $username,
                'password' => $password,
                'email' => $email,
            ];

            $query->tambah('users', $dataUser);
        }

        $dataPetugas = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'nama_petugas' => $nama_petugas,
            'jenis_kelamin' => $jeniskelamin,
            'level' => $level,
        ];

        $query->tambah('petugas', $dataPetugas);

        return redirect('/')->with('success', 'Registrasi berhasil disimpan');
    }

    public function petugas()
    {
        if (session('username')) {
            $query = new UserQuery;
            $data['users'] = $query->getAll('users');

            return view('petugas', $data);
        } else {
            return redirect('/');
        }
    }
}