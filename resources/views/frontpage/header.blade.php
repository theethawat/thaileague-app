@section("header")

<div class="navbar-fixed ">
    <nav class="mynav">

    @if($navtheme!=NULL)
    <div class="nav-wrapper {{$navtheme}} ">
      <a href="{{url('/')}} " class="brand-logo"> 
            <div class="flexdiv">
                <img class="img-logo"src="{{URL::asset('photo/thaileague.png')}}">
                <h5 class="kanit head-font">โตโยต้า ไทยลีก</h5>
            </div>
          
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i id="menu" class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down kanit">
        <li><a href="sass.html">แมตซ์การแข่งขัน</a></li>
        <li><a href="{{url('table')}}" >ตารางคะแนน</a></li>
        <li><a href="{{url('allclub')}}">สโมสร</a></li>
        <li><a href="mobile.html">ข่าวและประกาศ</a></li>
      </ul>
    </div>
    @else
    <div class="nav-wrapper  red accent-4 ">
      <a href="{{url('/')}} " class="brand-logo"> 
            <div class="flexdiv">
                <img class="img-logo"src="{{URL::asset('photo/thaileague.png')}}">
                <h5 class="kanit head-font">โตโยต้า ไทยลีก</h5>
            </div>
          
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i id="menu" class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down kanit">
        <li><a href="sass.html">แมตซ์การแข่งขัน</a></li>
        <li><a href="{{url('table')}}" >ตารางคะแนน</a></li>
        <li><a href="{{url('allclub')}}">สโมสร</a></li>
        <li><a href="mobile.html">ข่าวและประกาศ</a></li>
      </ul>
    </div>
  @endif

    <script>
      $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    </nav>
</div>

  <ul class="sidenav kanitlight" id="mobile-demo">
    <li><a href="{{url('/')}}" ><img src="{{URL::asset('photo/T1.png')}} "></a></li>
    <li><a href="sass.html">แมตซ์การแข่งขัน</a></li>
    <li><a href="{{url('table')}}" >ตารางคะแนน</a></li>
    <li><a href="{{url('allclub')}}">สโมสร</a></li>
    <li><a href="mobile.html">ข่าวและประกาศ</a></li>
  </ul>
  

@show