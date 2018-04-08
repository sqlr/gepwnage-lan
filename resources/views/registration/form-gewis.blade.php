<form action="{{ route('register') }}">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>GEWIS Membership Number</label>
            <input type="number"
                   required
                   min="{{ \Sqlr\GEWIS\GEWIS::LIDNR_MIN }}"
                   max="{{ \Sqlr\GEWIS\GEWIS::LIDNR_MAX }}"
                   name="gewis_id"
                   placeholder="1234"
                   value="{{ old('gewis_id') }}"
                   class="form-control {{ $errors->has('gewis_id') ? 'is-invalid' : '' }}"/>
            @if ($errors->has('gewis_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('gewis_id') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label>Date of Birth</label>
            <input type="date"
                   required
                   max="{{ now()->subYears(16)->toDateString() }}"
                   name="date_of_birth"
                   placeholder="yyyy-mm-dd"
                   value="{{ old('date_of_birth') }}"
                   class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"/>
            @if ($errors->has('date_of_birth'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <br/>
    <div class="form-row">
        <fieldset class="form-check col-md-4">
            <legend class="col-form-label pt-0">I think I will bring my</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="system" id="radio-desktop" value="desktop"
                           {{ old('system', 'desktop') === 'desktop' ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio-desktop">
                        Desktop
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="system" id="radio-laptop" value="laptop"
                            {{ old('system') === 'laptop' ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio-laptop">
                        Laptop
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="form-group col-md-8">
            <label>Comments</label>
            <textarea type="textarea"
                      name="comment"
                      placeholder="Food allergies, special requests, ..."
                      value="{{ old('comment') }}"
                      class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"></textarea>
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('comment') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <br/>
    <div class="form-row justify-content-center">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check-costs" required>
            <label class="form-check-label" for="check-costs">
                I agree to the costs of signing up for this event.
            </label>
        </div>
    </div>
    <br/>
    <div class="form-row justify-content-center">
        <button type="submit" class="btn btn-outline-gepwnage">Register</button>
    </div>
    <br/>
</form>