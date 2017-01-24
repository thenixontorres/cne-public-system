<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetipoactaRequest;
use App\Http\Requests\UpdatetipoactaRequest;
use App\Repositories\tipoactaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\solicitud;
use App\Models\tipoacta;

class tipoactaController extends InfyOmBaseController
{
    /** @var  tipoactaRepository */
    private $tipoactaRepository;

    public function __construct(tipoactaRepository $tipoactaRepo)
    {
        $this->tipoactaRepository = $tipoactaRepo;
    }

    /**
     * Display a listing of the tipoacta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoactaRepository->pushCriteria(new RequestCriteria($request));
        $tipoactas = $this->tipoactaRepository->all();

        return view('tipoactas.index')
            ->with('tipoactas', $tipoactas);
    }

    /**
     * Show the form for creating a new tipoacta.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoactas.create');
    }

    /**
     * Store a newly created tipoacta in storage.
     *
     * @param CreatetipoactaRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoactaRequest $request)
    {
        $input = $request->all();

        $tipoacta = $this->tipoactaRepository->create($input);

        Flash::success('Tipo de acta guardada con exito.');

        return redirect(route('tipoactas.index'));
    }

    /**
     * Display the specified tipoacta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoacta = $this->tipoactaRepository->findWithoutFail($id);

        if (empty($tipoacta)) {
            Flash::error('Tipo de acta not found');

            return redirect(route('tipoactas.index'));
        }

        return view('tipoactas.show')->with('tipoacta', $tipoacta);
    }

    /**
     * Show the form for editing the specified tipoacta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoacta = $this->tipoactaRepository->findWithoutFail($id);

        if (empty($tipoacta)) {
            Flash::error('Tipo de acta no encontrada.');

            return redirect(route('tipoactas.index'));
        }

        return view('tipoactas.edit')->with('tipoacta', $tipoacta);
    }

    /**
     * Update the specified tipoacta in storage.
     *
     * @param  int              $id
     * @param UpdatetipoactaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoactaRequest $request)
    {
        $tipoacta = $this->tipoactaRepository->findWithoutFail($id);

        if (empty($tipoacta)) {
            Flash::error('Tipo de acta no encontrada.');

            return redirect(route('tipoactas.index'));
        }

        $tipoacta = $this->tipoactaRepository->update($request->all(), $id);

        Flash::success('Tipo de acta actualizada con exito.');

        return redirect(route('tipoactas.index'));
    }

    /**
     * Remove the specified tipoacta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoacta = $this->tipoactaRepository->findWithoutFail($id);

        if (empty($tipoacta)) {
            Flash::error('Tipo de acta no encontrada.');

            return redirect(route('tipoactas.index'));
        }

        $solicituds = solicitud::where('tipoacta_id',$tipoacta->id)->get();
        $count = count($solicituds);
        
        if ($count == '0'){
            $this->tipoactaRepository->delete($id);
            Flash::success('Tipo de acta eliminado con exito.');
            return redirect(route('tipoactas.index'));
        }else{
            Flash::error('No se puede borrar el tipo de acta mientras tenga solicitudes asociadas.');
            return redirect(route('tipoactas.index'));            
        }
    }
}
