<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image',

    ];

    public function render()
    {
        $salarios = Salario::all();
        $categoria = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios'=> $salarios,
            'categorias'=>$categoria
        ]);
    }

    public function crearVacante(){
        
        $datos = $this->validate();

       $imagen = $this->imagen->store('public/vacantes');
       $datos['imagen'] = str_replace('public/vacantes/','',$imagen);

       Vacante::create([
        'titulo' => $datos['titulo'],
        'salario' => $datos['salario'],
        'categoria' => $datos['categoria'],
        'empresa' => $datos['empresa'],
        'ultimo_dia' => $datos['ultimo_dia'],
        'descripcion' => $datos['descripcion'],
        'imagen' => $datos['imagen'],
        'user_id' => auth()->user()->id
       ]);

       session()->flash('mensaje', 'La vacante se publicó de forma correcta');

       return redirect()->route('vacantes.index');
    }
}
