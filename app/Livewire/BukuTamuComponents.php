<?php

namespace App\Livewire;

use App\Models\BukuTamuModels;
use Livewire\Component;

class BukuTamuComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$nama_lengkap,$jenis_kelamin,$keperluan,$jam_masuk,$jam_pulang,$tanggal;
    public function render()
    {
        $data['guestbooks'] = BukuTamuModels::orderBy('created_at','DESC')->get();
        return view('livewire.buku-tamu-components',$data);
    }
     public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

    public function store(){
        $this->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required',
        ],[
            'nama_lengkap.required' => 'nama lengkap tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin tidak boleh kosong',
            'keperluan.required' => 'keperluan tidak boleh kosong',
            'tanggal.required' => 'tanggal tidak boleh kosong',
        ]);

        BukuTamuModels::create([
            'nama_lengkap' => $this->nama_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'keperluan' => $this->keperluan,
            'jam_masuk' => $this->jam_masuk,
            'tanggal' => $this->tanggal,
            'jam_pulang' => $this->jam_pulang,
        ]);
        session()->flash('success','Berhasil menambahkan data tamu');
        $this->reset();
    }

    public function update($id){
        $updateHistory = BukuTamuModels::find($id);
        $updateHistory->update([
            'nama_lengkap' => $this->nama_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'keperluan' => $this->keperluan,
            'tanggal' => $this->tanggal,
            'jam_masuk' => $this->jam_masuk,
            'jam_pulang' => $this->jam_pulang,
        ]);
        session()->flash('success', 'Berhasil melakukan update data tamu');
        $this->reset();
    }

    public function destroy($id){
        $getGuestBook =  BukuTamuModels::find($id);
        $getGuestBook->delete();
        session()->flash('success', 'Berhasil menghapus data tamu');
        $this->reset();
    }

    public function edit($id){
        $getGuestBook = BukuTamuModels::find($id);
        $this->id = $getGuestBook->id;
        $this->nama_lengkap = $getGuestBook->nama_lengkap;
        $this->jenis_kelamin = $getGuestBook->jenis_kelamin;
        $this->keperluan = $getGuestBook->keperluan;
        $this->tanggal = $getGuestBook->tanggal;
        $this->jam_masuk = $getGuestBook->jam_masuk;
        $this->jam_pulang = $getGuestBook->jam_pulang;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }
}
