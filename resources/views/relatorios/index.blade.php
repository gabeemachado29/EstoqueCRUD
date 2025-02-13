<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Relatório de Retiradas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="border: solid 1px black;">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="form-container">
                        <form action="{{ route('relatorio.retiradas') }}" method="GET" class="container mt-4" target="_blank">
                            <div style="padding:15px">
                                <h3 class="text-center font-weight-bold mt-4 mb-4">Gerar Relatório</h3>

                                <!-- Seleção do Período -->
                                <div class="form-group">
                                    <label for="periodo">Selecione o Período:</label>
                                    <select name="periodo" id="periodo" class="form-control">
                                        <option value="diario">Diário</option>
                                        <option value="semanal">Semanal</option>
                                        <option value="mensal">Mensal</option>
                                    </select>
                                </div>

                                <!-- Botão para Gerar Relatório -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-file-alt"></i> Gerar Relatório
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
