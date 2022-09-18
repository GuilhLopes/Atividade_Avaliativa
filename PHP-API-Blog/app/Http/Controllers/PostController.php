<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    //Mostar postagens
   public function index(Request $request)
   {
    return Post::all();
   }

   //Criar postagem
   public function store(Request $request)
   {
       $postagem = new Post;

       $postagem->usuario = $request->usuario;
       $postagem->titulo = $request->titulo;
       $postagem->descricao = $request->descricao;

       $postagem->save();

       return response()->json([
        "message" => "Post Feito com sucesso"
       ], 200);
   }

   //Mostar UM postagem
   public function show(Request $request, $id)
   {
        if(Post::where('id',$id)->exists()){

            return Post::find($id);

        }else{

            return response()->json([
                "message" => "Post não encontrado"
            ], 404);

        }
   }

   //Editar postagem
   public function edit(Request $request, $id)
   {
        if(Post::where('id',$id)->exists()){

            $postagem = Post::find($id);

            $postagem->usuario = $request->usuario;
            $postagem->titulo = $request->titulo;
            $postagem->descricao = $request->descricao;

            $postagem->save();

            return response()->json([
                "message" => "Post foi editado"
            ], 200);

       }else{

            return response()->json([
               "message" => "Post não encontrado"
            ], 404);

       }
   }

   //Apagar postagem
   public function destroy(Request $request, $id)
   {

        if(Post::where('id',$id)->exists()){

            $postagem = Post::find($id);

            $postagem->comment()->delete();
            $postagem->delete();

            return response()->json([
                "message" => "Post deletado com sucesso"
            ], 200);

        }else{

            return response()->json([
                "message" => "Post não encontrado"
             ], 404);

        }
   }
}
