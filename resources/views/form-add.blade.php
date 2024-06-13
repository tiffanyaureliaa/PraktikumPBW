@extends('layouts.main')
@section('title', 'Form Add MakeUp')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Merek</label>
                    <input type="text" name="merek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="Form-control">
                        <option value="0">--Pilih Make Up--</option>
                        <option value="Cushion">Cushion</option>
                        <option value="Lip Tint">Lip Tint</option>
                        <option value="Maskara">Maskara</option>
                        <option value="Eyeliner">Eyeliner</option>
                        <option value="Eye Shadow">Eye Shadow</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Warna</label>
                    <input type="file" name="warna" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection