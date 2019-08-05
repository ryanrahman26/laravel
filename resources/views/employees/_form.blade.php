
<div class="box-body">
    <div class="form-group @error('name') has-error @enderror">
        <label for="name" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-4">
            <input id="name" type="text" class="form-control" name="name" value="{{ isset($employee) ? $employee->name : '' }}" required autofocus>

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
            <input id="email" type="email" class="form-control" name="email" value="{{ isset($employee) ? $employee->email : '' }}" required autofocus>

            @error('email')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group @error('phone') has-error @enderror">
        <label for="phone" class="col-sm-2 control-label">Phone</label>

        <div class="col-sm-4">
            <input id="phone" type="text" class="form-control" name="phone" value="{{ isset($employee) ? $employee->phone : '' }}" required autofocus>

            @error('phone')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group @error('company_id') has-error @enderror">
        <label for="company_id" class="col-sm-2 control-label">Select Company</label>

        <div class="col-sm-4">
            <select class="form-control" name="company_id">
                @foreach ($items as $key => $value)
                    <option value="{{ $key }}" {{ (isset($employee) AND $key == $employee->company_id) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            @error('company_id')
                <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>