@extends("frontpage.template")
@section("content")
<div class="container">

    <div class="content c-news">
        <h5 class="kanit fronttitle red-text text-accent-4"> News </h5><hr class="hr-front">
        <br><br><br><br><br>
    </div>

    <div class="content c-match">
        <h5 class="kanit fronttitle red-text text-accent-4"> Next Match</h5><hr class="hr-front">
        <br><br><br><br><br>
    </div>

    <div class="content c-table">
        <h5 class="kanit fronttitle red-text text-accent-4"> League Table <a class="waves-effect waves-light btn  red accent-4 kanit" href="{{url('table')}}"> ดูตารางทั้งหมด </a> </h5> <hr class="hr-front">
        <table>
        <thead>
          <tr>
              <th class="kanit">อันดับ</th>
              <th class="kanit">โลโก้</th>
              <th class="kanit">ชื่อทีม</th>
              <th class="kanit">คะแนน</th>
              <th class="kanit">GD</th>
          </tr>
        </thead>
        @php 
        $i=1
        @endphp
        <tbody>
        @foreach ($table as $rank)
          <tr>
            <td class="tablerank"scope="row" class="kanit text-l2"> @php echo $i; @endphp </th>
            <td class="tablerank"><img class="frontpage1-teamlogo" src="{{URL::asset($rank->logo)}}"> </td>
            <td class="kanitlight tablerank"><a href="clubinfo/{{$rank->englishname}}" class="black-text"> {{$rank->thainame}} </a></td>
            <td class="kanitlight tablerank">{{$rank->point}} </td>
            <td class="kanitlight tablerank">{{$rank->goalpoint}} </td>
          </tr>
          
        @php
        $i++
        @endphp

        @endforeach
        </tbody>

      </table>
    </div>

    <div class="content c-highlight">
        <h5 class="kanit fronttitle red-text text-accent-4"> Thaileague Club</h5><hr class="hr-front">
        <div class="flexdiv flexscroll">
            @foreach ($allteam as $club)
            <div class="frontpage-club">
            <a href="clubinfo/{{$club->englishname}}"><img class="admin-teamlogo" src="{{URL::asset($club->logo)}}"></a>
            <p class="kanitlight">{{$club->thainame}} </p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="content c-highlight">
        <h5 class="kanit fronttitle red-text text-accent-4"> Official Highlight</h5><hr class="hr-front">
        <br><br><br><br><br>
    </div>

    <div class="content c-fanzone">
        <h5 class="kanit fronttitle red-text text-accent-4"> Fanzone</h5><hr class="hr-front">
        <div class="row flexdiv3">

         <div class="col s7 l4 ">
            <div class="card fanzone-1">
            <!-- Card Content -->
                <div class="card-image">
                    <img class="fanzone-2" src="{{URL::asset('photo/fantasy.png')}} ">
                </div>
                <div class="card-action">
                    <a class="red-text text-accent-4 kanit "href="https://thai.fantopy.com/th">Thaileague Fantasy</a>
                 </div>
            </div>
        </div><!--for col s7 l4-->

        <div class="col s7 l4 ">
            <div class="card fanzone-1 ">
            <!-- Card Content -->
                <div class="card-image">
                    <img class="fanzone-2" src="{{URL::asset('photo/predict.png')}} ">
                </div>
                <div class="card-action">
                    <a class="red-text text-accent-4 kanit "href="https://line.me/R/ti/p/%40changsuek">เซียนไทยลีก</a>
                 </div>
            </div>
        </div><!--for col s7 l4-->

       

        </div><!--for row-->
    </div>

</div>

@endsection