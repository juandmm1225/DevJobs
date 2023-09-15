<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->titulo}}
        </h3>
    </div>
    <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Empresa: <span>{{$vacante->empresa}} </span> </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Ultimo día para postularse: <span>{{$vacante->ultimo_dia->toFormattedDateString()}} </span> </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Categoria: <span>{{$vacante->categoria}} </span> </p>
        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Salario: <span>{{$vacante->salario}} </span> </p>
        
    </div>
    <div class="md:grid md:grid-cols-6 gap-4"> 
        <div class="md:col-span-2"> 
            <img src="{{asset('storage/vacantes/'.$vacante->imagen)}}" >
        </div>
        <div class="md:col-span-4"> 
            <h2 class="text-2xl font-bold mb-5">Descripción </h2>
            <p> {{$vacante->descripcion}}
        </div>
    </div>
    @guest
        
            <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
                    <p>
                        ¿Deseas postularte? <a class="font-bold text-indigo-600" href="{{route('register')}}" > Obten una cuenta </a>
                    </p>
            </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot
    
</div>
