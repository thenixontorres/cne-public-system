<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereceptorRequest;
use App\Http\Requests\UpdatereceptorRequest;
use App\Repositories\receptorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\solicitud;
use App\Models\receptor;


class receptorController extends InfyOmBaseController
{
    /** @var  receptorRepository */
    private $receptorRepository;

    public function __construct(receptorRepository $receptorRepo)
    {
        $this->receptorRepository = $receptorRepo;
    }

    /**
     * Display a listing of the receptor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->receptorRepository->pushCriteria(new RequestCriteria($request));
        $receptors = $this->receptorRepository->all();

        return view('receptors.index')
            ->with('receptors', $receptors);
    }

    /**
     * Show the form for creating a new receptor.
     *
     * @return Response
     */
    public function create()
    {
        return view('receptors.create');
    }

    /**
     * Store a newly created receptor in storage.
     *
     * @param CreatereceptorRequest $request
     *
     * @return Response
     */
    public function store(CreatereceptorRequest $request)
    {
        $input = $request->all();

        $receptor = $this->receptorRepository->create($input);

        Flash::success('Receptor registrado con exito.');

        return redirect(route('receptors.index'));
    }

    /**
     * Display the specified receptor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $receptor = $this->receptorRepository->findWithoutFail($id);

        if (empty($receptor)) {
            Flash::error('receptor not found');

            return redirect(route('receptors.index'));
        }

        return view('receptors.show')->with('receptor', $receptor);
    }

    /**
     * Show the form for editing the specified receptor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receptor = $this->receptorRepository->findWithoutFail($id);

        if (empty($receptor)) {
            Flash::error('Receptor no encontrado.');

            return redirect(route('receptors.index'));
        }

        return view('receptors.edit')->with('receptor', $receptor);
    }

    /**
     * Update the specified receptor in storage.
     *
     * @param  int              $id
     * @param UpdatereceptorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereceptorRequest $request)
    {
        $receptor = $this->receptorRepository->findWithoutFail($id);

        if (empty($receptor)) {
            Flash::error('Receptor no encntrado.');

            return redirect(route('receptors.index'));
        }

        $receptor = $this->receptorRepository->update($request->all(), $id);

        Flash::success('Receptor actualizado con exito.');

        return redirect(route('receptors.index'));
    }

    /**
     * Remove the specified receptor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $receptor = $this->receptorRepository->findWithoutFail($id);

        if (empty($receptor)) {
            Flash::error('Receptor no encontrado');

            return redirect(route('receptors.index'));
        }

        $solicituds = solicitud::where('receptor_id',$receptor->id)->get();
        $count = count($solicituds);
        
        if ($count == '0'){
            $this->receptorRepository->delete($id);
            Flash::success('receptor eliminado con exito.');
            return redirect(route('receptors.index'));
        }else{
            Flash::error('No se puede borrar el receptor mientras tenga solicitudes asociadas.');
            return redirect(route('receptors.index'));            
        }
   
    }
}
