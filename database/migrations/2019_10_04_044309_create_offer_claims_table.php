<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('vat_no')->nullable();
            $table->boolean('is_dell_partner');
            $table->text('invoice')->nullable();
            $table->string('status')->nullable();
            $table->string('account_owner')->nullable();
            $table->string('iban')->nullable();
            $table->string('bank')->nullable();
            $table->boolean('privacy_policy')->default('0');
            $table->boolean('terms_condition')->default('0');
            $table->boolean('permission_to_contact');
            $table->integer('action_taken_by')->nullable();
            $table->text('disapprove_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_claims');
    }
}
