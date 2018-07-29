@extends("frontpage.template")
@section("content")

<div class="container">
<h5 class="kanit fronttitle red-text text-accent-4">Full League Table </h5> <hr class="hr-front">
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
      <br>
      <div class="row">
        <div class="col s4 center-align">
            <img class="tournament-logo" src="{{URL::asset('photo/acl.png')}}">
            <p class="kanit">แชมป์ลีก</p> <p class="kanitlight">ผ่านเข้าสู่ AFC Champions League 2019 รอบแบ่งกลุ่ม</p>
        </div>
      <div class="col s4 center-align">
            <img class="tournament-logo" src="{{URL::asset('photo/acl.png')}}">
            <p class="kanit">รองแชมป์ลีก</p>  <p class="kanitlight">ผ่านเข้าสู่ AFC Champions League 2019 รอบคัดเลือก </p>
      </div>
      <div class="col s4 center-align">
            <img class="tournament-logo" src="{{URL::asset('photo/t2.png')}}">
            <p class="kanit">5 ทีมอันดับต่ำสุด </p><p class="kanitlight">ตกชั้นลงสู่ Thaileague 2 M-150 ในฤดูกาลหน้า </p>
      </div>
    </div>
</div>

@endsection