@extends('layouts.main')
@section('header')
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h2>Data</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="tambah" class="btn btn-primary ">Tambah Data</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th> Device_id</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $item)
            <tr>
                <td>{{  $i + $data -> Firstitem() }}</td>
                <td>{{ $item -> tanggal }}</td>
                <td>{{ $item -> value1 }}</td>
                <td>{{ $item -> value2 }}</td>
                <td>{{ $item -> device -> name }}</td>
                <td> <a href="data/{{ $item->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                    <a href="data/{{ $item->id }}/hapus" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>     
        @endforeach   
    </tbody>
</table>
{{ $data->onEachSide(5)->links() }}

<div id="container" class="mt-4">

</div>

@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Data Device aktif'
    },
    xAxis: {
        categories: {!! json_encode($categories) !!}
    },
    yAxis: {
        title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: '{{ json_encode($device) }}',
        data: {{ json_encode($value) }}
    }]
});
              


</script> 


@endsection