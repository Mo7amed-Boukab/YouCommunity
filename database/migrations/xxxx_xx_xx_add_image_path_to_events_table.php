<?php 

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class AddImagePathToEventsTable extends Migration
  {
      public function up()
      {
          Schema::table('events', function (Blueprint $table) {
              $table->string('image_path')->nullable()->after('max_participation');
          });
      }

      public function down()
      {
          Schema::table('events', function (Blueprint $table) {
              $table->dropColumn('image_path');
          });
      }
  } 