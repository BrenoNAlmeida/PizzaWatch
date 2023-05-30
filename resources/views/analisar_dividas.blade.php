@php
use \App\Models\Divida;
use \App\Models\User;
$dividasPendentes = Divida::where('paga', false)->get()

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirmar Pagamento') }}
        </h2>
    </x-slot>


    @if($dividasPendentes->count() > 0)
    <div class='py-6'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-30 text-gray-900 dark:text-gray-100">
                    <div class='h-full flex flex-col '>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Devedor</th>
                                    <th scope="col">Prova</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">Refrigerante</th>
                                    @if(Auth::User()->role == 1)
                                    <th scope="col">Confirmar Pagamento</th>
                                    @endif
                                </tr>      
                            </thead> 
                                <tbody>
                                    @foreach ($dividasPendentes as $divida)
                                    <tr class="items-center text-center">
                                        <td>
                                           {{ User::find($divida->devedor_id)->nome }}
                                        </td>

                                        <td class="flex align-middle justify-center">
                                            <div class="w-16 h-16 rounded">
                                                <a class="m-auto w-fit" href="{{route('prova.analisar-prova', ['prova'=>$divida->prova_id])}}">
                                                    <img src="{{ asset('storage/' . $divida->prova->foto) }}" class="object-cover w-full h-full" alt="imagem" >
                                                </a>
                                            </div>
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
                                        @if(Auth::User()->role == 1)
                                        <td>
                                            <form method="POST" action="/confirmar-pagamento">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $divida->id }}">
                                                <button type="submit" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Confirmar</button>
                                            </form> 
                                        </td>
                                        @endif
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
                            <h1 class="text-3xl text-gray-900 dark:text-gray-100">Não há Pizzas Pendentes</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@include('sweetalert::alert')   
</x-app-layout>