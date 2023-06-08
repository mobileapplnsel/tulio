@extends(isset($projects) ? 'layouts.user' : 'layouts.app-share')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('style')
<link rel="stylesheet" href="{{asset('styles/project-board-page.css')}}"/>
<style>

    .mfp-zoom-out-cur, .mfp-zoom-out-cur .mfp-image-holder .mfp-close {
    cursor: pointer !important;
}

    .mfp-title
    {
        display: none !important;
    }
    .mfp-arrow-left {
      background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ny4xNzUgNDc3LjE3NSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc3LjE3NSA0NzcuMTc1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCI+CjxnPgoJPHBhdGggZD0iTTE0NS4xODgsMjM4LjU3NWwyMTUuNS0yMTUuNWM1LjMtNS4zLDUuMy0xMy44LDAtMTkuMXMtMTMuOC01LjMtMTkuMSwwbC0yMjUuMSwyMjUuMWMtNS4zLDUuMy01LjMsMTMuOCwwLDE5LjFsMjI1LjEsMjI1ICAgYzIuNiwyLjYsNi4xLDQsOS41LDRzNi45LTEuMyw5LjUtNGM1LjMtNS4zLDUuMy0xMy44LDAtMTkuMUwxNDUuMTg4LDIzOC41NzV6IiBmaWxsPSIjRkZGRkZGIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==) no-Repeat top left !important;
      width: 35px;
      height: 50px;
      left: 500px;
    }

    .mfp-arrow-right {
      background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ny4xNzUgNDc3LjE3NSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc3LjE3NSA0NzcuMTc1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCI+CjxnPgoJPHBhdGggZD0iTTM2MC43MzEsMjI5LjA3NWwtMjI1LjEtMjI1LjFjLTUuMy01LjMtMTMuOC01LjMtMTkuMSwwcy01LjMsMTMuOCwwLDE5LjFsMjE1LjUsMjE1LjVsLTIxNS41LDIxNS41ICAgYy01LjMsNS4zLTUuMywxMy44LDAsMTkuMWMyLjYsMi42LDYuMSw0LDkuNSw0YzMuNCwwLDYuOS0xLjMsOS41LTRsMjI1LjEtMjI1LjFDMzY1LjkzMSwyNDIuODc1LDM2NS45MzEsMjM0LjI3NSwzNjAuNzMxLDIyOS4wNzV6ICAgIiBmaWxsPSIjRkZGRkZGIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==) no-Repeat top right !important;
      width: 35px;
      height: 50px;
      right: 500px;
    }

    .mfp-arrow-left::before,
    .mfp-arrow-right::before {
      display: none;
      content:''
    }

    .mfp-arrow-left::after,
    .mfp-arrow-right::after {
      display: none;
      content:''
    }
    .error-text {
        display: flex;
        font-size: 10px;
        color: red;
        margin-bottom: 5px;
    }
    h2{
        font-size: 30px!important;
    }
    .popup-label{
        padding-bottom: 20px;
    }
    .modal-title{
        font-weight: 500;
    }

    textarea{
       
    padding-left: 12px;
    padding-right: 36px;
    border-radius: 6px;
    background: #FFFFFF;
   
    border-style: solid;
    border-width: 1px;
    color: #222222;
    text-indent: 0.01px;
    font-size: 16px;
  
    }
    .popup-textarea{
        width: 100%;
        border-color: rgba(34, 34, 34, 0.15);
    }
    @media only screen and (max-width:1280px){
        .mfp-arrow-left {
            left: auto !important;
        }
        .mfp-arrow-right{
        right: 0 !important;
        }
    }
