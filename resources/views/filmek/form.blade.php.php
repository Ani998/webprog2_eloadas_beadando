@csrf
<div class="mb-3">
<label class="form-label">ID</label>
<input type="number" name="id" class="form-control" value="{{ old('id', $film->id ?? '') }}" {{ isset($film) ? 'readonly' : '' }}>

    @error('id') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
 
<div class="mb-3">
<label class="form-label">Cím</label>
<input type="text" name="cim" class="form-control" value="{{ old('cim', $film->cim ?? '') }}">

    @error('cim') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
 
<div class="mb-3">
<label class="form-label">Év</label>
<input type="number" name="ev" class="form-control" value="{{ old('ev', $film->ev ?? '') }}">

    @error('ev') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
 
<div class="mb-3">
<label class="form-label">Hossz (perc)</label>
<input type="number" name="hossz" class="form-control" value="{{ old('hossz', $film->hossz ?? '') }}">

    @error('hossz') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
 
<button class="btn btn-primary">{{ $buttonText }}</button>
<a href="{{ route('filmek.index') }}" class="btn btn-secondary">Vissza</a>
 