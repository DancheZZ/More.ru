@extends ('layout')

@section ('content')
<section class="sozdanie">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<form method = "POST" action = "/projects" enctype="multipart/form-data" style="padding-top: 50px;margin-left: 85px">
                @csrf
				<p> {{ __('layout.name_prj') }} </p>
				<input type = "text" name = "name" id = "name" style="width: 700px;border-radius: 15px;margin-bottom: 22px" maxlength="30"> <br>
				<p>{{ __('layout.obl') }}</p>
				<input type = "file" name = "image" id = "image" style="margin-bottom: 40px" accept=".jpg, .jpeg, .png"> <br>
				<p> {{ __('layout.descr_prj') }}</p>
				<textarea id = "description" name = "description" style="height: 203px;width: 700px;border-radius: 15px;margin-bottom: 51px" maxlength="180"></textarea><br>
				<p> {{ __('layout.theme') }} </p>
				<input type = "text" name = "subjects" id = "subjects" style="height: 51px;width: 700px;border-radius: 15px;margin-bottom: 42px;"> <br>
				<p> {{ __('layout.need') }}</p>
				<h3 style="font-family: Montserrat;font-size: 36px;font-style: normal;font-weight: 400;line-height: 44px;letter-spacing: 0em; text-align: left"><input type = "number" name = "money_required" id =  "money_required" style="height: 51px;width: 230px;border-radius: 15px;margin-bottom: 42px;margin-right: 10px">₽</h3>
				<p> {{ __('layout.dlit') }} </p>
				<input type = "number" name = "final_date" id = "final_date" style="height: 51px;width: 230px;border-radius: 15px;margin-bottom: 42px">
				<p> {{ __('layout.docs') }} </p>
				<input type = "file" name = "documents[]" required multiple style="width: 255px;height:50px;margin-bottom: 50px">
				<section class=button-zayavka>
	<div class="container">
		<div class="row">
			@if(auth::user())
				<div class="col-lg-12">
					<center><button type="submit" value="{{ __('laout.send') }}" class="button-prj" style="height: 61px;width: 415px;border-radius: 15px;font-family: Montserrat;font-size: 24px;font-style: normal;font-weight: 400;line-height: 29px;letter-spacing: 0em;text-align: center">{{ __('layout.send') }}</button></center>
				</div>
			@endif
			@if (!auth::user())
				<div class="container">
					<center><p style="font-family: Montserrat;font-size: 24px;">{{ __('layout.noAuth') }}</p></center>
				</div>
			@endif
			</div>
			</div>
			</section>

				</form>
			</div>
			<div class="col-lg-4">
				<h2 style="font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 800;letter-spacing: 0em;text-align: left; margin-top: 51px;padding-left: 45px;padding-bottom:10px">{{ __('layout.noprj') }} </h2>
				{!! __('layout.create_roules') !!}
				<p style="padding-left: 50px;margin-top: 35px;font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em;text-align: left">{{ __('layout.otkaz') }}</p>
			</div>
		</div>
	</div>
</section>




@endsection