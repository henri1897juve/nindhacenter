@extends('layouts.main')
@section('header')
    <h3>Tambah Data</h3>
@endsection
@section('content')
    <form action="/nindhacenter/data/{{ $data->id }}/update" method="post">
        @csrf
        <div class="form-group">
          <label for="">Tanggal</label>
          <input type="date" name="tanggal" value="{{ $data->tanggal }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="">Nilai 1</label>
          <input type="text" name="value1" id=""  value="{{ $data->value1 }}" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Nilai 2</label>
            <input type="text" name="value2" id="" value="{{ $data->value2 }}" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Device</label>
            <select name="device_id" class="form-control" id="device_id">
                <option value="{{ $data ->device_id }}">{{ $data->device->name }}</option>
                @foreach ($device as $item)
                    <option value="{{ $item->id }}"  > {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" > Edit</button>

    </form>
    
@endsection