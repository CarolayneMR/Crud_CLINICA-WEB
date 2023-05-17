<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-5 text-5xl font-extrabold dark:text-white border-b-4 border-blue-500">Clinica Varminho</h1>

                    <div class="flex flex-col justify-center items-center m-10 ">
                        <form action="{{route('clinica.store')}}" method="POST">
                            @csrf
                            <x-text-input name="nome" placeholder="nome" />
                            <x-text-input name="endereco" placeholder="endereco" />
                            <x-text-input name="telefone" placeholder="telefone" />
                            <x-text-input name="especialidade" placeholder="especialidade" />
                            <x-text-input name="horario" placeholder="horario" />
                            <x-danger-button>Salvar</x-danger-button>
                        </form>
                    </div>

                        @foreach (Auth::user()->myClinica as $clinica)
                        <div class="flex justify-between border-b mb-2 gap-2 hover::bg-gray-300" x-data="{showDelete: false, showEdit: false}">
                            <div class="flex justify-between flex-grow text-center">
                                <div>{{$clinica->nome}}</div>
                                <div>{{$clinica->endereco}}</div>
                                <div>{{$clinica->telefone}}</div>
                                <div>{{$clinica->especialidade}}</div>
                                <div>{{$clinica->horario}}</div>
                            </div>

                            <div class="flex ml-4 gap-1">
                                <span class="cursor-pointer px-2 bg-red-500 text-white mr-2" @click="showDelete = true">&times;</span>
                                <span class="cursor-pointer px-2 bg-blue-500 text-white" @click="showEdit = true">Editar</span>
                            </div>

                            <template x-if="showDelete">
                                <div class="fixed top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-50">
                                    <div class="w-96 bg-white p-4 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                                        <h2 class="text-xl font-bold text-center">Are you sure?</h2>
                                        <div class="flex justify-between mt-4">
                                            <form action="{{ route('clinica.destroy', $clinica) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>Sim, apagar</x-danger-button>
                                            </form>
                                                <x-primary-button @click="showDelete = false">Cancelar</x-primary-button>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <template x-if="showEdit">
                                <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center">{{$clinica->nome}}</h2>
                                        <h2 class="text-xl font-bold text-center">{{$clinica->endereco}}</h2>
                                        <h2 class="text-xl font-bold text-center">{{$clinica->telefone}}</h2>
                                        <h2 class="text-xl font-bold text-center">{{$clinica->especialidade}}</h2>
                                        <h2 class="text-xl font-bold text-center">{{$clinica->horario}}</h2>
                                        <form class="my-4" action="{{route('clinica.update', $clinica)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-text-input name="nome" placeholder="nome" value="{{$clinica->nome}}" />
                                            <x-text-input name="endereco" placeholder="descrição" value="{{$clinica->endereco}}" />
                                            <x-text-input name="telefone" placeholder="horario" value="{{$clinica->telefone}}" />
                                            <x-text-input name="especialidade" placeholder="especialidade" value="{{$clinica->especialidade}}" />
                                            <x-text-input name="horario" placeholder="especialidade" value="{{$clinica->horario}}" />
                                            <x-primary-button class="w-full text-center mt-2">Salvar</x-primary-button>
                                        </form>
                                        <x-danger-button @click="showEdit = false" class="w-full">Cancelar</x-danger-button>
                                    </div>
                                </div>
                            </template>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>