# Genesis Software Engineering School PHP Case

## Запуск
Після клонування репозиторію, необхідно встановити залежності Laravel, щось на кшталт цього:
```
1.Run git clone <my-cool-project>
2.Run composer install
3.Run cp .env.example .env
4.Run php artisan key:generate
```
Для того, щоб розсилка працювала, необхідно в файлі .env вказати дані для підключення до SMTP сервера.  
```
MAIL_DRIVER = smtp
MAIL_HOST = (smtp-хост)
MAIL_PORT = (smtp-порт)
MAIL_USERNAME = (адреса електронної пошти)
MAIL_PASSWORD = (пароль до пошти)
MAIL_ENCRYPTION = (тип шифрування)
MAIL_FROM_ADDRESS=(адреса електронної пошти)
MAIL_FROM_NAME=(ім'я відправника)
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
