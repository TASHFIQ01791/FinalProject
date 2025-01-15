<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bids', function (Blueprint $table) {
            if (!Schema::hasColumn('bids', 'status')) {
                $table->tinyInteger('status')->default(1)->after('bid_amount');
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'winner_id')) {
                $table->foreignId('winner_id')->nullable()->constrained('users')->onDelete('set null')->after('bid_end_datetime');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bids', function (Blueprint $table) {
            if (Schema::hasColumn('bids', 'status')) {
                $table->dropColumn('status');
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'winner_id')) {
                $table->dropForeign(['winner_id']);
                $table->dropColumn('winner_id');
            }
        });
    }
};
