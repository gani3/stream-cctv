<?php

namespace App\Livewire;

use App\Models\RuanganModels;
use Livewire\Component;

class RuanganComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $nama_ruangan,$id;


    public function render()
    {
        $data['rooms'] = RuanganModels::orderBy('nama_ruangan', 'desc')->get();
        return view('livewire.ruangan-components',$data);
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

     public function store(){
        $this->validate([
            'nama_ruangan' => 'required',
        ],[
            'nama_ruangan.required' => 'nama ruangan tidak boleh kosong',
        ]);

        RuanganModels::create([
            'nama_ruangan' => $this->nama_ruangan,
        ]);
        session()->flash('success','Berhasil menambahkan ruangan');
        $this->reset();
    }

    public function update($id){
        $updateRuangan = RuanganModels::find($id);
        $updateRuangan->update([
            'nama_ruangan' => $this->nama_ruangan,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getRuangan =  RuanganModels::find($id);
        $getRuangan->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function edit($id){
        $getRuangan = RuanganModels::find($id);
        $this->nama_ruangan = $getRuangan->nama_ruangan;
        $this->id = $getRuangan->id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }

}
