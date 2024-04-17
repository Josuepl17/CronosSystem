<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    private $product;

    public function __construct(Product $product){
    
        $this->product = $product;
    
    }


public function index(Request $request){

    $product = $this->product;

        if ($request->has('coditions')){
            $expressions = explode(';', $request->get('coditions'));
        
            foreach ($expressions as $e){
                $exp = explode('=', $e);
                $product = $product->where($exp[0], $exp[1]);
            }
        
        }
    
        if($request->has('fields')){
        $fields = $request->get('fields');
        $fields = explode(',', $fields);
       
        $product = $product->select($fields)->paginate(2); // metodo paginete substituiu o metodo get 
   
    }
  
 
    return ProductCollection::make($product); // para varios registros

}




public function show($id){
    $products = $this->product->find($id);
   
    return ProductResource::make($products); // para apenas 1 registro
    
}

public function save(Request $request){
    $data = $request->all();
     $this->product->create($data);
     return response()->json($data) ;
    
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
