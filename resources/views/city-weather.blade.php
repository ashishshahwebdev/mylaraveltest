@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Get City Whether</div>              
                <div class="panel-body">
                      @if ($error != "")
                        {{ $error }}
                      @endif
                      @if ($weather_detail != "")
                       it is {{ $weather_detail }}!
                      @endif
                      <br>
                    <form method="POST" action="/get-city-weather">                       
                        <label for="cityname">City:</label>&nbsp;<input type="text" name="cityname" id="cityname" required="1">
                        <input type="submit" name="getcitywhether" value="Submit">
                        {{ csrf_field() }}    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
