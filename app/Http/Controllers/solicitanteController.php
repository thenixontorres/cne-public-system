<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatesolicitanteRequest;
use App\Http\Requests\UpdatesolicitanteRequest;
use App\Repositories\solicitanteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class solicitanteController extends InfyOmBaseController
{
    /** @var  solicitanteRepository */
    private $solicitanteRepository;

    public function __construct(solicitanteRepository $solicitanteRepo)
    {
        $this->solicitanteRepository = $solicitanteRepo;
    }

    /**
     * Display a listing of the solicitante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->solicitanteRepository->pushCriteria(new RequestCriteria($request));
        $solicitantes = $this->solicitanteRepository->all();

        return view('solicitantes.index')
            ->with('solicitantes', $solicitantes);
    }

    /**
     * Show the form for creating a new solicitante.
     *
     * @return Response
     */
    public function create()
    {
        return view('solicitantes.create');
    }

    /**
     * Store a newly created solicitante in storage.
     *
     * @param CreatesolicitanteRequest $request
     *
     * @return Response
     */
    public function store(CreatesolicitanteRequest $request)
    {
        $input = $request->all();

        $solicitante = $this->solicitanteRepository->create($input);

        Flash::success('solicitante saved successfully.');

        return redirect(route('solicitantes.index'));
    }

    /**
     * Display the specified solicitante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $solicitante = $this->solicitanteRepository->findWithoutFail($id);

        if (empty($solicitante)) {
            Flash::error('solicitante not found');

            return redirect(route('solicitantes.index'));
        }

        return view('solicitantes.show')->with('solicitante', $solicitante);
    }

    /**
     * Show the form for editing the specified solicitante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $solicitante = $this->solicitanteRepository->findWithoutFail($id);

        if (empty($solicitante)) {
            Flash::error('solicitante not found');

            return redirect(route('solicitantes.index'));
        }

        return view('solicitantes.edit')->with('solicitante', $solicitante);
    }

    /**
     * Update the specified solicitante in storage.
     *
     * @param  int              $id
     * @param UpdatesolicitanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesolicitanteRequest $request)
    {
        $solicitante = $this->solicitanteRepository->findWithoutFail($id);

        if (empty($solicitante)) {
            Flash::error('solicitante not found');

            return redirect(route('solicitantes.index'));
        }

        $solicitante = $this->solicitanteRepository->update($request->all(), $id);

        Flash::success('solicitante updated successfully.');

        return redirect(route('solicitantes.index'));
    }

    /**
     * Remove the specified solicitante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $solicitante = $this->solicitanteRepository->findWithoutFail($id);

        if (empty($solicitante)) {
            Flash::error('solicitante not found');

            return redirect(route('solicitantes.index'));
        }

        $this->solicitanteRepository->delete($id);

        Flash::success('solicitante deleted successfully.');

        return redirect(route('solicitantes.index'));
    }
}
