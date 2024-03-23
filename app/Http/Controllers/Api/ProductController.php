<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    private $product;

    public function __construct(Product $product){
    
        $this->product = $product;
    
    }


public function index(){
    $products = Product::all();
    
    return response()->json($products) ;
}

public function show($id){
    $products = $this->product->find($id);
   

    return response()->json($products) ;
}

public function save(Request $request){
    $data = $request->all();
     $this->product->create($data);

    
}

public function update(Request $request){
    $data = $request->all(); // pega todos os dados da requisição 
    $product = $this->product->find($data['id']); // procura no banco pelos dado do ID recebido na variavel $data
    $product->update($data); // atualiza a model com os dados recebidos
    return response()->json($product); // retorna o item atualizado em json
}

public function delete($id){
    $product = $this->product->find($id);
    $product->delete();
    return response()->json($product) ;
}




}
