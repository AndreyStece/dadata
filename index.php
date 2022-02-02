<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dadata Service</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="script.js"></script>
</head>

<body>
  <div class="container">
    <h1 class="title">
      iq dev
    </h1>
    <h2 class="description">
      Тестовое задание
    </h2>
    <form id="geo_ip" class="form-style">
      <h3 class="block_name">Определение геопозиции пользователя по IP</h3>
      <input class="input-style input-geo_ip" name="ip_address" type="text" minlength="7" maxlength="15"
        placeholder="255.255.255.255">
      <button class="btn-style" type="button" onclick="find_geo_ip()">Найти</button>
      <div class="print print-success">
        <label class="label-success">Результат:</label>
        <span id="result">г Тюмень</span>
      </div>
      <div class="print print-error">
        <label class="label-error">Ошибка:</label>
        <span>Неверный формат IP</span>
      </div>
    </form>

    <form id="auto_hint" class="form-style">
      <h3 class="block_name">Вывод подсказок при вводе адреса</h3>
      <input class="input-style input-auto_hint" name="city_address" type="text"
        placeholder="г Тюмень, ул Мельникайте, д 55, кв 1" list="address_list" autocomplete="off"
        oninput="find_auto_hint()">
      <datalist id="address_list" class="list-style">
      </datalist>
    </form>
  </div>
</body>

</html>
