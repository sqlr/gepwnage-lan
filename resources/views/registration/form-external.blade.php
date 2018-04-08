<form action="{{ route('register.external') }}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Name</label>
            <input type="text"
                   required
                   name="name"
                   placeholder="Virtuele Nep"
                   value="{{ old('name') }}"
                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"/>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label>E-mail Address</label>
            <input type="email"
                   required
                   name="email"
                   placeholder="v.nep@student.tue.nl"
                   value="{{ old('email') }}"
                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"/>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
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
        <div class="text-align-left">
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
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" name="agree_priority" value="1"
                           class="form-check-input {{ $errors->has('agree_priority') ? 'is-invalid' : '' }}"
                           required/>
                    I understand that GEWIS-members get priority over externals.<br/>
                    Therefor, registration does not imply admission.
                    @if ($errors->has('agree_priority'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('agree_priority') }}</strong>
                        </div>
                    @endif
                </label>
            </div>
        </div>
    </div>
    <br/>
    <div class="form-row justify-content-center">
        <button type="submit" class="btn btn-outline-gepwnage">Register</button>
    </div>
</form>
