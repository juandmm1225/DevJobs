<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>

            <div>
                <x-label for="titulo" :value="__('Titulo vacante')" />

                <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" aria-placeholder="Titulo vacante"/>

                @error('titulo')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="salario" :value="__('Salario')" />

                <select id="salario" wire:model="salario" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""> Seleccionar salario </option>
                    @foreach ($salarios as $salario )

                            <option value="{{$salario->id}}"> {{$salario->salario}} </option>
                        
                    @endforeach
                    
                </select>
                @error('salario')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="categoria" :value="__('Categoría')" />

                <select id="categoria" wire:model="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""> Seleccionar categoría </option>
                    @foreach ($categorias as $categoria )

                            <option value="{{$categoria->id}}"> {{$categoria->categoria}} </option>
                        
                    @endforeach
                    
                </select>
                @error('categoria')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="empresa" :value="__('Empresa')" />

                <x-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" aria-placeholder="Empresa"/>

                @error('empresa')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="ultimo_dia" :value="__('Último día para aplicar')" />

                <x-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>

                @error('ultimo_dia')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="descripcion" :value="__('Descripción')" />

                <textarea wire:model="descripcion" placeholder="descripcion" lass="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"></textarea>

                @error('descripcion')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <div>
                <x-label for="imagen" :value="__('Imagen')" />

                <x-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

                <div class="my-5 w-80">
                    @if ($imagen)

                        Imagen: <img src="{{$imagen->temporaryUrl()}}">
                        
                    @endif
                </div>
                @error('imagen')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            <x-button>
                    Crear vacante
            </x-button>

</form>