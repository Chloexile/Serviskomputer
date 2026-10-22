<?php

namespace App\Http\Controllers;

use Rap2hpoutre\FastExcel\FastExcel;
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
            'email' => 'required',
            'password' => 'required',
        ]);

        $query = new UserQuery;
        $query->tambah('users', $data);

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

    public function aksitanggal(Request $Request){
        if (session('username') || session('u')){
            $tgl_awal = $Request->input('tgl_awal');
            $tgl_akhir = $Request->input('tgl_akhir');

            $jalur = new UserQuery;
            if ($tgl_awal && $tgl_akhir){
                $data['users'] = $jalur->tampilfilter('users', $tgl_awal, $tgl_akhir);
            } else {
                $data['users'] = $jalur->tampil('users');
            }
            return view('homepage', $data);
        } else {
            return redirect()->intended('/');
        }
    }

    public function aksipdf (Request $Request){
        if (session('username') || session('u')){
            $tgl_awal = $Request->input('tgl_awal');
            $tgl_akhir = $Request->input('tgl_akhir');

            $jalur = new UserQuery;
            if ($tgl_awal && $tgl_akhir){
                $data['users'] = $jalur->tampilfilter('users', $tgl_awal, $tgl_akhir);
            } else {
                $data['users'] = $jalur->tampil('users');
            }

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('homepage', $data);
            return $pdf->download('laporan.pdf');
        }else{
            return redirect()->intended('/');
        }
    }

    public function aksiexcel(Request $Request){
        if (session('username') || session('u')){
            $tgl_awal = $Request->input('tgl_awal');
            $tgl_akhir = $Request->input('tgl_akhir');

            $jalur = new UserQuery;
            if ($tgl_awal && $tgl_akhir){
                $data['users'] = $jalur->tampilfilter('users', $tgl_awal, $tgl_akhir);
            } else {
                $data['users'] = $jalur->tampil('users');
            }

            return response()
                ->view('homepage', $data)
                ->header('Content-Type', 'application/vnd.ms-excel')
                ->header('Content-Disposition', 'attachment; filename="laporan-users.xls"');
        }else{
            return redirect('/');
        }
    }


        //PELANGGAN

    public function formpelanggan()
    {
        return view('pelanggan');
    }

    public function aksipelanggan(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $nama_pelanggan = $request->input('nama_pelanggan');
        $no_telepon = $request->input('no_telepon');
        $alamat = $request->input('alamat');

        $query = new UserQuery;

        $condition = ['username' => $username];
        $user = $query->pull('users', $condition);

        if (!$user) {
            $dataUser = [
                'username' => $username,
                'password' => $password,
                'email' => $email,
            ];
            $query->tambah('users', $dataUser);
        }

        $dataPelanggan = [
            'nama_pelanggan' => $nama_pelanggan,
            'no_hp' => $no_telepon,
            'alamat' => $alamat,
        ];

        $query->tambah('pelanggan', $dataPelanggan);

        return redirect('/pelanggan')->with('success', 'Registrasi pelanggan berhasil disimpan');
    }


    public function pelanggan()
    {
        if (session('username') || session('u')) {
            $query = new UserQuery;
            $data['pelanggan'] = $query->getAll('pelanggan'); 

            return view('pelanggan', $data); 
        } else {
            return redirect('/');
        }
    }

    public function tambahpelanggan()
    {
        if (session('username') || session('u')) {
            return view('inputpelanggan');
        } else {
            return redirect('/');
        }
    }



        //PETUGAS


    public function inputpetugas()
    {
        if (session('username') || session('u')) {
            return view('inputpetugas');
        } else {
            return redirect('/');
        }
    }

   public function aksipetugas(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $nama_petugas = $request->input('nama_petugas');
        $jeniskelamin = $request->input('jenis_kelamin');
        $jabatan = $request->input('jabatan'); // Pastikan mengambil input dari name="jabatan"

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
            'jabatan' => $jabatan,
        ];

        $query->tambah('petugas', $dataPetugas);

        return redirect('/petugas')->with('success', 'Registrasi petugas berhasil disimpan');
    }

    public function petugas()
    {
        if (session('username') || session('u')) {
            $query = new UserQuery;
            $data['petugas'] = $query->getAll('petugas'); 

            return view('petugas', $data); 
        } else {
            return redirect('/');
        }
    }
    
}