</style>
@endsection
@section('content')
@if ($project)
<section class="fulfillment-center projectBoradPage">
    @isset($projects)
    <div class="row">
        <div class="col-md-12"><p><a href="{{route('designer.project')}}" class="back-button"><< Back to editing</a></p></div>
        <div class="col-md-6">
            <div class="flex-box">
                <h2>Project Board</h2>
                {!! Form::open(['method'=>'GET','id'=>'project']) !!}
                <select name="project">
                    @foreach($projects as $key=>$name)
                    <option value="{{$key}}" {{decrypt($key) == $project->id ? 'selected' : ''}}>{{$name}}</option>
                    @endforeach
                </select>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="flex-box flex-end">
                <span>Project Estimate</span>
                <span class="amount"> 
                    @if ($project->budget != '' && $project->budget != '0')
                        @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $project->budget!="NA")
                        AED {{$project->budget * $currency["AED"]}}
                        @else
                        INR {{$project->budget}}
                        @endif
                    @else
                        @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $project->budget!="NA")
                        AED 0
                        @else
                        INR 0
                        @endif
                    @endif    
                    </span>
            </div>
        </div>

        {{-- <div class="col-md-12 text-right"><p><a href="{{\URL::signedRoute('quotation.download',['project'=>$project->id])}}"  class="back-button">Download Quotation >></a></p></div> --}}
    </div>
    @endisset
    <div class="projectBg">
        <div class="projectDetails">
            <ul>
                @foreach ($project->rooms as $room)
                <li class="">
                    <div class="title toggleHandler">
                        <span class="lable">{{$room->name}} <span class="arrow">&#10095;</span>
                        </span> <span> 
                            @if ($room->budget != '' && $room->budget != '0')
                                @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $room->budget!="NA")
                                AED {{$room->budget * $currency["AED"]}}
                                @else
                                INR {{$room->budget}}
                                @endif
                            @else
                                @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $room->budget!="NA")
                                AED 0
                                @else
                                INR 0
                                @endif
                            @endif        
                            </span>
                    </div>

                    <div class="selectedProjects toggleContent">
                        <ul class="center-images">
                            @foreach ($room->products as $product)
                            <li>
                                <div class="image-container">
                                    <div class="flex-box row">
                                        <div class="col_6 popup-gallery">
                                            <a href="{{$product->product->setColor($product->color_id)->closeup_image}}"><img style="width:100%" loading="lazy" src="{{$product->product->setColor($product->color_id)->closeup_image}}" alt="" class="" /></a>
                                            <a href="{{$product->product->setColor($product->color_id)->front_image}}"></a>
                                            <a href="{{$product->product->setColor($product->color_id)->angle_image}}"></a>
                                        </div>
                                        <div class="col_6">
                                            <div class="productDetails">
                                                <div class="flex-box">
                                                    <h2><a href="http://tulio.design/product/{{$product->product->p_cd}}">{{$product->name}}</a>  </h2>
                                                    <div class="productOption">
                                                        <span style="float:left;">
                                                            <span class="colorcircle" style="background-color:#{{$product->color}};margin-right:10px"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="priceBox">
                                                    <span> 
                                                        @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $product->price!="NA")
                                                        AED {{$product->price * $currency["AED"]}}
                                                        @else
                                                        INR {{$product->price}}
                                                        @endif
                                                        </span>
                                                </div>

                                                <div class="productInfo">
                                                    <p>Quantity - <span class="value">{{$product->quantity}}</span></p>
                                                    <p>Unit Dimensions <span class="value">{{$product->width}} X {{$product->length}} {{$product->unit}}</span></p>
                                                    <p>Lining Type - <span class="value">{{$product->lining_type}}</span></p>
                                                    <p>Hardware Type - <span class="value">{{$product->hardware_type}}</span></p>
                                                    @if ($product->hardware_type=='Motorized')
                                                        <p>Power Type - <span class="value">{{$product->power_type}}</span></p>
                                                        <p>Control Type - <span class="value">{{$product->control_type}}</span></p>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="comment-box">
                            {{-- @if ($project->user_id == optional(auth()->user(guard_name()))->id) --}}
                            <div class="comment">
                                @foreach ($room->comments as $comment)
                                <div class="comment-item">
                                    <strong> {{$comment->comment_by}} </strong> - {{$comment->comment}}
                                </div>
                                @endforeach
                            </div>
                            {{-- @endif --}}
                            {!! Form::open(['route'=>'project-room-comment','POST']) !!}
                            {!! Form::hidden('room_id', encrypt($room->id)) !!}
                            {!! Form::textarea('comment', null, ['rows'=>2,'required'=>true]) !!}
                            <button class="button button-outline" type="submit">Comment</button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </li>
                @endforeach
                <li class="flex-box total"><span class="lable">Total</span> <span class="amount"> 
                    @if ($project->budget != '' && $project->budget != '0')
                        @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $project->budget!="NA")
                        AED {{$project->budget * $currency["AED"]}}
                        @else
                        INR {{$project->budget}}
                        @endif
                    @else
                        @if (isset($_COOKIE["Currency"]) && $_COOKIE["Currency"] == "AED" && $project->budget!="NA")
                        AED 0
                        @else
                        INR 0
                        @endif
                    @endif    
                    </span></li>
            </ul>
            @isset($projects)
            <div class="centerallinged">
                <p>Congratulations! You have successfully created a project board for
                    "{{$project->name}}" <br> Share the project board with the client or proceed with the order.</p>

                <div class="actions">
                    <a href="#" class="button-outline" id="share">Share Project Board</a>
                    <a href="#" class="button-outline" id="place">Confirm Order</a>
                </div>
            </div>
            @endisset

            @if(!isset($projects))
            <div class="centerallinged">
                <div class="actions">
                    <a data-toggle="modal" data-target="#updateModal" class="button-outline" id="update-order-btn">Update Comments</a>
                    <a href="#" data-toggle="modal" data-target="#ApproveModal" class="button-outline" id="approve-order-btn">Approve Project Board</a>
                </div>
            </div>
            @endif
        </div>
    </div>




