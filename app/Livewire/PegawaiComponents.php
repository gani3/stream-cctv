<?php

namespace App\Livewire;

use App\Models\PegawaiModels;
use App\Models\RuanganModels;
use Livewire\Component;

class PegawaiComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$nip,$nama_pegawai,$jenis_kelamin,$ruangan_models_id;

    public function render()
    {
        $data['employes'] = PegawaiModels::with('ruangan')->orderBy('nama_pegawai', 'desc')->get();
        $data['rooms'] = RuanganModels::orderBy('nama_ruangan', 'desc')->get();
        return view('livewire.pegawai-components',$data);
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

     public function store(){
        $this->validate([
            'nip' => 'required|unique:pegawai,nip',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'ruangan_models_id' => 'required',
        ],[
            'nip.required' => 'nip tidak boleh kosong',
            'nip.unique' => 'nip sudah terdata, silahkan gunakan nip lain',
            'nama_pegawai.required' => 'nama pegawai tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin harus dipilih',
            'ruangan_models_id.required' => 'ruangan harus dipilih',
        ]);

        PegawaiModels::create([
            'nip' => $this->nip,
            'nama_pegawai' => $this->nama_pegawai,
            'jenis_kelamin' => $this->jenis_kelamin,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        session()->flash('success','Berhasil menambahkan pegawai');
        $this->reset();
    }

    public function update($id){
        $updateRuangan = PegawaiModels::find($id);
        $updateRuangan->update([
            'nip' => $this->nip,
            'nama_pegawai' => $this->nama_pegawai,
            'jenis_kelamin' => $this->jenis_kelamin,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getPegawai =  PegawaiModels::find($id);
        $getPegawai->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function edit($id){
        $getPegawai = PegawaiModels::with('ruangan')->find($id);
        $this->id = $getPegawai->id;
        $this->ruangan_models_id = $getPegawai->ruangan_models_id;
        $this->nip = $getPegawai->nip;
        $this->nama_pegawai = $getPegawai->nama_pegawai;
        $this->jenis_kelamin = $getPegawai->jenis_kelamin;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }
}

