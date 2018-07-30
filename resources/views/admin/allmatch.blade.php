@extends("admin.template")
@section("content")
<div class="container">
    <br>
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในการเข้าถึง โปรดล็อกอิน <a href="{{url('admin')}}"> ล็อกอิน </a></p>
    @else
    <h5 class="kanit"> All Match </h5><hr>
    @php
        $matchweekno=24;
    @endphp

   @while($matchweekno<=34)
    <br>
    <div id="MW{{$matchweekno}}">
    <h5 class="kanit">Match Week {{$matchweekno}} <a href="./matchmaking/{{$matchweekno}}"><button class="btn btn-success kanitlight">เพิ่มแมตซ์</button> </a></h5> 
    <br> 
        <table class="table table-hover table-responsive">
            <thead>
                <tr >
                    <th scope="col" class=" kanit">ID</th>
                    <th scope="col" class=" kanit">Date</th>
                    <th scope="col" class=" kanit">Time</th>
                    <th scope="col" class=" kanit">Status</th>
                    <th scope="col" class=" kanit">เหย้า</th>
                    <th scope="col" class=" kanit">เยือน</th>
                    <th scope="col" class=" kanit">ตั๋ว</th>
                    <th scope="col" class=" kanit">กรรมการ</th>
                    <th scope="col" class=" kanit">ถ่ายทอด</th>
                    <th scope="col" class=" kanit">LineUp</th>
                    <th scope="col" class=" kanit">ผล</th>
                    <th scope="col" class=" kanit">ข้อมูล</th>
                    <th scope="col" class=" kanit">LiveInfo</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($matchshow as $match) 
                @if($matchweekno == $match->matchweek)
                    <tr>
                        <th scope="row" class="kanitlight"> {{$match->id}} </th>
                        <td class="kanitlight"> {{$match->date}} </td>
                        <td class="kanitlight"> {{$match->time}} </td>
                        <td class="kanitlight"> 
                            @php 
                            $matchstatus=$match->status;
                            @endphp

                            @if ($matchstatus=="prematch")
                            <span class="badge badge-primary admin-badge kanitlight">Pre<br> Match</span>
                            @elseif ($matchstatus=="live match")
                            <span class="badge badge-success admin-badge kanitlight">Live</span>
                            @elseif ($matchstatus=="finished")
                            <span class="badge badge-danger admin-badge kanitlight">Ended<br>Match</span>
                            @else
                            <span class="badge badge-secondary admin-badge kanitlight">{{$matchstatus}} </span>
                            @endif

                        </td>
                        <td class="kanitlight admin-table-ovf"> {{$match->hometeam}} </td>
                        <td class="kanitlight admin-table-ovf"> {{$match->awayteam}} </td>
                        <td class="kanitlight"> 
                            @if($match->ticketprovide==NULL)
                               <a href="allmatch/ticket/{{$match->id}}">Add</a>
                            @elseif($match->ticketprovide!=NULL)
                            <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            @if($match->referee1==NULL)
                               <a href="allmatch/referee/{{$match->id}}">Add</a>
                            @else
                                <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            @if($match->broadcastingsd==NULL)
                               <a href="#">Add</a>
                            @elseif($match->broadcastingsd!=NULL)
                            <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            @if($match->lineup==0)
                            <button class="btn btn-warning kanitlight">Add</button>
                            @elseif($match->lineup==1)
                            <button class="btn btn-success kanitlight">See</button>
                            @endif
                        </td>
                        <td class="kanitlight">{{$match->homescore}}-{{$match->awayscore}}</td>
                        <td class="kanitlight">
                            <button class="btn btn-light"><i class="fas fa-file-alt"></i></button>
                            <button class="btn btn-light"><i class="fas fa-edit"></i></button>
                        </td>
                        <td class="kanitlight"> 

                            @if ($matchstatus=="prematch")
                            <button class="btn btn-success kanitlignt">LIVE NOW</button>
                            @elseif ($matchstatus=="live match")
                            <button class="btn btn-success kanitlignt">END MATCH</button>
                            @elseif ($matchstatus=="finished")
                            Match is ended
                            @else
                            -
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>       
        
    </div> <!-- for matchweek no navigator div -->
        @php
            $matchweekno++;
        
        @endphp

    @endwhile

    
@endguest
</div>
@endsection