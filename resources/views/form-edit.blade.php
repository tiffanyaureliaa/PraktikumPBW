@extends('layouts.main')
@section('title', 'Form Edit MakeUp')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $mu->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Merek</label>
                    <input type="text" name="merek" class="form-control" value="{{ $mu->merek }}" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="Form-control">
                        <option value="0">--Pilih Make Up--</option>
                        <option value="Cushion" {{ ($mu->kategori == "Cushion") ? "Selected":"" }}>Cushion</option>
                        <option value="Lip Tint" {{ ($mu->kategori == "Lip Tint") ? "Selected":"" }}>Lip Tint</option>
                        <option value="Maskara" {{ ($mu->kategori == "Maskara") ? "Selected":"" }}>Maskara</option>
                        <option value="Eyeliner" {{ ($mu->kategori == "Eyeliner") ? "Selected":"" }}>Eyeliner</option>
                        <option value="Eye Shadow" {{ ($mu->kategori == "Eye Shadow") ? "Selected":"" }}>Eye Shadow</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Warna</label>
                    <input type="file" name="warna" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <img src="{{ asset('/storage/'.$mu->warna) }}"alt="{{ $mu->warna }}" height="90" width="80">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection