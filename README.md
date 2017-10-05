# Тестовое задание
## API для учёта счетчиков 

### Установка
```
git clone https://github.com/YokiToki/test-task.git
cd test-task
composer install

//для внесения тестовых значений
php yii seed
php yii seed/values
```

### Описание методов

#### GET /api/counters
Возвращает все счетчики
#### GET /api/counters/{counter_id}
Возвращает счетчик по передпнному counter_id со всеми показаниями
#### POST /api/counters
Создает новый счетчик
#### DELETE /api/counters/{counter_id}
Удаляет счетчик по передпнному counter_id со всеми показаниями
#### PUT /api/counters/{counter_id}
Обновляет переданную информацию о счетчике по counter_id
#### POST /api/values/{counter_id}
Вносит показания в базу данных
#### DELETE /api/values/{counter_id}
Удаляет показания по переданному counter_id и идентефикатору показаний
#### PUT /api/values/{counter_id}
Обновляет информацию в последних переданных показаниях по counter_id