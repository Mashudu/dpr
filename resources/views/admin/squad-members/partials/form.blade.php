@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="full_name">Name</label>
            <input class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                id="full_name" type="text" placeholder="Enter  full name" 
                value="{{old('full_name') }} @isset($squadMember){{trim($squadMember->full_name)}}@endisset" />
            @error('full_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="small mb-1" for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" name="email"
                id="email" type="email" placeholder="Enter  Email address" 
                value="{{old('email') }} @isset($squadMember){{trim($squadMember->email)}}@endisset" />
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
</div>

<div class="form-group">
    <label class="small mb-1" for="role">Role</label>
    <select class="form-control @error('role') is-invalid @enderror" name="role">  
        <option value="@isset($squadMember) {{trim($squadMember->role) }} @endisset"> @if(isset($squadMember)) {{ trim($squadMember->role) }} @else Select a Role @endif  </option>
        @foreach ($roles as $role)
        <option value="{{ $role }}">{{ $role }}</option>
        @endforeach
      
        
      </select>   
    @error('role')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label class="small mb-1" for="business_unit_id">Business Unit</label>
    <select class="form-control @error('business_unit_id') is-invalid @enderror" name="business_unit_id">  
        <option value="@isset($squadMember) {{trim($squadMember->businessUnit->id) }} @endisset"> @if(isset($squadMember)) {{ trim($squadMember->businessUnit->name) }} @else Select a Business Unit @endif  </option>
        @foreach ($businessUnits as $businessUnit)
        <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
        @endforeach
      
        
      </select>   
    @error('business_unit_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>