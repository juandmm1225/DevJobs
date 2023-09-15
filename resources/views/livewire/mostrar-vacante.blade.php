<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
    

            @forelse ($vacantes as $vacante )

                <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                    <div class="space-y-3">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-sm text-gray-500 font-bold">{{$vacante->empresa}} </p>
                            <p class="text-sm text-gray-500 font-bold">Ultimo día: {{$vacante->ultimo_dia->format('d/m/y')}} </p>
                    </div>

                    <div class="flex flex-col md:flex-row items-stretch gap-3 items-center mt-5 md:mt-0">
                        <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                           {{$vacante->candidatos->count()}} Candidatos
                        </a>

                        <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Editar
                        </a>

                        <button wire:click="$emit('mostrarAlerta', {{$vacante->id}})" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Eliminar
                        </button>
                    </div>
                </div>

        
        @empty
                <p class="text-sm p-3 text-center text-gray-600 font-bold">No has publicado vacantes </p>
        @endforelse 
    </div>

    <div class="flex justify-center mt-10">
            {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('mostrarAlerta', vacanteId => {

        Swal.fire({
    title: 'Estas seguro de eliminar la vacante?',
    text: "Esto no se puede deshacer",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borrar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {

        Livewire.emit('eliminarVacante',vacanteId)

        Swal.fire(
        'Eliminado!',
        'La vacante ha sido removida.',
        'success'
        )
    }
    })

    });
    
</script>
@endpush