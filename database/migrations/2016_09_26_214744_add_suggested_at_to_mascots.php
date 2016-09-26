<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestedAtToMascots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mascots', function (Blueprint $table) {
            $table->timestamp('suggested_at')->nullable()->after('popularity');
            $table->string('suggested_by_ip')->nullable()->after('suggested_at');
            $table->timestamp('approved_at')->nullable()->after('suggested_by_ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mascots', function (Blueprint $table) {
            $table->dropColumn(['suggested_at', 'suggested_by_ip', 'approved_at']);
        });
    }
}
