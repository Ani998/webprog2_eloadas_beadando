@csrf
<div class="mb-3">
    <label for="cim" class="form-label">Cím</label>
    <input type="text" name="cim" id="cim" class="form-control" value="{{ old('cim', $film->cim ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="ev" class="form-label">Év</label>
    <input type="number" name="ev" id="ev" class="form-control" value="{{ old('ev', $film->ev ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="hossz" class="form-label">Hossz (perc)</label>
    <input type="number" name="hossz" id="hossz" class="form-control" value="{{ old('hossz', $film->hossz ?? '') }}" required>
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
