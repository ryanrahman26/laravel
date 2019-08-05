<div class="box-body">
    <div class="form-group @error('name') has-error @enderror">
        <label for="name" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-4">
            <input id="name" type="text" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}" required autofocus>

            @error('name')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group @error('email') has-error @enderror">
        <label for="email" class="col-sm-2 control-label">E-Mail Address</label>

        <div class="col-sm-4">
            <input id="email" type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}" required autofocus>

            @error('email')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @if (!isset($user))
        <div class="form-group @error('password') has-error @enderror">
            <label for="password" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-4">
                <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                @error('password')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('password_confirmation') has-error @enderror">
            <label for="password_confirmation" class="col-sm-2 control-label">Password Confirmation</label>

            <div class="col-sm-4">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>

                @error('password_confirmation')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endif
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>