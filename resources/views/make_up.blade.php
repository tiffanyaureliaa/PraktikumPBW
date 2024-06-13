@extends('layouts/main')
@section('title', 'Makeup')
@section('artikel')
    <div class="card">
        <div class="card-header">
            <a href="/make_up/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i>MakeUp</a>
        </div>
        <div class="card-body">
            @if(@session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{--tabel disini--}}
            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Kategori</th>
                <th>Warna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mu as $idx => $m)
            <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{$m->merek}}</td>
                <td>{{$m->kategori}}</td>
                <td>
                    <img src="{{ asset('/storage/'.$m->warna) }}"alt="{{ $m->warna }}" height="90" width="80">
                </td>
                <td>
                    <a href="/make_up/edit-form/{{ $m->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
@endsection
