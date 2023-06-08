@extends('layouts.app')
@section('content')
<section class="tulio-experience" style="padding:0px;">
                  <div class="wrapper">
        <ul>
          <li style="margin-left:5%;margin-right:5%;margin-bottom:0px;margin-top:40px;">
            <div class="content" style="margin-left:0px;width:48%">
              <span class="cursive-title"><br />
<b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\Web-master\category-element.php</b> on line <b>5</b><br />
</span>
              <p class="text"><br />
<b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\Web-master\category-element.php</b> on line <b>6</b><br />
</p>
            </div>
            <div class="image-container" style="width:48%">
              <img data-src="assets/<br />
<b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\Web-master\category-element.php</b> on line <b>9</b><br />
" alt="" class="lazy"/>
            </div>
          </li>
        </ul>

        
    </div>

      </section>
      <section class="tulio-experience" style="padding:0px;">
              <div class="wrapper" style="height:60px;margin-top:80px">
    <p  style="margin-left:5%;margin-right:5%;margin-bottom:0px;float:left">Refine By:</p>
    <p  style="margin-left:5%;margin-right:5%;margin-bottom:0px;margin-top:10px;clear:both;float:left">
        <select name="Type" id="type" onchange="productslistfilter('3','4');" style="width:140px;background-color:white;border:none">
            <option value="Type">Type</option>
            <option value="Curtain">Curtain</option>
            <option value="Blinds">Blinds</option>
        </select>
        <select name="Technique" id="technique" onchange="productslistfilter('3','4');" style="width:140px;background-color:white;border:none">
            <option value="Technique">Technique</option>
            <option value="Curtain">Curtain</option>
            <option value="Blinds">Blinds</option>
        </select>
        <select name="Ambience" id="ambience" onchange="productslistfilter('3','4');" style="width:140px;background-color:white;border:none">
            <option value="Ambience">Ambience</option>
            <option value="Curtain">Curtain</option>
            <option value="Blinds">Blinds</option>
        </select>
        <select name="Design" id="design" onchange="productslistfilter('3','4');" style="width:140px;background-color:white;border:none">
            <option value="Design">Design</option>
            <option value="Curtain">Curtain</option>
            <option value="Blinds">Blinds</option>
        </select>
    </p>
</div>

      </section>
      <section class="tulio-experience" style="padding:0px;">
              <div class="wrapper"><div style="margin-left:5%;margin-right:5%;border:0.2px solid gray;margin-top:50px"></div></div>
      </section>
      @endsection