<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<form method = "POST" action = "/projects" enctype="multipart/form-data">
@csrf
<p> Название проекта </p>
<input type = "text" name = "name" id = "name"> <br>
<p>Обложка проекта </p>
<input type = "file" name = "image" id = "image"> <br>
<p> Описание проекта</p>
<textarea id = "description" name = "description" maxlength=180 ></textarea><br>
<p> Тематика </p>
<input type = "text" name = "subjects" id = "subjects"> <br>
<p> Необходимая сумма (рубли)<p>
<input type = "number" name = "money_required" id =  "money_required">
<p> Длительность проекта (дней) </p> <br>
<input type = "number" name = "final_date" id = "final_date"> <br>
<p> Сопровождающая документация</p> <br>
<input type = "file" name = "documents[]" required multiple>
<p><input type="submit" value="Отправить заявку "></p>
</form>

</html>