<div class="popup" id="placeorder">
    <div class="popupContent">
        {{-- <div class="closeButton">&times;</div> --}}

        <div class="title">Congratulations!</div>

        <p>Your order has been recorded. <br> Someone from the team will get in touch with you soon.</p>

        <a href="{{route('designer.project-completed')}}" class="button-bg">Done</a>
    </div>
</div>


<div class="popup" id="shareProject">
    <div class="popupContent">
        <div class="closeButton">&times;</div>
        <div class="title"><span class="lable">Client Details</span></div>
        <p>Input Clients details to share the project board.</p>
        {!! Form::open(['route'=>'designer.project-share','method'=>'POST']) !!}
            <input type="hidden" name="project_id" value="{{encrypt($project->id)}}">
            <input type="text" name="name" placeholder="Client Name">
            <span class="error-text name"></span>
            <input type="email" name="email" placeholder="Email ID">
            <span class="error-text email"></span>
            <span class="countryCode"><input type="tel" name="phone" placeholder="Mobile"  title="Please Enter 10 Digit Number" id="phone4" required></span>
                <span style="float: left;margin-top: 0;" id="valid-msg4" class="hide">✓ Valid</span>
              <span style="float: left;margin-top: 0;" id="error-msg4" class="hide"></span>
              <input type="hidden" name="iti__selected-dial-code">
 
            <span class="error-text phone"></span>
            <button style="border: 1px solid #666;
            color: #666;
            padding: 9px 20px;
            margin-top: 20px;
            cursor: pointer;" href="javascript:void(0)"  id="share-button">Share</button>
            <button href="javascript:void(0)"  style="display: none;border: 1px solid #666;
            color: #666;
            padding: 9px 20px;
            margin-top: 20px;
            cursor: pointer;" id="sharing-button">Sharing ...</button>
        </form>

        <!-- <div class="flex-box">
            <input type="text" id="link" value="{{\URL::signedRoute('project.share',['project'=>$project->id])}}">
            <a href="javascript:void(0)" id="copyLink" class="button">COPY LINK</a>
        </div> -->
    </div>
</div>
@if(!isset($projects))
{{-- modal --}}
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="promoteModalLabel">Update Project?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="popup-body-text"></p>
          <div id="popup-contact-fields">
            {!! Form::open(['route'=>'project-update','POST', 'id' => 'updateform']) !!}
                  {!! Form::hidden('projectname', $project->name) !!}
                  {!! Form::hidden('shared_name', $shared_name) !!}
                  {!! Form::hidden('user_id', $project->user_id) !!}
                  <input id="popup-form-token" name="_token" type="hidden" value="{{csrf_token()}}">
                  {!! Form::close() !!}
                  <div class="modal-footer">
                    <button id="btncontinue" type="button" onClick="popupContinue()"class="button button-outline">Update</button>
                  </div>
              
              </div>
              
            

      </div>

  </div>
</div>
</div>
{{-- modal end --}}


