@extends("frontpage.template")
@section("content")

<div class="container">
        <h5 class="kanit fronttitle red-text text-accent-4">Current Matchweek  </h5><hr class="hr-front">
        <table class="centered highlight">
        <thead>
        <!--
          <tr class="kanit red-text text-accent-4">
              <th>Time</th>
              <th>Home</th>
              <th>Score</th>
              <th>Away</th>
          </tr>
          -->
        </thead>
        <tbody>
        @php
        $oldmatchdate=date_create("2018-01-01");
        @endphp
                    
        @foreach($allmatch as $match)
            @if($oldmatchdate!=$match->date)
            <tr class="kanit">
                <td colspan="6">
                @php
                $matchdate=date_create($match->date);
                @endphp
                {{date_format($matchdate,"l d F Y")}}
                </td>
            </tr>
            @endif
        
            <tr class="kanitlight"> 
                <td class="tablerank">
                <!-- MATCH TIME FORMAT-->
                @php
                    $matchtime=date_create($match->time);
                @endphp
                {{date_format($matchtime,"H:i")}}
                
                 </td>
                 @if($match->hometeamlogo!=NULL)
                <td class="tablerank"><img class="frontpage1-teamlogo" src="{{URL::asset($match->hometeamlogo)}}"> </td>
                @else
                <td class="tablerank"> </td>
                @endif
                <td class="tablerank">{{$match->hometeam}}</td>

                <!-- STATUS COLOR FORMAT-->
                @php
                
                 if($match->status == "prematch"){
                     $color="cyan darken-1 ";
                 }
                 else if($match->status == "live match"){
                     $color="green accent-4 white-text";
                 }
                 else if($match->status == "finished"){
                     $color="red accent-4 white-text";
                 }
                 else{
                     $color="lime accent-2";
                 }

                @endphp
                 
                <td class="tablerank"><a class="waves-effect waves-light btn {{$color}}"  href="match/{{$match->id}}">
                <!-- different on different match status -->
                @if($match->status=="prematch")
                    VS
                @else
                    {{$match->homescore}}-{{$match->awayscore}} 
                @endif
                </a></td>
                <td class="tablerank">{{$match->awayteam}}</td>
                @if($match->awayteamlogo!=NULL)
                <td class="tablerank"><img class="frontpage1-teamlogo" src="{{URL::asset($match->awayteamlogo)}}"> </td>
                @else
                <td class="tablerank"> </td>
                @endif
            </tr>
        
            @php
            $oldmatchdate=$match->date;
            @endphp
          @endforeach
        </tbody>
      </table>


      <h5 class="kanit fronttitle red-text text-accent-4">All Match </h5><hr class="hr-front">
        <table class="centered highlight">
        <thead>
        <!--
          <tr class="kanit red-text text-accent-4">
              <th>Time</th>
              <th>Home</th>
              <th>Score</th>
              <th>Away</th>
          </tr>
          -->
        </thead>
        <tbody>
        @php
        $oldmatchdate=date_create("2018-01-01");
        @endphp
                    
        @foreach($overmatch as $match)
            @if($oldmatchdate!=$match->date)
            <tr class="kanit">
                <td colspan="6">
                @php
                $matchdate=date_create($match->date);
                @endphp
                Matchweek {{$match->matchweek}} | {{date_format($matchdate,"l d F Y")}}
                </td>
            </tr>
            @endif
        
            <tr class="kanitlight"> 
                <td class="tablerank">
                <!-- MATCH TIME FORMAT-->
                @php
                    $matchtime=date_create($match->time);
                @endphp
                {{date_format($matchtime,"H:i")}}
                
                 </td>
                 @if($match->hometeamlogo!=NULL)
                <td class="tablerank"><img class="frontpage1-teamlogo" src="{{URL::asset($match->hometeamlogo)}}"> </td>
                @else
                <td class="tablerank"> </td>
                @endif
                <td class="tablerank">{{$match->hometeam}}</td>

                <!-- STATUS COLOR FORMAT-->
                @php
                
                 if($match->status == "prematch"){
                     $color="cyan darken-1 ";
                 }
                 else if($match->status == "live match"){
                     $color="green accent-4 white-text";
                 }
                 else if($match->status == "finished"){
                     $color="red accent-4 white-text";
                 }
                 else{
                     $color="lime accent-2";
                 }

                @endphp
                 
                <td class="tablerank"><a class="waves-effect waves-light btn {{$color}}"  href="match/{{$match->id}}">
                <!-- different on different match status -->
                @if($match->status=="prematch")
                    VS
                @else
                    {{$match->homescore}}-{{$match->awayscore}} 
                @endif
                </a></td>
                <td class="tablerank">{{$match->awayteam}}</td>
                @if($match->awayteamlogo!=NULL)
                <td class="tablerank"><img class="frontpage1-teamlogo" src="{{URL::asset($match->awayteamlogo)}}"> </td>
                @else
                <td class="tablerank"> </td>
                @endif
            </tr>
        
            @php
            $oldmatchdate=$match->date;
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>

@endsection