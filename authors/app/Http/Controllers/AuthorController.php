<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author= Author::all();
        return response()->json([
            'status'=>200,
            'message'=>'success',
            'author'=>$author
        ]);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if($author){
            return response()->json([
                'status'=>200,
                'message'=>'Success',
                'author'=>$author
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Author not found!'
            ]);
        }   
    }

    public function store(Request $request)
    {
        $author = new Author();
        $inputs = $request-> all();
        $author->fill($inputs);
        $author->save();
        return response()->json([
            "status"=>200,
            "message" => "Author has been added successfully!",
            "author" => $author,
        ]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $author = Author::where('id', $id)->first();

        if($author){
            $author->update($inputs);
            return response()->json([
                'status'=>200,
                'message'=>'Author updated successfully!',
                'author'=>$author
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Author not found!'
            ]);
        }
    }

    public function delete($id)
    {
        $author = Author::find($id);
        if($author){
            $author->delete();
            return response()->json([
                'status' =>'200',
                'message' => 'Author has been deleted successfully',
            ]);
        }else{
            return response()->json([
                'status' =>'404',
                'message' => 'Author does not exist',
            ]); 
        }
    }
}
