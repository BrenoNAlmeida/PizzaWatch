@php
use App\Models\Prova;
use App\Models\User;
$provas = Prova::where('Evalidado', false)->get()
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Analisar Provas') }}
        </h2>
    </x-slot>


    @if($provas->count() > 0)
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-30 text-gray-900 dark:text-gray-100">
                    <div class="h-full flex flex-col">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Devedor</th>
                                    <th scope="col">Prova</th>
                                    <th scope="col">Confirmar Prova</th>
                                    <th scope="col">Recusar Prova</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provas as $prova)
                                    <tr>
                                        <td>
                                            <div class="align-middle">{{ User::find($prova->devedor_id)->nome }}</div>
                                        </td>
                                        <td>
                                            <div class="w-16 h-16 overflow-hidden rounded">
                                                <img src="{{ asset('storage/' . $prova->foto) }}" class="object-cover w-full h-full" alt="imagem">
                                            </div>
                                        </td>
                                        <td>
                                            <form method="POST" action="/confirmar-prova">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $prova->id }}">
                                                <button type="submit" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Confirmar</button>
                                            </form> 
                                        </td>
                                        <td>
                                            <form method="POST" action="/recusar-prova">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $prova->id }}">
                                                <button type="submit" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Recusar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @else

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-30 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <h1 class="text-3xl text-gray-900 dark:text-gray-100">Não há provas para analisar</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@include('sweetalert::alert')
</x-app-layout>