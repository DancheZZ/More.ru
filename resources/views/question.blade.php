@extends ('layout')

@section ('content')
<div class = "container content">
  <div class="row">

  <div class="col-md-2 mt-md-0 pt-0">
  </div>

  <div class="col-md-9 mt-md-0 pt-0" >
		<p class="articl">
		{{ __('layout.svyaz') }}
		</p>
		<h1></h1>
    <br>

    <form action="/question" method="POST">
    @csrf
      <p>{{ __('layout.write_question') }}</p>
      <textarea rows="10" cols="45" name="text" class="message-text-area" maxlength="180"></textarea></p>
      <br>
      <p>{{ __('layout.ur_email') }}</p> <div id = "mail_gue_error2"> </div>
      <input type="email" class="e-mail" name = "email2" id = "email2" onblur = "validate_email_quest()"> <br><br>
         
    <center><button type="submit" value="{{ __('layout.get_question') }}" class="button-prj" id = "sub1" onclick = "prov()" style = "margin-bottom: 30px">{{ __('layout.get_question') }}</button></center>
	</form>
 
  </div>
  <br> <br>
  
  
  </div>
</div>
<br>


@endsection
