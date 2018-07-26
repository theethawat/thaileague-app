@section("header")

<div class="navbar-fixed ">
    <nav class="mynav">
    <div class="nav-wrapper  red accent-4 ">
      <a href="../index" class="brand-logo"> 
            <div class="flexdiv">
                <img class="img-logo"src="{{URL::asset('photo/thaileague.png')}}">
                <h5 class="kanit head-font">โตโยต้า ไทยลีก</h5>
            </div>
          
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i id="menu" class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down kanit">
        <li><a href="sass.html">แมตซ์การแข่งขัน</a></li>
        <li><a href="badges.html">ตารางคะแนน</a></li>
        <li><a href="collapsible.html">สโมสร</a></li>
        <li><a href="mobile.html">ข่าวและประกาศ</a></li>
      </ul>
    </div>


    <script>
      $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    </nav>
</div>

  <ul class="sidenav kanitlight" id="mobile-demo">
    <li><a><img src="{{URL::asset('photo/T1.png')}} "></a></li>
    <li><a href="sass.html">แมตซ์การแข่งขัน</a></li>
    <li><a href="badges.html">ตารางคะแนน</a></li>
    <li><a href="collapsible.html">สโมสร</a></li>
    <li><a href="mobile.html">ข่าวและประกาศ</a></li>
  </ul>
  

@show