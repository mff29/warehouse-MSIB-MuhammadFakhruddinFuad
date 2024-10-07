     <div class="div1">
          <label class="form-label" for="name">Nama Gudang</label>
          <input type="text" name="name" placeholder="Nama Gudang" class="form-control"
          value="{{ old('name', $gudang->name ?? '') }}" required>
     </div>
     <div class="div1">
          <label class="form-label" for="location">Lokasi Gudang</label>
          <input type="text" name="location" placeholder="Alamat Gudang" class="form-control"
          value="{{ old('location', $gudang->location ?? '') }}" required>
     </div>
     <div class="div1">
          <label class="form-label" for="capacity">Kapasitas Gudang</label>
          <input type="number" name="capacity" placeholder="Kapasitas Maksimal Gudang" class="form-control"
          value="{{ old('capacity', $gudang->capacity ?? '') }}" required>
     </div>
     <div class="div1">
          <label class="form-label" for="status">Status Operasi Gudang</label>
          <select name="status" class="form-control" required>
               <option value="" disabled selected>Pilih status ....</option>
               <option value="aktif" {{ (old('status', $gudang->status ?? '') == 'aktif') ? 'selected' : '' }}>Aktif</option>
               <option value="tidak_aktif" {{ (old('status', $gudang->status ?? '') == 'tidak_aktif') ? 'selected' : '' }}>Tidak Aktif</option>
          </select>
     </div>
     <div class="div1">
          <label class="form-label" for="opening_hour">Jam Buka</label>
          <input type="time" name="opening_hour" class="form-control"
          value="{{ old('opening_hour', $gudang->opening_hour ?? '') }}" required>
     </div>
     <div class="div1">
          <label class="form-label" for="closing_hour">Jam Tutup</label>
          <input type="time" name="closing_hour" class="form-control"
          value="{{ old('closing_hour', $gudang->closing_hour ?? '') }}" required>
     </div>
<div class="mt-3">
     <button type="submit" class="btn btn-success">Simpan</button>
     <a href="{{ route('gudang.index') }}" class="btn btn-danger">Kembali</a>
</div>
