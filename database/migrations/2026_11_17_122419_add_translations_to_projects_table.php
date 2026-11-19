<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add new JSON columns
        Schema::table('projects', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('id');
            $table->json('description_translations')->nullable()->after('title_translations');
        });

        // Migrate existing data
        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            DB::table('projects')
                ->where('id', $project->id)
                ->update([
                    'title_translations' => json_encode(['en' => $project->title]),
                    'description_translations' => json_encode(['en' => $project->description]),
                ]);
        }

        // Drop old columns
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });

        // Rename new columns
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('title_translations', 'title');
            $table->renameColumn('description_translations', 'description');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('description')->nullable();
        });

        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            $title = json_decode($project->title, true);
            $description = json_decode($project->description, true);
            DB::table('projects')
                ->where('id', $project->id)
                ->update([
                    'title' => $title['en'] ?? '',
                    'description' => $description['en'] ?? '',
                ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('title', 'title');
            $table->renameColumn('description', 'description');
        });
    }
};