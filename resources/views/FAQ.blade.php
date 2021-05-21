@extends ('layout')

@section ('content')
<section class="FAQ">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2> Часто задаваемые вопросы:</h2>
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                1. Просматривает ли команда Море проекты перед их запуском?</a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <h6>Да. Перед запуском автор отправляет свой проект на модерацию. Команда Море оценивает проекты на предмет соответствия критериям, представленным в Правилах площадки.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                2. Оценивает ли команда Море способность автора завершить проект?
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
             <h6>Нет. Мы считаем, что лучшим показателем жизнеспособности проекта являются оценки, мнения и комментарии участников.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                3. Как автор может начать проект?
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <h6>На стартовой странице сайта размещена кнопка «Создать проект». Нажав на неё, на открывшейся странице автор выбирает нужный тип проекта и знакомится с дополнительной полезной информацией.
            По мере готовности автор отправляет проект на модерацию, результаты которой становятся ему известны в течение 7 дней. В случае, если проект удовлетворяет всем критериям платформы, то он одобряется к запуску, а автор может выбрать любое удобное время для запуска проекта.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                4. Каким образом команда Море производит процедуру проверки проекта?
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
            <h6>Каждый день командой просматриваются новые предлагаемые авторами проекты.
            В первую очередь оцениваются такие факторы, как: новизна идеи, интересное вознаграждение или видеопрезентация проекта.
            После отправки проекта на модерацию, он попадает в режим ожидания. После проверки проекта на соответствие Правилам платформы и критериям оформления, автору сообщается о её результатах в течение 7 дней.
            В случае одобрения проекта автор может приступить к его запуску. При отклонении проекта и несогласии с этим, автор может подать апелляцию в поддержку платформы.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFive">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                5. Какие проекты принимаются к рассмотрению на Море?
                </a>
              </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
            <h6>На Море представлены проекты из разных сфер, таких как музыка, литература, кино, театр, фотография, дизайн, игры и многое другое. Для размещения на платформе проект должен соответствовать требованиям, установленным в Правилах пользования платформой.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingSix">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                6. Какие проекты не принимаются к размещению на платформе?
                </a>
              </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
            <h6>Проекты не принимающиеся к размещению на платформе:<br>
            · преследующие личную цель и не имеющие прямой связи с творческой или общественно-полезной деятельностью,<br>
            · имеющие в качестве основной цели сбор средств на рекламу и продвижение,<br>
            · связанные с политической деятельностью,<br>
            · связанные с религиозной деятельностью,<br>
            · противоречащие морально-этическим нормам общества,<br>
            · противоречащие законодательству Российской Федерации,<br>
            · размещенные на аналогичной платформе,<br>
            · не соответствующие целям и задачам платформы.<br>
            Море имеет право отказать в допуске к запуску проекта без объяснения причин отказа. Однако, автор имеет право подать апелляцию.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingSeven">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                7. Как создать проект на платформе Море?</a>
              </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
            <h6>1. Первым шагом является регистрация пользователя.<br>
            2. После регистрации на стартовой странице нажать на кнопку «Создать проект».<br>
            3. Ознакомьтесь с правилами и краткими советами по созданию проекта, а также с условиями «Пользовательского соглашения».<br>
            4. Заполните все поля редактора проектов (название, описание, срок проекта, его цель, вознаграждения и т.д.).<br>
            5. Сохраните и отправьте черновик проекта на модерацию.</h6>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingEight">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                8. Как составить грамотное описание проекта?</a>
              </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
            <h6> · В названии должна отражаться цель создания проекта. Она должна быть чёткой и понятной другим пользователям. Можно рассказать, как и почему она возникла, дать краткую историческую справку.<br>
            · Начать описание проекта следует с представления себя автором: кто он, чем занимается, описать свои достижения, другие интересные работы. Приветствуются ссылки на другие работы и фото и видеопрезентация автора в работе, а также упоминания автора в СМИ, если таковые имеются.<br>
            · Обязательно распишите что необходимо для достижения цели и реализации идеи.<br>
            · Описание проекта можно изменять и дополнять в ходе его демонстрации. Этот процесс осуществляется с помощью сервиса поддержки платформы.<br></h6>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>



@endsection