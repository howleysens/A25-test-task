<h2 style="text-align:center">Тестовое задание</h2>
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
<details>
<summary>Содержание ТЗ</summary>
<img src="https://i.imgur.com/ozDBn7R.png" style="max-width: 100%;">
</details>
<h2>Установка</h2>
* Клонировать репозиторий <code>git clone https://github.com/howleysens/A25-test-task.git</code>
<br>
* Скопировать и создать из файла <code>.env.example</code> файл <code>.env</code>
<br>
* Установить зависимости командой <code>composer install</code>
<br>
* Выполнить миграции: php artisan <code>migrate</code>
<br>
<h2>API</h2>
* Создание сотрудника
<br>
<code>http://127.0.0.1:8000/employee</code> (JSON параметры <code>email</code>, <code>password</code>)</code>
<br>
* Принятие транзакции
<br>
<code>http://127.0.0.1:8000/transaction</code> (JSON параметры <code>employee_id</code>, <code>hours</code>)</code>
<br>
* Вывод суммы всех сотрудников
<br>
<code>http://127.0.0.1:8000/employees/unpaid-salaries</code>
<br>
* Выплата всей накопившейся суммы
<br>
<code>http://127.0.0.1:8000/employees/pay-salaries</code>
