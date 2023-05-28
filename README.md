# Genesis Software Engineering School PHP Case

## Запуск
Для того, щоб розсилка працювала, необхідно в файлі .env вказати дані для підключення до SMTP сервера.  
```
MAIL_DRIVER = smtp
MAIL_HOST = (smtp-хост)
MAIL_PORT = (smtp-порт)
MAIL_USERNAME = (адреса електронної пошти)
MAIL_PASSWORD = (пароль до пошти)
MAIL_ENCRYPTION = (тип шифрування)
```
Для запуску контейнерів, використайте цю команду в папці с проєктом:
```bash
docker compose up -d
```
Після цього API буде доступно на порті 80.

## Викроистанні технології
Мова - PHP  
Фреймворк - Laravel  
SMTP - Gmail  
API для отримання актуальних курсів валют - https://bitpay.com/  

## Автор
Mykola Vorontsov, esketitpunkinaf@gmail.com
