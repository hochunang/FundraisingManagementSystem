@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Sponsor's Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class='row'>
                    <div class="col"><a href="/sponsor/events" class='btn btn-block'>Event's Info</a> </div>
                    <div class="col"><a href="/sponsor/sponsors" class='btn btn-block'>Sponsor's Info</a> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .panelbtn {
        font-weight: bold;
        font-size: 36px;
        width: 100%;
        background-color: #e7e7e7;
        margin: 5px;
    }
</style>
