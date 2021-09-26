<?php

namespace Tests\Feature;

use App\Mail\ClaimApprovedUser;
use App\Mail\ClaimRejectedUser;
use App\Mail\ClaimSavedUser;
use App\Mail\OfferClaimStatusAdmin;
use App\Models\OfferClaim;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;

class OfferClaimFeatureTest extends TestCase
{
    protected $user;

    /**
     * Set up the test
     */
    public function setUp() :void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Test offer claim data list from user with role super-admin
     *
     * @return void
     */
    public function test_it_can_return_offer_claim_data_with_user_role_super_admin(){

        $response = $this->actingAs($this->user)->get(route('offer-claims.index'));
        $response->assertStatus(200);
        $response->assertViewIs('offer-claim.list');
    }

     /**
     * Test offer claim data list from user with role admin
     *
     * @return void
     */
    public function test_it_can_return_offer_claim_data_with_user_role_admin(){

        $response = $this->actingAs($this->user)->get(route('offer-claims.index'));
        $response->assertStatus(200);
        $response->assertViewIs('offer-claim.list');
    }

     /**
     * Test offer claim data list if user isnot logged in
     */
    public function test_it_cannot_return_offer_claim_data_if_user_is_not_logged_in(){
        $response = $this->get(route('offer-claims.index'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * Store offer claim data test
     *
     * @return void
     */
    public function test_it_can_store_offer_claim_form_data(){

        $users = factory(User::class,5)->create([
            'role' => 'admin'
        ]);

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

        $response = $this->post(route('offer-claims.store'),$offer_claim);
        Mail::assertSent(ClaimSavedUser::class, 1);
        Mail::assertSent(OfferClaimStatusAdmin::class, 1);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('submitted', true);
    }

    /**
     * Show Offer Claim test
     *
     * @return void
     */
    public function test_it_can_show_offer_claim(){

        $offer_claim = factory(OfferClaim::class)->create();

        $response = $this->actingAs($this->user)->get(route('offer-claims.show',$offer_claim->id));
        $response->assertStatus(200);
        $response->assertViewIs('offer-claim.detail');
    }  
    
    /**
     * Offer claim request approve test
     *
     * @return void
     */
    public function test_it_can_approve_offer_claim_request(){

        $user = factory(User::class,2)->create([
            'role' => 'admin'
        ]);

        $offer_claim = factory(OfferClaim::class)->create();

        $response = $this->actingAs($this->user)->post(route('offer-claims.approve',$offer_claim->id));

        Mail::assertSent(ClaimApprovedUser::class, 1);
        Mail::assertSent(OfferClaimStatusAdmin::class, 1);

        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
        $response->assertSessionHas('message', 'Offer Claim Approved');

    }

    /**
     * Offer claim request disapprove test
     *
     * @return void
     */
    public function test_it_can_disapprove_offer_claim_request(){

        $user = factory(User::class,2)->create([
            'role' => 'admin'
        ]);

        $offer_claim = factory(OfferClaim::class)->create();

        $request = [
            'disapproval_reason'=>"Test disapprove reason"
        ];
        $response = $this->actingAs($this->user)->post(route('offer-claims.disapprove',$offer_claim->id),$request);

        Mail::assertSent(ClaimRejectedUser::class, 1);
        Mail::assertSent(OfferClaimStatusAdmin::class, 1);
        $response->assertStatus(302);
        $response->assertRedirect(route('offer-claims.index'));
        $response->assertSessionHas('message', 'Offer Claim Disapproved');
    }

}
