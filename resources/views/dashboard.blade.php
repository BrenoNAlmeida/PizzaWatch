@php
use App\Models\User;
use App\Models\Prova;
use App\Models\Divida;
$funcionarios = User::all();
$provas = Prova::all();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar Prova') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form method="POST" action="/cadastrar-prova" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="file" name="foto">
                            </div>

                            <div>

                                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">selecione o devedor</label>
                                <select name='devedor' id="devedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>------</option>
                                @foreach ($funcionarios as $fun)
                                    <option value="{{$fun->id}}">{{$fun->nome}}</option>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                @endforeach
                                </select>

                            </div>

                            <div class="col-sm-10">
                                <button type="submit"
                                class=" mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded ">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                
                </div>
            </div>
            
        </div>
    </div>
    @include('sweetalert::alert')
    
</x-app-layout>
