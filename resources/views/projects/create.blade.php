@extends ('layout')

@section ('content')
<section class="sozdanie">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<form method = "POST" action = "/projects" enctype="multipart/form-data" style="padding-top: 50px;margin-left: 85px">
                @csrf
				<p> Название проекта </p>
				<input type = "text" name = "name" id = "name" style="width: 700px;border-radius: 15px;margin-bottom: 22px"> <br>
				<p>Обложка</p>
				<input type = "file" name = "image" id = "image" style="margin-bottom: 40px"> <br>
				<p> Описание проекта</p>
				<textarea id = "description" name = "description" style="height: 203px;width: 700px;border-radius: 15px;margin-bottom: 51px"></textarea><br>
				<p> Тематика </p>
				<input type = "text" name = "subjects" id = "subjects" style="height: 51px;width: 700px;border-radius: 15px;margin-bottom: 42px;"> <br>
				<p> Необходимая сумма (рубли)</p>
				<h3 style="font-family: Montserrat;font-size: 36px;font-style: normal;font-weight: 400;line-height: 44px;letter-spacing: 0em; text-align: left"><input type = "number" name = "money_required" id =  "money_required" style="height: 51px;width: 230px;border-radius: 15px;margin-bottom: 42px;margin-right: 10px">₽</h3>
				<p> Длительность проекта (дней) </p>
				<input type = "number" name = "final_date" id = "final_date" style="height: 51px;width: 230px;border-radius: 15px;margin-bottom: 42px">
				<p> Сопровождающая документация</p>
				<input type = "file" name = "documents[]" required multiple style="width: 255px;height:50px;margin-bottom: 50px">
				</form>
			</div>
			<div class="col-lg-4">
				<h2 style="font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 800;letter-spacing: 0em;text-align: left; margin-top: 51px;padding-left: 45px;padding-bottom:10px">Проекты не принимающиеся к размещению на платформе: </h2>
				<h6> - преследующие личную цель и не имеющие прямой связи с творческой или общественно-полезной деятельностью,</h6>
				<h6> - имеющие в качестве основной цели сбор средств на рекламу и продвижение,</h6>
				<h6> - связанные с политической деятельностью,</h6>
				<h6> - связанные с религиозной деятельностью,</h6>
				<h6> - противоречащие морально-этическим нормам общества,</h6>
				<h6> - противоречащие законодательству Российской Федерации,</h6>
				<h6> - размещенные на аналогичной платформе,</h6>
				<h6> - не соответствующие целям и задачам платформы.</h6>
				<p style="padding-left: 50px;margin-top: 35px;font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em;text-align: left">Море имеет право отказать в допуске к запуску проекта без объяснения причин отказа. Однако, автор имеет право подать апелляцию</p>
			</div>
		</div>
	</div>
</section>
<section class=button-zayavka>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<center><button type="submit" value="Отправить заявку" class="button-prj" style="height: 61px;width: 415px;border-radius: 15px;font-family: Montserrat;font-size: 24px;font-style: normal;font-weight: 400;line-height: 29px;letter-spacing: 0em;text-align: center">Отправить заявку</button></center>
			</div>
		</div>
	</div>
</section>




@endsection