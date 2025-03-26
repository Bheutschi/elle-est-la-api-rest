<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandeResource;
use App\Models\Commande;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CommandeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/commandes",
     *      summary="Liste toutes les commandes",
     *      tags={"Commandes"},
     *      @OA\Response(
     *          response=200,
     *          description="Liste des commandes récupérée avec succès"
     *      )
     *  )
     * Returns list of clients
     */
    public function index()
    {
        return CommandeResource::collection(Commande::all());
    }


    /**
     * @OA\Post(
     *      path="/api/commandes",
     *      summary="Créer une nouvelle commande",
     *      tags={"Commandes"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"total","status"},
     *              @OA\Property(property="total", type="number", format="float", example=99.99),
     *              @OA\Property(property="status", type="string", example="en attente")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Commande créée"
     *      )
     *  )
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'total' => 'required|numeric',
            'status' => 'required|in:En attente,En cours,Expédiée,Annulée',
        ]);

        $commande = Commande::create($data);

        return response()->json([

        'message' => 'Commande créée avec succès',
        'data' => new CommandeResource($commande)

        ], 201);

    }

    /**
     * @OA\Get(
     *     path="/api/commandes/{id}",
     *     summary="Récupère une commande par son ID",
     *     tags={"Commandes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la commande",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid", example="6d4acb24-e4e4-33bd-a667-677794a653af")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Commande trouvée"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Commande non trouvée"
     *     )
     * )
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        return response()->json([
            'message' => 'Commande récupérée avec succès',
            'data' => new CommandeResource($commande)
        ]);

    }


    /**
     * @OA\Put(
     *      path="/api/commandes/{id}",
     *      summary="Met à jour une commande existante",
     *      tags={"Commandes"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID de la commande à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="string", format="uuid", example="6d4acb24-e4e4-33bd-a667-677794a653af")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"total", "status", "date_commande"},
     *              @OA\Property(property="total", type="number", format="float", example=129.99),
     *              @OA\Property(property="status", type="string", example="Expédiée"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Commande mise à jour avec succès"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Données invalides"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Commande non trouvée"
     *      )
     *  )
     * /
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $data = $request->validate([
            'total' => 'required|numeric',
            'status' => 'required|in:En attente,En cours,Expédiée,Annulée',
        ]);

        $commande->update($data);

        return new CommandeResource($commande);
    }

    /**
     * @OA\Delete(
     *      path="/api/commandes/{id}",
     *      summary="Supprime une commande",
     *      tags={"Commandes"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID de la commande à supprimer",
     *          required=true,
     *          @OA\Schema(type="string", format="uuid", example="6d4acb24-e4e4-33bd-a667-677794a653af")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Commande supprimée avec succès"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Commande non trouvée"
     *      )
     *  )
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();

        return response()->json([
            'message' => 'Commande supprimée avec succès'
        ]);
    }
}
