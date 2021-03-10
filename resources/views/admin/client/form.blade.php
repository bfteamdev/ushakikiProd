<div class="card-body">
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->has('error') }}
        </div>
    @endif
    <div class="form-group row">
        <div class="col-lg-6 mb-3">
            <label>First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Enter the first name"
                name="firstName" value="{{ old('firstName') ?? $client->firstName }}">
            @error('firstName')
                <div class="invalid-feedback">{{ $errors->first('firstName') }}</div>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label>Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="Enter the last name"
                name="lastName" value="{{ old('lastName') ?? $client->lastName }}">
            @error('lastName')
                <div class="invalid-feedback">{{ $errors->first('lastName') }}</div>
            @enderror
        </div>
        <div class="col-lg-12 mb-3">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Enter the email address" name="email" value="{{ old('email') ?? $client->email }}">
            @error('email')
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label>Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('username') is-invalid @enderror"
                placeholder="Enter the username" name="username"
                value="{{ old('username') ?? $client->username }}">
            @error('username')
                <div class="invalid-feedback">{{ $errors->first('username') }}</div>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Entre le nom que vous alez utilise pour vous connecte" name="password" autocomplete="false">
            @error('password')
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @enderror
        </div>
        <div class="col-lg-12 mb-3">
            <label>Phone number <span class="text-danger">*</span></label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                placeholder="Enter the phone number" name="phone" value="{{ old('phone') ?? $client->phone }}">
            @error('phone')
                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
            @enderror
        </div>
        <div class="col-lg-12 mb-3">
            <label>Commune</label>
            <input type="text" class="form-control" placeholder="Entre le nom du commune" name="town"
                value="{{ old('town') ?? $client->town }}">
        </div>
    </div>
    <div class="form-group">
        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
            <div class="image-input-wrapper" style="background-image: url({{ asset("media/users/blank.png") }})"></div>

            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="profil" accept=".png, .jpg, .jpeg"/>
                <input type="hidden" name="profil_remove" />
            </label>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
    </div>
    {{-- <div class="form-group row">
      <label class="col-3 col-form-label">Organisation</label>
      <div class="col-3">
          <span class="switch switch-outline switch-icon switch-success">
              <label>
                  <input type="checkbox" name="organisation" />
                  <span></span>
              </label>
          </span>
      </div>
  </div> --}}
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-6">
                <a href="{{ route('client.index') }}" class="btn btn-light-dark"><i
                        class="flaticon2-left-arrow-1"></i>Back</a>
            </div>
            <div class="col-lg-6 text-right">
                <button type="submit" class="btn btn-primary mr-2">Save <i class="flaticon2-add"></i></button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        var avatar3 = new KTImageInput('kt_image_3');
    </script>
@endsection
