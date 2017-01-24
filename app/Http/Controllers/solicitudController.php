<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatesolicitudRequest;
use App\Http\Requests\UpdatesolicitudRequest;
use App\Repositories\solicitudRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\Auth;
use App\Models\titular;
use App\Models\receptor;
use App\Models\solicitante;
use App\Models\tipoacta;
use App\Models\solicitud;
use App\User;




class solicitudController extends InfyOmBaseController
{
    /** @var  solicitudRepository */
    private $solicitudRepository;

    public function __construct(solicitudRepository $solicitudRepo)
    {
        $this->solicitudRepository = $solicitudRepo;
    }

    /**
     * Display a listing of the solicitud.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->solicitudRepository->pushCriteria(new RequestCriteria($request));
        $solicituds = $this->solicitudRepository->all();

        return view('solicituds.index')
            ->with('solicituds', $solicituds);
    }

    /**
     * Show the form for creating a new solicitud.
     *
     * @return Response
     */
    public function create()
    {   
        $receptors = receptor::all();
        $tipoactas = tipoacta::all(); 

        return view('solicituds.create')
        ->with('receptors',$receptors)
        ->with('tipoactas',$tipoactas);
        
    }

    /**
     * Store a newly created solicitud in storage.
     *
     * @param CreatesolicitudRequest $request
     *
     * @return Response
     */
    public function store(CreatesolicitudRequest $request)
    {
        $input = $request->all();

        $titular = new titular();
        $titular->nombres = $request->tnombres;
        $titular->apellidos = $request->tapellidos;
        $titular->cedula = $request->tcedula;
        $titular->save();
        $titular_id = $titular->id;

        $solicitante = new solicitante();
        $solicitante->nombre = $request->snombre;
        $solicitante->apellido = $request->sapellido;
        $solicitante->cedula = $request->scedula;
        $solicitante->telefono = $request->telefono;
        $solicitante->email = $request->email;
        $solicitante->save();
        $solicitante_id = $solicitante->id;

        $solicitud = new solicitud();
        $solicitud->titular_id = $titular_id;
         $solicitud->tipoacta_id = $request->tipoacta_id;
        $solicitud->numero_acta = $request->numero_acta;
        $solicitud->fecha_acta = $request->fecha_acta; 
        $solicitud->receptor_id = $request->receptor_id;
        $solicitud->solicitante_id = $solicitante_id;
         $solicitud->solicitado_a = $request->solicitado_a;
        $solicitud->fecha_solicitud = $request->fecha_solicitud;
        $solicitud->via = $request->via;
        $solicitud->recibido = $request->recibido;
        $solicitud->estatus_tramite = $request->estatus_tramite;
        $solicitud->responsable_id = $request->responsable_id;
        $solicitud->save();

        Flash::success('Solicitud registrada con exito.');

        return redirect(route('solicituds.index'));
    }

    /**
     * Display the specified solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $solicitud = $this->solicitudRepository->findWithoutFail($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrada.');

            return redirect(route('solicituds.index'));
        }

        return view('solicituds.show')->with('solicitud', $solicitud);
    }

    /**
     * Show the form for editing the specified solicitud.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receptors = receptor::all();
        $tipoactas = tipoacta::all();
        $estatus = array("Enviado", "Recibido","Concluido","Otros");
        $vias = array("Memo", "Of","Web","WA");
        $solicitud = $this->solicitudRepository->findWithoutFail($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrada.');

            return redirect(route('solicituds.index'));
        }

        return view('solicituds.edit')
        ->with('estatus', $estatus)
        ->with('vias', $vias)
        ->with('solicitud', $solicitud)
        ->with('receptors',$receptors)
        ->with('tipoactas',$tipoactas);
    }

    /**
     * Update the specified solicitud in storage.
     *
     * @param  int              $id
     * @param UpdatesolicitudRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesolicitudRequest $request)
    {
        $solicitud = $this->solicitudRepository->findWithoutFail($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrada');

            return redirect(route('solicituds.index'));
        }

        $titular = titular::where('id', $request->titular_id)->get();
        $titular = $titular->first();
        $titular->nombres = $request->tnombres;
        $titular->apellidos = $request->tapellidos;
        $titular->cedula = $request->tcedula;
        $titular->save();
        
        $solicitante = solicitante::where('id', $request->solicitante_id)->get();
        $solicitante = $solicitante->first();
        $solicitante->nombre = $request->snombre;
        $solicitante->apellido = $request->sapellido;
        $solicitante->cedula = $request->scedula;
        $solicitante->telefono = $request->telefono;
        $solicitante->email = $request->email;
        $solicitante->save();

        $solicitud = $this->solicitudRepository->update($request->all(), $id);

        Flash::success('Solicitud actualizada con exito.');

        return redirect(route('solicituds.index'));
    }

    /**
     * Remove the specified solicitud from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $solicitud = $this->solicitudRepository->findWithoutFail($id);

        if (empty($solicitud)) {
            Flash::error('Solicitud no encontrada.');

            return redirect(route('solicituds.index'));
        }

        $titular = titular::where('id', $solicitud->titular_id)->get();
        $titular = $titular->first();
        $titular->delete();

        $solicitante = solicitante::where('id', $solicitud->solicitante_id)->get();
        $solicitante = $solicitante->first();
        $solicitante->delete();

        $this->solicitudRepository->delete($id);

        Flash::success('Solicitud borrada con exito.');

        return redirect(route('solicituds.index'));
    }
}
