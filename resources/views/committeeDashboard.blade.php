@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Committee's Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class='row'>
                    <div class="col"><a href="/committee/events" class='btn btn-block'>Event's Info</a> </div>
                    <div class="col"><a href="/committee/sponsors" class='btn btn-block'>Sponsor's Info</a> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
