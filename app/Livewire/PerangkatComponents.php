<?php

namespace App\Livewire;

use App\Models\PerangkatModels;
use App\Models\RuanganModels;
use Livewire\Component;

class PerangkatComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$kategori,$model,$ip_address,$sumbu_x,$sumbu_y,$keterangan,$ruangan_models_id;

    public function render()
    {
        $data['devices'] = PerangkatModels::with('ruangan')->orderBy('model','desc')->get();
        $data['rooms'] = RuanganModels::orderBy('nama_ruangan','desc')->get();
        return view('livewire.perangkat-components',$data);
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

     public function store(){
        $this->validate([
            'kategori' => 'required',
            'model' => 'required',
            'ip_address' => 'required',
            'sumbu_x' => 'required',
            'sumbu_y' => 'required',
            'keterangan' => 'required',
            'ruangan_models_id' => 'required',
        ],[
            'kategori.required' => 'kategori tidak boleh kosong',
            'model.required' => 'model tidak boleh kosong',
            'ip_address.required' => 'ip address tidak boleh kosong',
            'sumbu_x.required' => 'sumbu x tidak boleh kosong',
            'sumbu_y.required' => 'sumbu y tidak boleh kosong',
            'keterangan.required' => 'keterangan tidak boleh kosong',
            'ruangan_models_id.required' => 'ruangan harus dipilih',
        ]);

        PerangkatModels::create([
            'kategori' => $this->kategori,
            'model' => $this->model,
            'ip_address' => $this->ip_address,
            'sumbu_x' => $this->sumbu_x,
            'sumbu_y' => $this->sumbu_y,
            'keterangan' => $this->keterangan,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        session()->flash('success','Berhasil menambahkan perangkat');
        $this->reset();
    }

    public function update($id){
        $updatePerangkat = PerangkatModels::find($id);
        $updatePerangkat->update([
            'kategori' => $this->kategori,
            'model' => $this->model,
            'ip_address' => $this->ip_address,
            'sumbu_x' => $this->sumbu_x,
            'sumbu_y' => $this->sumbu_y,
            'keterangan' => $this->keterangan,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getPerangkat =  PerangkatModels::find($id);
        $getPerangkat->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function edit($id){
        $getPerangkat = PerangkatModels::find($id);
        $this->id = $getPerangkat->id;
        $this->kategori = $getPerangkat->kategori;
        $this->model = $getPerangkat->model;
        $this->ip_address = $getPerangkat->ip_address;
        $this->sumbu_x = $getPerangkat->sumbu_x;
        $this->sumbu_y = $getPerangkat->sumbu_y;
        $this->keterangan = $getPerangkat->keterangan;
        $this->ruangan_models_id = $getPerangkat->ruangan_models_id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }
}
