<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $usuarios = User::orderBy('id','ASC')->paginate(5);
        return view('operaciones', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'area'=> $request->area,
             'employee_number'=> $request->employee_number,
             'address'=> $request->address,
             'email'=> $request->email,
       
         ]);
                 return redirect()->route('operaciones')->with('success', 'Usuario registrado correctamente.');
  
    }

    /**
     * Display the specified resource.
     */
    public function buscar(Request $request)
    {
       $response=[
            "success"=>false,
            "message"=>"hubo un error"
       ];
       if($request->ajax()){
        $data= User::where("nombre","like",$request->name."%")->take()->get();
                    $response=[
                    "success"=>true,
                    "message"=>"Consulta correcta",
                    "data"=> $data
            ];
       }
       return  response()->json($response);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail ($id);
        return view('modificar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeUserRequest $request, string $id)
    {

        // Buscar el usuario
        $User = User::findOrFail($id);

            $User->name = $request->name;
            $User->area= $request->area;
            $User->employee_number= $request->employee_number;
            $User->address= $request->address;
            $User->email= $request->email;
            $User->save();

        return redirect()->route('operaciones')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $post = User::find($id);
            $post->delete();
            return redirect()->route('operaciones')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
