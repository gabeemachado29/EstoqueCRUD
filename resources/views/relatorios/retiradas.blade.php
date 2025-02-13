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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="form-container">
                        @if($retiradas->isEmpty())
                            <div class="alert alert-warning">
                                <strong>Aviso!</strong> Não há retiradas registradas para o período selecionado.
                            </div>
                        @else
                            <!-- Tabela de Retiradas -->
                            <div class="card shadow-sm">
                                <div class="card-header bg-success text-white">
                                    <h4 class="m-0">Detalhes das Retiradas</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 150px;">Produto</th>
                                                <th class="text-center" style="width: 180px;">Quantidade Retirada</th>
                                                <th class="text-center" style="width: 150px;">Unidade</th>
                                                <th class="text-center" style="width: 180px;">Categoria</th>
                                                <th class="text-center" style="width: 180px;">Cliente</th>
                                                <th class="text-center" style="width: 180px;">Data da Retirada</th>
                                                <th class="text-center" style="width: 180px;">Valor Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($retiradas as $saida)
                                                <tr>
                                                    <td class="text-center">{{ $saida->produto }}</td>
                                                    <td class="text-center">{{ $saida->quantidade }}</td>
                                                    <td class="text-center">{{ $saida->unidade }}</td>
                                                    <td class="text-center">{{ $saida->categoria }}</td>
                                                    <td class="text-center">{{ $saida->cliente }}</td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($saida->data_retirada)->format('d/m/Y') }}</td>
                                                    <td class="text-center">{{ number_format($saida->valor_total, 2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <!-- Botão de Voltar -->
                        <div class="text-center mt-4">
                            <a href="{{ route('relatorios.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
