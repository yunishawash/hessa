<div class="row">
	@csrf
	<div class="form-group col-12">
	    <label for="payment_amount" class="form-control-label">{{ __("Master.payment_amount") }}:</label>
	    <input type="number" step="0.5" min="0.5" class="form-control" placeholder="{{ __("Master.payment_amount_placeholder") }}" name="payment_amount" id="payment_amount" title="{{ __("Master.payment_amount_placeholder") }}" required="">
	</div>
</div>