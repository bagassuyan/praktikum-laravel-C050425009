@if ($errors->any())
    <div style="background:#fee2e2; padding:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<input type="text" name="judul" placeholder="Judul Artikel" value="{{ old('judul', $artikel->judul ?? '') }}">
@error('judul') <small style="color:red;">{{ $message }}</small> @enderror
<br>
<textarea name="isi" placeholder="Isi Artikel">{{ old('isi', $artikel->isi ?? '') }}</textarea>
@error('isi') <small style="color:red;">{{ $message }}</small> @enderror
<br>
<select name="status">
    <option value="draft" @selected(old('status', $artikel->status ?? 'draft') == 'draft')>Draft</option>
    <option value="terbit" @selected(old('status', $artikel->status ?? 'draft') == 'terbit')>Terbit</option>
</select>
@error('status') <small style="color:red;">{{ $message }}</small> @enderror
<br>