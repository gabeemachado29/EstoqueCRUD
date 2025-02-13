<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    // Método para exibir o índice de relatórios
    public function index()
    {
        return view('relatorios.index');
    }

    // Método para gerar o relatório de retiradas
    public function relatorioRetiradas(Request $request)
    {
        // Obtendo o período selecionado
        $periodo = $request->input('periodo', 'diario');

        // Gerando o relatório de retiradas
        $retiradas = Saida::join('produtos', 'saidas.id_produto', '=', 'produtos.id')
            ->join('categorias', 'produtos.id_categoria', '=', 'categorias.id')
            ->join('unidades', 'produtos.id_unidade', '=', 'unidades.id')
            ->join('clientes', 'saidas.id_cliente', '=', 'clientes.id')
            ->select('produtos.nome as produto', 'saidas.quantidade', 'unidades.sigla as unidade', 'categorias.nome as categoria', 'clientes.nome as cliente', 'saidas.created_at as data_retirada', 'saidas.valor_total')
            ->whereDate('saidas.created_at', now()) // Filtra as retiradas pelo dia atual (ajuste conforme necessário)
            ->get();

        // Verifique se existem retiradas, caso contrário, envie uma mensagem
        if ($retiradas->isEmpty()) {
            return redirect()->route('relatorios.index')->with('error', 'Nenhuma retirada encontrada para o período selecionado.');
        }

        return view('relatorios.retiradas', compact('retiradas'));
    }
}
