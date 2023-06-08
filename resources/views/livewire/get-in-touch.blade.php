<style>
    #error-msg1 {
    color: red !important;
    margin-bottom: 12px;
    margin-top: -12px;
    font-size: 14px
}

#valid-msg1 {
    color: green !important;
    margin-bottom: 12px;
    margin-top: -12px;
    font-size: 14px
}

.form-success-text{
    font-size: 18px;
    font-family: 'Montserrat';
    font-weight: 400;
    color: "#666";
    padding: 0px 0px 30px;
}

.hide {
display: none;
}
</style>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#fldappend').hide();
        
        $(document).on('click','#homeowner',function(){
            
            var hide = $('#homeowner').val();
            
            if(hide == 'homeowner')
            {
                $('#fldappend').hide(); 
            }
            
        });
        
        $(document).on('click','#hotelier',function(){
            
            var selectOption = $(this).val();
           
            if(selectOption == 'hotelier')
            {
                $('#fldappend').show();
            }
           
        });
        
        $(document).on('click','#architect',function(){
          
          var selectOption = $(this).val();
          
          if(selectOption == 'architect')
            {
                $('#fldappend').show();
            }
            
        });
        
    });
    
</script>



<div class="footer-form">
    <h2>Get in touch with us</h2>
    <span id="form-success"></span>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form name="get-in-touch-form" method="post">
        <div class="radio-btns">
            <ul name="type" class="flex-box" >
                <li>
                <input type="radio" id="homeowner" checked name="type" wire:model.defer="form.type" value="homeowner" />
                <label for="homeowner">Homeowner</label>
                </li>
                <li>
                <input type="radio" id="hotelier" name="type" wire:model.defer="form.type" value="hotelier" />
                <label for="hotelier">Hotelier</label>

                </li>
                <li>
                <input type="radio" id="architect" name="type" wire:model.defer="form.type" value="architect" />
                <label for="architect">Architect & Interior Designer</label>
                </li>
            </ul>
        </div>

        <div class="form-footer-home">
        <div class="fields">
            <div class="field">
            {!! Form::text('popup-name', null, ["placeholder"=>"Name","required","class"=>"name","wire:model.defer"=>"form.name"]) !!}
                @error('form.name')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            </div>
            
        <div class="fields">
            <div class="field" id="fldappend" >
                {!! Form::select('popup-size', ['1'=>'1 Cr - 5 Cr','2'=>'5 Cr - 10 Cr','3'=>'10 Cr - 20 Cr','4'=>'20+ Cr'],
                    request('size'),['class'=>'size','id'=>'size','placeholder'=>'Select Handling Size','wire:model.defer'=>'form.name']) !!}
            </div>
        </div>
            
            
            <div class="fields">
                <div class="field">
                {!! Form::tel('popup-number', null, ["placeholder"=>"Mobile","required","class"=>"phone-no","wire:model.defer"=>"form.phone",'id'=> 'phone1']) !!}
                    <span id="valid-msg1" class="hide">✓ Valid</span>
                  <span id="error-msg1" class="hide"></span>
                  <input type="hidden" name="iti__selected-dial-code">
                @error('form.phone')
                    <strong>{{ $message }}</strong>
                @enderror
                </div>
                <div class="field">
                {!! Form::text('popup-email', null, ["placeholder"=>"Email","required","class"=>"email-id","wire:model.defer"=>"form.email"]) !!}
                @error('form.email')
                    <strong>{{ $message }}</strong>
                @enderror
                </div>
            </div>


        </div>
        <input id="popup-form-token" name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="flex-box">
            <div class="checkbox">
                <input type="checkbox" id="newsletter" name="newsletter" checked  value="newsletter">
                <label for="newsletter">
                    <p class="bold">Sign up for Tulio Newsletter</p>
                    <p>be the first to know about new updates and offers</p>
                </label>
            </div>
            <div class="button" style="width: 30% !important;">
                <button id="gib-submit" onclick="submitform()" class="cta-button-black" type="button">Submit</button>
            </div>
        </div>
    </div>
    </form>


    <script>
    function submitform(){
    
        var formSubmitBtn = document.getElementById("gib-submit");
        var formSuccess= document.getElementById("form-success");
        //validate and send email
        var form = document.forms['get-in-touch-form'];
    
    
    
        if( form.reportValidity()){
    
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                formSuccess.innerHTML = 'Someone will be with you shortly';
                formSuccess.classList.add('form-success-text'); 
                formSubmitBtn.style.display='none';
    
            }
        }
        
        xhttp.open("POST", "/contact-mail", true);
        const formData = new FormData(form)
        xhttp.send(formData);
        formSubmitBtn.innerHTML = "Loading";
        formSubmitBtn.onclick = function(){console.log("please wait")};
    
        }else{
            console.log("not sending");
            
        }
    
    }
    </script>
    