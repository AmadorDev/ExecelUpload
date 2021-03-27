<?php

namespace App\Http\Livewire;


use App\Models\Minsa;
use Livewire\Component;
use Livewire\WithPagination;


class Personnelc extends Component
{
	use WithPagination;
	

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.personnelc',[
            'data' => Minsa::where('numero_de_documento', 'like', '%'.$this->search.'%')
              ->orwhere("nombres_1",'like','%'.$this->search.'%')
              ->orwhere("apellido_paterno",'like','%'.$this->search.'%')
              ->paginate(10),
        ]);
    }
 

}
