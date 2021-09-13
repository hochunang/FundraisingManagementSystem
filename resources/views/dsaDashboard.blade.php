@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">DSA's Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class='row'>
                    <div class="col"><a href="/dsa/events" class='btn btn-block'>Event's Info</a> </div>
                    <div class="col"><a href="/dsa/sponsors" class='btn btn-block'>Sponsor's Info</a> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
