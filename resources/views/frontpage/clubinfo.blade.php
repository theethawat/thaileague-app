@extends("frontpage.template")
@section("content")
<nav class="nav-extended clubinfo red accent-4">

<div class="red accent-4">
            <div class="flexdiv clubname-head ">
                <img style="margin-right:0.5em;"class="img-logo"src="{{URL::asset($club->logo)}}">
                <h6 class="kanit clubname-head-text">{{$club->thainame}} </h6>
            </div>

<div class="nav-content">
      <ul class="tabs tabs-transparent kanitlight club-tab">
        <li class="tab"><a href="#info">เกี่ยวกับสโมสร</a></li>
        <li class="tab"><a href="#player">รายชื่อผู้เล่น</a></li>
        <li class="tab "><a href="#result">ผลและตารางการแข่งขัน</a></li>
        <li class="tab"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
</nav>

<script>
      $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>


<!--info part -->
    <div id="info" class="col s12">

        <img class="stadium-photo" src="{{URL::asset($club->homestadiumphoto)}}">
        <div class="container">

            <div class="flexdiv">
                <img class="biglogo" src="{{URL::asset($club->logo)}}">
                <div class="clubname-info">
                    <h5 class="kanit"> {{$club->thainame}} <br> {{$club->englishname}} </h5>
                </div>
            </div>
            <p class="kanitlight">{{$club->history}}</p>
            <ul class="kanit text-l1">
                <li> <i class="fas fa-user-alt"></i > หัวหน้าผู้ฝึกสอน <span class="kanitlight">{{$club->headcoach}} </span><li>
                <li> <i class="fas fa-home"></i> สนามเหย้า <span class="kanitlight">{{$club->homestadium}} </span><li>
                <li> <i class="fas fa-globe-asia"></i> เว็บไซต์สโมสร  <a href= "{{$club->website}}"> {{$club->websitename}} </a></li>
                <li> <i class="fab fa-facebook-square"></i> เฟสบุ๊คสโมสร  <a href= "{{$club->facebook}}">{{$club->facebookname}}</a></li>
            </ul>

        </div>


    </div>






  <div id="player" class="col s12">
  <div class="container">
  <table>
        <thead>
          <tr>
              <th class="kanit">หมายเลข</th>
              <th class="kanit">รูป</th>
              <th class="kanit">ชื่อผู้เล่น</th>
              <th class="kanit">ตำแหน่ง</th>
              <th class="kanit">สัญชาติ</th>
              <th class="kanit">ประตู</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($player as $play)
          <tr>
            <td scope="row" class="kanit text-l2">{{$play->number}} </th>
            <td><img class="clubinfo-teamlogo" src="{{URL::asset($play->photo)}}"> </td>
            <td class="kanitlight">{{$play->name}} </td>
            <td class="kanitlight">{{$play->position}} </td>
            <td class="kanitlight ic"><span class="flag-icon flag-my-icon flag-icon-{{$play->nationality}}"></span></td>
            <td class="kanitlight">{{$play->goal}} </td>
          </tr>
          
        @endforeach
        </tbody>

      </table>
  </div><!--for container div-->
  </div>






  <div id="result" class="col s12">ผลและตารางการแข่งขัน</div>
  <div id="test4" class="col s12">Test 4</div>



@endsection