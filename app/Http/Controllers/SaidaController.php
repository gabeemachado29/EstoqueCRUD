<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Saida;
use App\Models\Cliente;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function create(Produto $produto)
    {
        $clientes = Cliente::all();
        return view('saidas.create', compact('produto','clientes'));
    }

    public function store(Request $request, Produto $produto)
    {
        // Validar os dados recebidos do formulário
        $request->validate([
            'quantidade' => 'required|integer|min:1|max:' . $produto->estoque,
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        // Calcular o valor total baseado na quantidade e no valor unitário
        $valor_total = $request->quantidade * $produto->valor_unitario;

        // Criar a saída
        $saida = new Saida();
        $saida->quantidade = $request->quantidade;
        $saida->valor_total = $valor_total;
        $saida->id_produto = $produto->id;
        $saida->id_cliente = $request->id_cliente;
        $saida->save();

        // Atualizar o estoque do produto
        $produto->estoque -= $request->quantidade;
        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Baixa realizada com sucesso!');
    }
}

