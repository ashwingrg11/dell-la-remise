<!-- hidden form -->
<form id="action-form" action="" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="disapproval_reason" value="">
</form>

<!-- Approval Modal -->
<div class="modal confirmClaim fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="stepsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top:100px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="no-btn">No</button>
                <button type="button" class="btn btn-primary" id="yes-btn">Yes</button>
                <img id="loader" src="{{ asset('images/giphy.gif') }}" style="visibility: hidden;  width: 70px; position:absolute; left:0; right:0; margin: 0 auto;">
            </div>
        </div>
    </div>
</div>


<!-- Disapproval Modal -->
<div class="modal disapproveClaims fade" id="disapproveModal" tabindex="-1" role="dialog"
    aria-labelledby="stepsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top:100px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please specify reason for disapproval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason1" value="Preuve d'achat Dell non conforme" >
                    <label for="disapprove_reason1">Non compliant proof of purchase</label>
                </div>
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason2" value="Produits achetés chez un distributeur ne participant pas à l'opération">
                    <label for="disapprove_reason2">Products purchased at a distributor who's not taking part in this program</label>
                </div>

                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason3" value="Gamme de produit non éligible">
                    <label for="disapprove_reason3">Product family is not eligible to this program</label>
                </div>
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason4" value="Produits non éligible à l'opération">
                    <label for="disapprove_reason4">Product non eligible to this program</label>
                </div>
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason5" value="Coordonnées bancaires ne correspondent pas à la société demandant le recyclage">
                    <label for="disapprove_reason5">Banking details seem not to be those of requesting company</label>
                </div>
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason6" value="Facture d'achat hors de la période de promotion">
                    <label for="disapprove_reason6">Purchase invoice date is outside promotion period</label>
                </div>
                <div class="input-reason">
                    <input type="radio" name="reason" id="disapprove_reason7" value="Maximum du remboursement déjà demandé ce mois-ci">
                    <label for="disapprove_reason7">Maximum cashback already claimed this month</label>
                </div>
                <div class="input-reason">
                    <input type="radio" id="other_reason" name="reason"><label for="other_reason">Other</label><br>
                    <textarea id="message" name="message" rows="4" cols="50" style="display:none;" placeholder="Please Specify Reason"> </textarea>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-btn">Cancel</button>
                <button type="button" class="btn btn-primary" id="submit-btn" disabled="disabled">Submit</button>
                <img id="disapprove-loader" src="{{ asset('images/giphy.gif') }}" style="visibility: hidden;  width: 70px; position:absolute; left:0; right:0; margin: 0 auto;">
            </div>
        </div>
    </div>
</div>
