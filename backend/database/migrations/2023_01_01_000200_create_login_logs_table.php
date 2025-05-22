<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->boolean('successful');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_logs');
    }
};
