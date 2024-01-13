<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_in_body_records_table.php

public function up()
{
    Schema::create('in_body_records', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->float('weight');
        $table->float('body_fat');
        $table->float('muscle_mass');
        $table->float('metabolic_rate');
        
        // Add these columns
        $table->float('total_body_water')->nullable();
        $table->float('protein')->nullable();
        $table->float('minerals')->nullable();
        $table->float('body_fat_mass')->nullable();
        $table->float('bmi')->nullable();
        $table->float('pbf')->nullable();

        $table->timestamps();
    });
}




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_body_records');
    }
};
