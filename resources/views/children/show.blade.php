@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $child->first_name }} {{ $child->last_name }}</div>

                <div class="panel-body">
                          Born {{ $child->formatted_birth_date }} in
                            {{ $child->birth_city}}, {{ $child->birth_state}} {{ $child->birth_zip}}
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
