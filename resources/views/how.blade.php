@extends ('layout')

@section ('content')

<section class="second_key">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3> {{ __('layout.how') }} </h3>
          {!! __('layout.how_descr') !!}
      </div>
      <div class="col-md-6">
        <img src="/img/Как.png" width="497" height="331">
      </div>
    </div>
  </div>
</section>
<section class="second_key_2">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="/img/Что.png" width="445" height="296">
      </div>
      <div class="col-md-6">
        <h3> {{ __('layout.what') }} </h3>
          {!! __('layout.what_descr') !!}
      </div>
    </div>
  </div>
</section>
<section class="second_key_3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3> {{ __('layout.roulesW') }} </h3>
          <p><img src="/img/1.png" width="58">{{ __('layout.roule1') }}</p>
          <p><img src="/img/2.png" width="58">{{ __('layout.roule2') }}</p>
          <p><img src="/img/3.png" width="58">{{ __('layout.roule3') }}</p>
          <p><img src="/img/4.png" width="58">{{ __('layout.roule4') }}</p>
      </div>
      <div class="col-md-6">
        <img src="/img/Правила.png" width="497" height="289">
      </div>
    </div>
  </div>
</section>
<section class="second_key_4">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <img src="/img/анкета.png" width="81" style="padding-top: 93px">
        <img src="/img/шестеренка.png" width="81" style="padding-top: 91px">
      </div>
      <div align="center" class="col-md-10">
        <h3> {{ __('layout.instr') }} </h3>
          <span> {{ __('layout.step1') }}</span>
          <p style="margin-top: 15px"> {{ __('layout.step2') }}</p>
          <p style="margin-top: 15px">{{ __('layout.step3') }}</p>
          <p style="margin-top: 15px">{{ __('layout.step4') }}</p>
          <p style="margin-top: 15px">{{ __('layout.step5') }}</p>
      </div>
      <div class="col-md-1">
        <img src="/img/блокнот.png" width="79" style="padding-top: 180px">
        <img src="/img/Рисунок5.png" width="58" style="padding-top: 115px; margin-left: 15px">
    </div>
  </div>
</section>
<p style="text-align: center;"><img src="img/step1.png" style="padding-bottom: 219px"></p>



@endsection