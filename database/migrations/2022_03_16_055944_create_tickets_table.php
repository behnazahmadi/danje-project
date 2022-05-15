<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");
            $table->foreignIdFor(\App\Models\User::class)->constrained("users","id")
            ->onDelete("cascade");
            $table->enum("status",['Answered','Pending','Closed'])->default("Pending");
            $table->string("topic");
            $table->enum("importance",["normal","high","low"])->default("normal");
            $table->string("file")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
