<form action="{{ route('register.gewis') }}" method="post">
    @csrf
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
            <label>I think I will bring my</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="system" value="desktop"
                           class="form-check-input {{ $errors->has('system') ? 'is-invalid' : '' }}"
                            {{ old('system', 'desktop') === 'desktop' ? 'checked' : '' }}/>
                    Desktop
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="system" value="laptop"
                           class="form-check-input {{ $errors->has('system') ? 'is-invalid' : '' }}"
                            {{ old('system') === 'laptop' ? 'checked' : '' }}/>
                    Laptop
                    @if ($errors->has('system'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('system') }}</strong>
                        </div>
                    @endif
                </label>
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
            <label class="form-check-label">
                <input type="checkbox" name="agree_costs" value="1"
                       class="form-check-input {{ $errors->has('agree_costs') ? 'is-invalid' : '' }}"
                       required/>
                I agree to the costs of signing up for this event.
                @if ($errors->has('agree_costs'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('agree_costs') }}</strong>
                    </div>
                @endif
            </label>
        </div>
    </div>
    <br/>
    <div class="form-row justify-content-center">
        <button type="submit" class="btn btn-outline-gepwnage">Register</button>
    </div>
</form>
