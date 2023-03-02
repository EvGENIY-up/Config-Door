@extends('layouts.app')

@section('content')
    <home-component :colors="{{ json_encode($colors) }}" :tapes="{{ json_encode($tapes) }}"
        :handles="{{ json_encode($handles) }}" :widths="{{ json_encode($widths) }}" :heights="{{ json_encode($heights) }}"
        :opens="{{ json_encode($opens) }}" :decorations="{{ json_encode($decorations) }}">
    </home-component>
@endsection
