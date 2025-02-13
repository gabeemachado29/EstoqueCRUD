<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dar Baixa no Produto: ') }}{{ $produto->nome }}
            </h2>
            <a href="/produtos"><button class="btn btn-primary btn-lg">Listar Produtos</button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="border: solid 1px black;">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="form-container">
                        <form action="{{ route('saidas.store', $produto->id) }}" method="POST" class="container mt-4">
                            @csrf

                            <div style="padding:15px">
                                <h3 class="text-center font-weight-bold mt-4 mb-4">Dar Baixa no Produto</h3>

                                <!-- Quantidade -->
                                <div class="form-group">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade') }}" min="1" max="{{ $produto->estoque }}" required>
                                    @error('quantidade')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Valor Total -->
                                <div class="form-group">
                                    <label for="valor_total">Valor Total:</label>
                                    <input type="text" name="valor_total" id="valor_total" class="form-control" value="{{ old('valor_total', number_format($produto->valor_unitario * old('quantidade', 1), 2, ',', '.')) }}" readonly>
                                </div>

                                <!-- Cliente -->
                                <div class="form-group">
                                    <label for="id_cliente">Cliente:</label>
                                    <select name="id_cliente" id="id_cliente" class="form-control" required>
                                        <option value="">Selecione o Cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}" {{ old('id_cliente') == $cliente->id ? 'selected' : '' }}>
                                                {{ $cliente->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_cliente')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Botão de Submit -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Dar Baixa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Script para atualizar o campo "valor_total" dinamicamente
    document.getElementById('quantidade').addEventListener('input', function () {
        var quantidade = this.value;
        var valorUnitario = {{ $produto->valor_unitario }};
        var valorTotal = quantidade * valorUnitario;

        // Atualizar o campo valor_total com o valor calculado
        document.getElementById('valor_total').value = valorTotal.toFixed(2).replace('.', ',');
    });
</script>
