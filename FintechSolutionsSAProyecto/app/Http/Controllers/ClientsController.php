<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $clients = Client::all();
            return response()->json(['success' => true, 'data' => $clients, 'count' => $clients->count()], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to retrieve clients'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'rut' => 'required|string|max:12|unique:clients',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|string|email|max:100|unique:clients',
                'phone_number' => 'nullable|string|max:20'
            ]);

            $client = Client::create($validated);

            return response()->json(['success' => true, 'message' => 'Cliente creado exitosamente', 'data' => $client], 200);

        } catch (QueryException $e) {
            if ($e->getCode() === 23000) {
                return response()->json(['success' => false, 'message' => 'El RUT o el correo electrónico ya existe'], 409);
            }

        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json(['success' => false, 'message' => 'Error de validación', 'errors' => $ve->errors()], 422);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $client = Client::findOrFail($id);

            return response()->json(['success' => true, 'data' => $client], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Cliente no encontrado'], 404);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $client = Client::findOrFail($id);

            if (!$client) {
                return response()->json(['success' => false, 'message' => 'Cliente no encontrado'], 404);
            }

            $validated = $request->validate([
                'rut' => 'sometimes|required|string|max:12|unique:clients,rut,' . $id,
                'first_name' => 'sometimes|required|string|max:50',
                'last_name' => 'sometimes|required|string|max:50',
                'email' => 'sometimes|required|string|email|max:100|unique:clients,email,' . $id,
                'phone_number' => 'nullable|string|max:20'
            ]);

            $client->update($validated);

            return response()->json(['success' => true, 'message' => 'Cliente actualizado exitosamente', 'data' => $client], 200);

        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json(['success' => false, 'message' => 'Error de validación', 'errors' => $ve->errors()], 422);


        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $client = Client::findOrFail($id);

            if (!$client) {
                return response()->json(['success' => false, 'message' => 'Cliente no encontrado'], 404);
            }

            $client->delete();

            return response()->json(['success' => true, 'message' => 'Cliente eliminado exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }
}