{{-- modal --}}
<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="promoteModalLabel">Approve Project?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="popup-body-text1"></p>
            <div id="popup-contact-fields">
                {!! Form::open(['route'=>'project-approval','POST', 'id' => 'approveform']) !!}
                    <h5 id="btncontinue2" class="popup-label">Are you sure you want to approve this project</h5>
                    {!! Form::hidden('projectname', $project->name) !!}
                    {!! Form::hidden('shared_name', $shared_name) !!}
                    {!! Form::hidden('user_id', $project->user_id) !!}
                    <input id="popup-form-token" name="_token" type="hidden" value="{{csrf_token()}}">
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        <button id="btncontinue1" type="button" onClick="popupContinue1()"class="button button-outline">Approve</button>
                    </div>
                  
                </div>
        </div>
    </div>
  </div>
  </div>
  {{-- modal end --}}
@endif




</section>
@else
<section class="fulfillment-center projectBoradPage">
    <div class="row">
        <h5>There is no Project</h5>
    </div>
</section>
@endif

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#project select").on('change',function(){
         $("#project").submit();
       });
    });
</script>

<script>

     $(document).ready(function(){

        $('.toggleHandler').click(function(){
           $(this).toggleClass('active');
           $(this).next('.toggleContent').slideToggle();
       });

        $("#place").on('click',function(){
            $.ajax({
                url:'{{route("designer.project-board.order-place")}}',
                type:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    'project':'{{encrypt($project->id)}}'
                },
                success:function(data){
                    $("#placeorder").show();
                },
                error:function(data){
                    alert(data.responseText);
                }
            });
       });
       $('#copyLink').on('click',function(){
            var copyText = document.getElementById("link");
            copyText.select();
            document.execCommand("copy");
       });
       $("#share, #shareProject .closeButton").on('click',function(){
            $("#shareProject").toggle();
        });
        $('#share-button').on('click',function(e){
            e.preventDefault();
            $('#share-button').hide();
            $('#sharing-button').show();
            $('.error-text').text('');
            let form = $(this).parents('form')
            $.ajax({
                url:form.attr('action'),
                type:'POST',
                data:form.serialize(),
                dataType: "json",
                success:function(data){
                    alert(data.message);
                    $("#shareProject").toggle();
                    $('#share-button').show();
                    $('#sharing-button').hide();
                    form.trigger('reset');
                },
                error:function(data){

                    let errors = JSON.parse(data.responseText).errors;
                    console.log(errors);
                    $.each(errors,function(key,value) {
                        $('.error-text.'+key).text(value);
                    });
                },
                complete:function(){
                    $('#share-button').show();
                    $('#sharing-button').hide();
                }
            });
        });
    });
</script>

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" integrity="sha512-jGR1T3dQerLCSm/IGEGbndPwzszJBlKQ5Br9vuB0Pw2iyxOy+7AK+lJcCC8eaXyz/9du+bkCy4HXxByhxkHf+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Magnific Popup core JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
        }
    });
});
</script>

<script type='text/javascript'>
    var continueBtn = document.getElementById("btncontinue");
    var thankText = document.getElementById("popup-body-text");


  function popupContinue(){

         //validate and send email
         var form = document.forms['updateform'];
         
      

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    thankText.innerHTML = 'Your comments have been noted and shared with the Architect/Interior Designer';
                    continueBtn.style.display='none';
                }
            }
            
            xhttp.open("POST", "/project-update", true);
            const formData = new FormData(form)
            xhttp.send(formData);
            continueBtn.innerHTML = "Loading";
            continueBtn.disabled = true;
        
        }

    </script>
    <script type='text/javascript'>
        var continueBtn1 = document.getElementById("btncontinue1");
        var thankText1 = document.getElementById("popup-body-text1");
        var continueBtn2 = document.getElementById("btncontinue2");
    
      function popupContinue1(){
    
             //validate and send email
             var form = document.forms['approveform'];
             
          
    
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        thankText1.innerHTML = 'Thank you for confirming your order.';
                        continueBtn1.style.display='none';
                        continueBtn2.style.display='none';
                    }
                }
                
                xhttp.open("POST", "/project-approval", true);
                const formData = new FormData(form)
                xhttp.send(formData);
                continueBtn1.innerHTML = "Loading";
                continueBtn1.disabled = true;
            
            }
    
        </script>

@endsection
