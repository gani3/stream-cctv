<?php

namespace App\Livewire;

use App\Models\PegawaiModels;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$email,$password,$username,$role,$pegawai_models_id;
    public function render()
    {
        $data['users'] = User::with('pegawai')->orderBy('created_at','DESC')->get();
        $data['employes'] = PegawaiModels::orderBy('nama_pegawai')->get();
        return view('livewire.users-components',$data);
    }

        public function store(){
        $this->validate([
            'password' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required',
            'pegawai_models_id' => 'required',
            'email' => 'required|unique:users,email|email',
        ],[
            'pegawai_models_id.required' => 'pegawai harus dipilih',
            'username.required' => 'username tidak boleh kosong',
            'username.unique' => 'username telah terdaftar',
            'role.required' => 'role user tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email telah terdaftar',
            'email.email' => 'format email tidak diperbolehkan',
            'password.required' => 'password tidak boleh kosong',
        ]);

        User::create([
            'username' => $this->username,
            'role' => $this->role,
            'pegawai_models_id' => $this->pegawai_models_id,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('success','Berhasil menambahkan user');
        $this->reset();
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

    public function edit($id) {
        $getuser = User::find($id);
        // set variabel sesuai data yang didapatkan dari db
        $this->id = $getuser->id;
        $this->username = $getuser->username;
        $this->role = $getuser->role;
        $this->pegawai_models_id = $getuser->pegawai_models_id;
        $this->email = $getuser->email;
        $this->editpage = true;
        $this->listpage = false;
        $this->addpage = false;
    }

    public function update($id) {
        $user = User::find($id);
        if ($this->password == "") {
            $user->update([
                'username' => $this->username,
                'role' => $this->role,
                'pegawai_models_id' => $this->pegawai_models_id,
                'email' => $this->email,
            ]);
        }else{
            $user->update([
                'username' => $this->username,
                'role' => $this->role,
                'pegawai_models_id' => $this->pegawai_models_id,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }
        session()->flash('success', 'berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id) {
        $getuser = User::find($id);
        $getuser->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }
}
