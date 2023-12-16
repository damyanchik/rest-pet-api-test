<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\PetApiExceptionHandler;
use App\Http\Requests\PetApiRequest;
use App\Services\PetApiService;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PetApiController extends Controller
{
    public function __construct(
        protected PetApiService $petApiService
    )
    {
    }

    public function index(): object
    {
        return view('index');
    }

    public function show(Request $request): object
    {
        try {
            $validatedId = $request->validate([
                'id' => 'required|integer'
            ]);

            $response = $this->petApiService->get('pet/'.$validatedId['id']);

            $pet = json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            Log::error('Error w zapytaniu GET do PETAPI: ' . $e->getMessage());

            return PetApiExceptionHandler::handle($e);
        }

        return view('show', ['pet' => $pet]);
    }

    public function create(): object
    {
        return view('create');
    }

    public function store(PetApiRequest $request): object
    {
        try {
            $validatedData = $request->validated();
            $this->petApiService->processTagsAndPhotoUrls($validatedData);
            $response = $this->petApiService->post('pet', $validatedData);
            $postedData = json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            Log::error('Error w zapytaniu POST do PETAPI: ' . $e->getMessage());

            return PetApiExceptionHandler::handle($e);
        }

        return redirect()->route('petIndex')->with('success', 'Utworzono pupila o id '.$postedData['id']);
    }

    public function edit(int $id): object
    {
        try {
            $response = $this->petApiService->get('pet/'.$id);
            $pet = json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            Log::error('Error w zapytaniu GET do PETAPI: ' . $e->getMessage());

            return PetApiExceptionHandler::handle($e);
        }

        return view('edit', ['pet' => $pet]);
    }

    public function update(PetApiRequest $request, int $id): object
    {
        try {
            $validatedData = $request->validated();
            $validatedData['id'] = $id;
            $this->petApiService->processTagsAndPhotoUrls($validatedData);
            $this->petApiService->put('pet', $validatedData);
        } catch (RequestException $e) {
            Log::error('Error w zapytaniu PUT do PETAPI: ' . $e->getMessage());

            return PetApiExceptionHandler::handle($e);
        }

        return redirect()->route('petShow', $id);
    }

    public function destroy(int $id): object
    {
        try {
            $this->petApiService->destroy('pet/'.$id);
        } catch (RequestException $e) {
            Log::error('Error w zapytaniu DESTROY do PETAPI: ' . $e->getMessage());

            return PetApiExceptionHandler::handle($e);
        }
        return redirect()->route('petIndex', $id)->with('error', 'Usunięto pupila o id '.$id);
    }
}
