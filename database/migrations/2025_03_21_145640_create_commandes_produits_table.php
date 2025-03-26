<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes_produits', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->uuid('produit_id');
            $table->integer('quantite')->nullable(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_produits');
    }
};
