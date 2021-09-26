<?php

namespace Tests\Unit;

use App\Models\OfferClaim;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Auth;

class OfferClaimUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    /**
     * Offer claim list test
     *
     * @return void
     */
    public function atest_it_can_list_all_offer_claims(){

        $users = factory(User::class,5)->create();

        factory(OfferClaim::class,2)->create([
            'action_taken_by' => 1
        ]);

        factory(OfferClaim::class)->create([
            'action_taken_by' => 2
        ]);

        $offer_claim_list = new OfferClaim();
        $offer_claim_data = $offer_claim_list->listOfferClaims();

        $offer_claims = json_decode($offer_claim_data->getContent())->data;
       
        $users_list = $users->pluck('name')->toArray();
        $this->assertCount(3, $offer_claims);


        foreach ($offer_claims as $key => $offer_claim){
            $this->assertEquals(in_array(htmlspecialchars_decode($offer_claim->name,ENT_QUOTES),$users_list),true);
        }
    }  

    /**
     * offer claim data store test
     *
     * @return void
     */
    public function test_it_can_store_offer_claim_form_data(){
        $invoices = [
            UploadedFile::fake()->create('doc.pdf'),
            UploadedFile::fake()->create('image.png')
        ];
        $offer_claim = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'address1' => $this->faker->address,
            'address2' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'vat_no' => $this->faker->postcode,
            'invoice' => $invoices,
            'acc_owner' => $this->faker->name,
            'iban' => $this->faker->iban,
            'bank_name' => $this->faker->name,
            'is_dell_partner' => 1,
            'permission_to_contact' => 1,
            'privacy' => 1,
            'terms' => 1,
        ];

        $offer_claim = (object)$offer_claim;

        $offerClaimModel = new OfferClaim();
        $storeOfferClaim = $offerClaimModel->storeClaimOffer($offer_claim);

        $this->assertEquals($storeOfferClaim->first_name, $offer_claim->first_name);
        $this->assertEquals($storeOfferClaim->last_name, $offer_claim->last_name);
        $this->assertEquals($storeOfferClaim->email, $offer_claim->email);
        $this->assertEquals($storeOfferClaim->address1, $offer_claim->address1);
        $this->assertEquals($storeOfferClaim->address2, $offer_claim->address2);
        $this->assertEquals($storeOfferClaim->postal_code, $offer_claim->postal_code);
        $this->assertEquals($storeOfferClaim->city, $offer_claim->city);
        $this->assertEquals($storeOfferClaim->vat_no, $offer_claim->vat_no);
        $this->assertEquals($storeOfferClaim->account_owner, $offer_claim->acc_owner);
        $this->assertEquals($storeOfferClaim->iban, $offer_claim->iban);
        $this->assertEquals($storeOfferClaim->bank, $offer_claim->bank_name);
        $this->assertEquals($storeOfferClaim->is_dell_partner, $offer_claim->is_dell_partner);
        $this->assertEquals($storeOfferClaim->permission_to_contact, $offer_claim->permission_to_contact);
        $this->assertEquals($storeOfferClaim->privacy_policy, $offer_claim->privacy);
        $this->assertEquals($storeOfferClaim->terms_condition, $offer_claim->terms);
        $this->assertEquals($storeOfferClaim->status, 'pending');

    }

    /**
     * offer claim detail test
     *
     */
    public function test_it_can_return_the_offer_claim_detail_data()
    {
        $user = factory(User::class)->create();
        $offer_claim = factory(OfferClaim::class)->create([
            'action_taken_by' => 1
        ]);
        
        $offer_claim_detail = $offer_claim->getOfferClaim();
        $this->assertEquals($user->name, $offer_claim_detail['name']);
    }

    /**
     * test claim request status change into approved
     *
     * @return void
     */
    public function test_it_can_change_claim_request_status_into_approved()
    {
        $user = factory(User::class)->create();
        Auth::login($user);

        $offer_claim = factory(OfferClaim::class)->create();
        $status = 'approved';
        $offer_claim->changeClaimRequestStatus($status);

        $this->assertEquals($offer_claim->status, $status);
        $this->assertEquals($offer_claim->action_taken_by, $user->id);
        $this->assertEquals($offer_claim->disapprove_reason, NULL);
    }

    /**
     * test claim request status change into disapproved
     *
     * @return void
     */
    public function test_it_can_change_claim_request_status_into_disapproved()
    {
        $user = factory(User::class)->create();
        Auth::login($user);

        $offer_claim = factory(OfferClaim::class)->create();
        $status = 'disapproved';
        $reason = 'Disapproved Reason';
        $offer_claim->changeClaimRequestStatus($status, $reason);

        $this->assertEquals($offer_claim->status, $status);
        $this->assertEquals($offer_claim->action_taken_by, $user->id);
        $this->assertEquals($offer_claim->disapprove_reason, $reason);
    }    
}
 