@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" name="name"
                id="name" type="text" placeholder="Enter  name" 
                value="{{old('name') }} @isset($user){{$user->name}}@endisset" />
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
<div class="form-group">
    <label class="small mb-1" for="email">Email</label>
    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email"
        type="email" aria-describedby="emailHelp" placeholder="Enter email address"
        value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" />
    @error('email')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-row">
 @if($create)
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="password">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" name="password"
                id="password" type="password" placeholder="Enter password" />
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="password_confirmation">Password Confirm</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                id="password_confirmation" type="password" placeholder="Re - Enter password" />
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
   @endif
    <div class="col-md-12">
        <div class="mb-3">
            @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" name="roles[]" type="checkbox"
                        value="{{ $role->id }}" id="{{ $role->name }}"
                        @isset($user)
                           @if(in_array($role->id,$user->roles->pluck('id')->toArray()))
                             checked  
                           @endif 
                        @endisset>
                    <label class="form-check-label" for="{{ $role->name }}">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>