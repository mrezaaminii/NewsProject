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
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->text('imageName')->nullable()->after('email');
            $table->text('imagePath')->nullable()->after('imageName');
            $table->string('linkedin')->nullable()->unique()->after('imagePath');
            $table->string('telegram')->nullable()->unique()->after('linkedin');
            $table->string('instagram')->nullable()->unique()->after('telegram');
            $table->string('twitter')->nullable()->unique()->after('instagram');
            $table->enum('status',\mam\User\Models\User::$statuses)->after('twitter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('imageName');
            $table->dropColumn('imagePath');
            $table->dropColumn('linkedin');
            $table->dropColumn('telegram');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('status');
        });
    }
};
