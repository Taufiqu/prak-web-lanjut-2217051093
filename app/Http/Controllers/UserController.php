<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public $userModel;
    
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $users = $this->userModel->getUser();
        
        if (!$users) {
            $users = [];
        }
    
        $data = [
            'title' => "Create User",
            'users' => $users,
        ];
    
        return view('list_user', $data);
    }
    public function profile($id){

        $user = $this->userModel->find($id);

        if(!$user){
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        return view ('profile', ['user' => $user]);
    }

    public function create(){

        $kelasModel = new Kelas();

        $kelas =$this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
            'title' => "Create User",
        ];


        return view('create_user', $data);  
        
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'npm' =>'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $fileName = time() . '_' . $foto->getClientOriginalName();

            $foto->move(public_path('upload/img'), $fileName);

            // Path relatif untuk disimpan ke database
            $fotoPath = 'upload/img/' . $fileName;
      
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }
            
}
