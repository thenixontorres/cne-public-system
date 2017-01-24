<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetitularRequest;
use App\Http\Requests\UpdatetitularRequest;
use App\Repositories\titularRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class titularController extends InfyOmBaseController
{
    /** @var  titularRepository */
    private $titularRepository;

    public function __construct(titularRepository $titularRepo)
    {
        $this->titularRepository = $titularRepo;
    }

    /**
     * Display a listing of the titular.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->titularRepository->pushCriteria(new RequestCriteria($request));
        $titulars = $this->titularRepository->all();

        return view('titulars.index')
            ->with('titulars', $titulars);
    }

    /**
     * Show the form for creating a new titular.
     *
     * @return Response
     */
    public function create()
    {
        return view('titulars.create');
    }

    /**
     * Store a newly created titular in storage.
     *
     * @param CreatetitularRequest $request
     *
     * @return Response
     */
    public function store(CreatetitularRequest $request)
    {
        $input = $request->all();

        $titular = $this->titularRepository->create($input);

        Flash::success('Titular Registrado con exito.');

        return redirect()->back();
    }

    /**
     * Display the specified titular.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $titular = $this->titularRepository->findWithoutFail($id);

        if (empty($titular)) {
            Flash::error('titular not found');

            return redirect(route('titulars.index'));
        }

        return view('titulars.show')->with('titular', $titular);
    }

    /**
     * Show the form for editing the specified titular.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $titular = $this->titularRepository->findWithoutFail($id);

        if (empty($titular)) {
            Flash::error('titular not found');

            return redirect(route('titulars.index'));
        }

        return view('titulars.edit')->with('titular', $titular);
    }

    /**
     * Update the specified titular in storage.
     *
     * @param  int              $id
     * @param UpdatetitularRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetitularRequest $request)
    {
        $titular = $this->titularRepository->findWithoutFail($id);

        if (empty($titular)) {
            Flash::error('titular not found');

            return redirect(route('titulars.index'));
        }

        $titular = $this->titularRepository->update($request->all(), $id);

        Flash::success('titular updated successfully.');

        return redirect(route('titulars.index'));
    }

    /**
     * Remove the specified titular from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $titular = $this->titularRepository->findWithoutFail($id);

        if (empty($titular)) {
            Flash::error('titular not found');

            return redirect(route('titulars.index'));
        }

        $this->titularRepository->delete($id);

        Flash::success('titular deleted successfully.');

        return redirect(route('titulars.index'));
    }
}
