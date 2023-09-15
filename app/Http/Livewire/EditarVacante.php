<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vac_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image',
        
    ];

    public function mount(Vacante $vacante){
            $this->vac_id = $vacante->id;
            $this->titulo = $vacante->titulo;
            $this->salario = $vacante->salario;
            $this->categoria = $vacante->categoria;
            $this->empresa = $vacante->empresa;
            $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
            $this->descripcion = $vacante->descripcion;
            $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){

        $datos = $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        }

        $vacante = Vacante::find($this->vac_id);

        $vacante->titulo = $datos['titulo'];
        $vacante->salario = $datos['salario'];
        $vacante->categoria = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        $vacante->save();

        session()->flash('mensaje', 'Se actualizaron los datos correctamente');

        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        $salarios = Salario::all();
        $categoria = Categoria::all();
        return view('livewire.editar-vacante',[
            'salarios'=> $salarios,
            'categorias'=>$categoria
        ]);
    }
}
