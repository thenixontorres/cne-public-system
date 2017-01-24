<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Flash;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\Models\solicitud;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        
        $emails = User::where('email',$request->email)->get();
        $count = count($emails);
        
        if ($count > '0'){
            Flash::error('Error, el correo ya existe.');
            return redirect()->route('users.create');
        }

        $cedula = User::where('cedula',$request->cedula)->get();
        $count = count($cedula);
        
        if ($count > '0'){
            Flash::error('Error, la cedula ya existe.');
            return redirect()->route('users.create');
        }

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->cedula = $request->cedula;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = "Normal";
        $user->save();
 
        Flash::success('Usuario registrado con exito');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userEditRequest $request, $id)
    {
        
        $user = User::find($id);

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->cedula = $request->cedula;
        $user->email = $request->email;
        $user->save();

        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Flash::success('Usuario actualizado con exito.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicituds = solicitud::where('responsable_id',$id)->get();
        $count = count($solicituds);
            if ($count == '0'){
                $user = User::find($id);
                $user->delete();
                Flash::success('Usuario eliminado con exito');
                return redirect()->route('users.index');
            }else{
            Flash::error('No se puede borrar el usuario mientras tenga solicitudes asociadas.');
            return redirect(route('users.index'));            
        }  
    }
}
