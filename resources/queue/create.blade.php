<form method="POST" action="/queue">
@csrf
<select name="doctor_id" class="form-control">
 @foreach($doctors as $d)
  <option value="{{ $d->id }}">{{ $d->name }}</option>
 @endforeach
</select>

<input type="date" name="visit_date" class="form-control">
<textarea name="complaint" class="form-control"></textarea>

<button class="btn btn-primary mt-2">Daftar</button>
</form>
