<?php

use App\Models\company;
use App\Models\person;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('product')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(company::class, 'company_id')->nullable()->index();
            $table->foreignIdFor(person::class, 'person_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
