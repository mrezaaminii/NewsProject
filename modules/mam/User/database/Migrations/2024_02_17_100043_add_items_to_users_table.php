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
            $table->text('imageName')->nullable()->after('email');
            $table->text('imagePath')->nullable()->after('imageName');
            $table->string('linkedin')->nullable()->unique()->after('imagePath');
            $table->string('telegram')->nullable()->unique()->after('linkedin');
            $table->string('instagram')->nullable()->unique()->after('telegram');
            $table->string('twitter')->nullable()->unique()->after('instagram');
            $table->text('bio')->nullable()->after('twitter');
            $table->enum('status',\mam\User\Models\User::$statuses)
                ->default(\mam\User\Models\User::STATUS_ACTIVE)->after('twitter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('imageName');
            $table->dropColumn('imagePath');
            $table->dropColumn('linkedin');
            $table->dropColumn('telegram');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('bio');
            $table->dropColumn('status');
        });
    }
};
