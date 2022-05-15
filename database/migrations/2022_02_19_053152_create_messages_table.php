<?php

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("subject");
            $table->text("message");
            $table->string("file")->nullable();
            $table->enum("type",["single","all"])->default("all");
            $table->timestamps();
        });

        Schema::create('message_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained("users","id")->onDelete("cascade");
            $table->foreignIdFor(Message::class)->constrained("messages","id")->onDelete("cascade");
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
        Schema::dropIfExists('messages');
    }
}
