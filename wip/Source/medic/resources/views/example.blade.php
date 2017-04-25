@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div style="width:75%;">
        {!! $chartjs->render() !!}
    </div>
@endsection
