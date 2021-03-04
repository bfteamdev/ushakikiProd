<div class="card-body">
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->has("error") }}
        </div>
    @endif
    <div class="form-group row">
        <div class="col-lg-6 mb-3">
            <label>Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Etre le nom"
                name="firstName" value="{{ old('firstName') ?? $client->firstName }}">
            @error('firstName')
                <div class="invalid-feedback">{{ $errors->first('firstName') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre le nom Ex: IMANANIYONKURU</span>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Prenom <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="Etre le prenom"
                name="lastName" value="{{ old('lastName') ?? $client->lastName }}">
            @error('lastName')
                <div class="invalid-feedback">{{ $errors->first('lastName') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre le prenom Ex: Jean</span>
        </div>
        <div class="col-lg-12 mb-3">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Entre l'adresse email" name="email" value="{{ old('email') ?? $client->email }}">
            @error('email')
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre votre adresse email Ex: example@gmail.com</span>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('username') is-invalid @enderror"
                placeholder="Entre le nom que vous alez utilise pour vous connecte" name="username"
                value="{{ old('username') ?? $client->username }}">
            @error('username')
                <div class="invalid-feedback">{{ $errors->first('username') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre votre adresse email Ex: example@gmail.com</span>
        </div>
        <div class="col-lg-6 mb-3">
            <label>Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Entre le nom que vous alez utilise pour vous connecte" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre votre adresse email Ex: example@gmail.com</span>
        </div>
        <div class="col-lg-12 mb-3">
            <label>Telephone <span class="text-danger">*</span></label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                placeholder="Entre le numero de telephone" name="phone" value="{{ old('phone') ?? $client->phone }}">
            @error('phone')
                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
            @enderror
            <span class="form-text text-muted">Veillez entre votre numero de telephone Ex: +257 69 XXX
                XXX</span>
        </div>
        <div class="col-lg-12 mb-3">
            <label>Commune</label>
            <input type="text" class="form-control" placeholder="Entre le nom du commune" name="town"
                value="{{ old('town') ?? $client->town }}">
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
                <button type="submit" class="btn btn-primary mr-2">Enregistre <i class="flaticon2-add"></i></button>
            </div>
        </div>
    </div>
</div>
