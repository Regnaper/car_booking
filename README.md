## Car booking

API просмотра свободных автомобилей, доступных сегодня для бронирования сотруднику компании.

Используются get-запросы к главной странице сайта.
## Параметры запроса

- start - целое число, время начала бронирования в часах сегодняшних суток
- end - целое число, время окончания бронирования в часах сегодняшних суток
- model - название модели автомобиля, для фильтрации результат по моделям
- category - название категории комфорта автомобиля, для фильтрации результат по категориям комфорта

Список доступных моделей:

- "Kia Rio"
- "Volkswagen Polo"
- "Hyundai Solaris"
- "Toyota Camry"
- "Skoda Octavia"
- "Ford Mondeo"
- "Audi A8"

Список доступных категорий комфорта

- "Категория 1"
- "Категория 2"
- "Категория 3"

Текущий сотрудник задан в коде контроллера (Васильев Василий Васильевич).
Его должность предполагает выбор из двух категорий комфорта (1-я и 2-я).

Таблица текущих забронированных автомобилей

| Начало бронирования | Окончание бронирования |            Имя пользователя           | Гос. номер автомобиля |
|---------------------|------------------------|:-------------------------------------:|-----------------------|
| 02:00:00            | 04:00:00               | Михайлов Михаил Михайлович            | c000cc99              |
| 02:00:00            | 04:00:00               | Станиславский Станислав Станиславович | c333cc99              |
| 02:00:00            | 04:00:00               | Васильев Василий Васильевич           | c222cc99              |
| 05:00:00            | 08:00:00               | Александрова Александра Александровна | c333cc99              |
| 04:00:00            | 06:00:00               | Евгеньева Евгения Евгеньевна          | c888cc99              |
| 05:00:00            | 08:00:00               | Володин Владимир Владимирович         | c999cc99              |

Возможно бронирование одним сотрудником нескольких автомобилей в течение дня. 
Проверка одновременного бронирования сотрудником нескольких автомобилей не производится.
