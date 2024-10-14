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
        $users = $this->userModel->with('kelas')->orderBy('id', 'asc')->get(); 
        
        if (!$users) {
            $users = [];
        }
    
        $data = [
            'title' => "Create User",
            'users' => $users,
        ];
    
        return view('list_user', $data);
    }
    public function profile($id)
    {

        $user = $this->userModel->find($id);

        if(!$user){
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        return view ('profile', ['user' => $user]);
    }

    public function create()
    {

        $kelasModel = new Kelas();

        $kelas =$this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
            'title' => "Create User",
        ];


        return view('create_user', $data);  
        
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel -> getKelas();
        $title = 'Edit User';
        return view ('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if($request->hasFile('foto')){
            $fileName = time(). '.'. $request->foto->extension();
            $request->foto->move(public_path('upload'),$fileName);
            $user->foto = 'upload/'. $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User sudah berhasil dihapus');
    }

    public function read($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail'.$user->nama;

        return view('show.user', compact('user', 'kelas', 'title'));
    }
    public function store(Request $request)
    {

        $request->validate([
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
