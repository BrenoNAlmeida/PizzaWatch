@php
use \App\Models\User;
use \App\Models\Prova;
use \App\Models\Divida;
$user = Auth::user();
$minhas_dividas = Divida::where('devedor_id', $user->id)->get();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <p class="text-lg">Nome: {{ $user->nome }}</p>                           
            <p class="text-lg">Matricula: {{ $user->matricula }}</p>
        </h2>
    </x-slot>

    <!-- Dividas -->
    @if($minhas_dividas->count() > 0)
    <div class='py-6'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-30 text-gray-900 dark:text-gray-100">
                    <div class="h-full flex flex-col">
                        <table class="table-auto text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Devedor</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">Refrigerante</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Pago</th>
                                </tr>
                            </thead>
                            @foreach ($minhas_dividas as $divida)
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ User::find($divida->devedor_id)->nome }}
                                        </td>
                                        <td>
                                            @if($divida->pizza)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                        <td>
                                            @if($divida->refrigerante)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                        <td>
                                            {{ $divida->created_at->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            @if($divida->paga)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        <p class="text-lg">Você não possui dividas</p>
    @endif

</x-app-layout>
