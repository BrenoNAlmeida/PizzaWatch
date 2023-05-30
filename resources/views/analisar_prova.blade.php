@php
    use App\Models\User;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Analisar Provas') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-30 text-gray-900 dark:text-gray-100">
                    <div class="h-full flex flex-col">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Testemunha</th>
                                    <th scope="col">Devedor</th>
                                    <th scope="col">Prova</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="text-center">
                                        <td>
                                            <div class="align-middle">{{ User::find($prova->testemunha_id)->nome }}</div>
                                        </td>
                                        <td>
                                            <div class="align-middle">{{ User::find($prova->devedor_id)->nome }}</div>
                                        <td class="flex align-middle justify-center">
                                            <div class="w-16 h-16 overflow-hidden rounded">
                                                <a href="{{ asset('storage/' . $prova->foto) }}" target="__blank">
                                                    <img src="{{ asset('storage/' . $prova->foto) }}" class="object-cover w-full h-full" alt="imagem">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert')
</x-app-layout>