@extends('admin.template')
@section('content')
<div class="container">
    <br>
    <h4 class="kanit"> ใส่ข้อมูลสโมสร </h4><hr>
    @guest

    คุณไม่มีสิทธิในการเข้าถึง โปรดล็อกอิน

    @else
    <form action="addteam" method="POST" role="form" enctype="multipart/form-data" >
        <label class="kanit">ชื่อสโมสร ภาษาอังกฤษ <span class="kanitlight">ใส่ชื่อเต็มพร้อมสปอนเซอร์</span> </lebel>
        <input type="text" name="english-name"  class="form-control kanitlight" required>

        <label class="kanit">ชื่อสโมสร ภาษาไทย <span class="kanitlight">ใส่ชื่อเต็มพร้อมสปอนเซอร์</span> </lebel>
        <input type="text" name="thai-name" class="form-control kanitlight" required >

        <label class="kanit">ตัวอักษรย่อ <span class="kanitlight">ภาษาอังกฤษ</span> </lebel>
        <input type="text" name="short-name" class="form-control kanitlight" placeholder="ตัวพิมพ์เล็ก อ้างอิงตามเว็บไทยลีก" required >

        <label class="kanit">ชื่อสนามเหย้า</lebel>
        <input type="text" name="homestadium"  class="form-control kanitlight" required>

        <label class="kanit">หัวหน้าผู้ฝึกสอน</lebel>
        <input type="text" name="headcoach"  class="form-control kanitlight" required>

        <label class="kanit">เว็บไซต์</lebel> <span class="kanitlight">ใส่ URL เว็บไซต์ ถ้าไม่มีให้ใส่ URLหน้า page เฟสบุ๊ค</span>
        <input type="url" name="website"  class="form-control kanitlight" required>

        <label class="kanit">ชื่อเว็บไซต์ </lebel> <span class="kanitlight">ใส่อย่างย่อ เช่น chonburifc.com ถ้าสโมสรให้ใส่ No Site</span>
        <input type="name" name="website-name"  class="form-control kanitlight" required value="No Site" >

        <label class="kanit">Facebook</lebel> <span class="kanitlight">ใส่ URLหน้า page เฟสบุ๊ค</span>
        <input type="url" name="facebook"  class="form-control kanitlight" required>

        <label class="kanit">ชื่อเฟสบุ๊ค</lebel> <span class="kanitlight">ชื่อหน้าเพจในเฟสบุ๊ค</span>
        <input type="name" name="facebook-name"  class="form-control kanitlight" required>

        <div class="row">
            <div class="col-sm">
                <label class="kanit">Point</lebel> 
                <input type="number" name="point" required class="form-control kanitlight">
            </div>
            <div class="col-sm">
                <label class="kanit">ประตูได้เสีย</lebel> 
                <input type="number" name="gd" required class="form-control kanitlight">
            </div>
       </div>

       <div class="row">
            <div class="col-sm">
                <label class="kanit">โลโก้สโมสร</lebel> 
                <input  type="file" id="logo" required name="logo">
            </div>
            <div class="col-sm">
                <label class="kanit">ภาพสนามเหย้า</lebel> 
                <input  type="file" id="homestadium-photo" required name="homestadium-photo">
            </div>
        </div>

        <label class="kanit">เกี่ยวกับสโมสร</lebel> 
        <textarea name="info" class="form-control kanitlight" rows="5" required style="width:500px;"> </textarea>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>

    <button type="submit" class="btn btn-primary kanit">เพิ่มข้อมูล</button>
    </form>
    @endguest
</div>
@endsection