#Установка и запуск

<ol>
    <li>Установите <strong>Docker</strong>.</li>
    <li>Установите <strong>Composer</strong>.</li>
    <li>Распакуйте архив с кодом (либо клонируйте из репозитория) и перейдите в его директорию.</li>
    <li>Запустите в консоли: <strong>composer install</strong>. Дождитесь конца установки пакетов.</li>
    <li>Запустите в консоли: <strong>docker-compose up --build</strong>.</li>
    <li>Подождите пока устанавливаются необходимые для разворачивания контейнеров приложения.</li>
    <li>Все последующие запуски достаточно будет запуска через ввод в консоли <strong>./run</strong>.</li>
    <li>После запуска всех контейнеров сайт должен быть доступен по адресу: "<strong>http://localhost:100</strong>".</li>
    <li>PHPMyAdmin будет доступен по адресу: "<strong>http://localhost:8100</strong>".</li>
    <li>Файл с дампом базы данных -"<strong>dump.sql</strong>".</li>  
</ol>
<h2>Данные для входа в PHPMyAdmin:</h2>
<ul>
    <li>Сервер: <strong>vrgs_mysql</strong></li>
    <li>Пользователь: <strong>root</strong></li>
    <li>Пароль: <strong>root</strong></li>
</ul>