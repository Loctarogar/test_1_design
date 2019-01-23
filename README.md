Задача на проектирование
Описание задачи
Заказчику требуется сервис для определения профессии или социальной группы пользователей.
Для выполнения этой задачи пользователю должна быть предоставлена возможность пройти опрос с заранее составленными ответами. В каждом из вопросов можно выбрать только один ответ.
Результат прохождения опроса — вероятность (в процентах), с которой пользователя можно отнести к профессии или к социальной группе. Процент должен вычисляться с использованием алгоритма, который неким образом должен оценивать выбранные ответы.

Пример теста:
Вопрос №1: “Любите ли вы выпекать пироги?”
Ответ №1: Люблю.
Ответ №2: Думаю только об этом, не могу спать.
Ответ №3: Нет.

Вопрос №2: “Как вы относитесь к еде ?”
Ответ №1: Очень люблю вкусно поесть.
Ответ №2: Отношусь спокойно.
Ответ №3: Я — дизайнер блюд в ресторане.

Вопрос №3: “Умеете ли вы варить суп?”
Ответ №1: Нет
Ответ №2: Да
Ответ №3: Наверное

Алгоритмы расчета
Алгоритм расчета для профессии “Повар”, используя эти вопросы, позволяет определить, насколько пользователю подходит профессия повара.
Алгоритм расчета для социальной группы “Гурман”, используя эти вопросы, позволяет определить, насколько респондент соответствует этой социальной группе.
Задача
Спроектировать архитектуру приложения для подготовки и проведения тестирования.
Описать логику взаимодействия классов в файле example.php, где будет использовано ваше решение.
Опционально. Добавьте тест и алгоритм, который сможет определить, насколько правдиво человек отвечает на вопросы.
Уточнения
Реализация должна позволять добавлять новые алгоритмы без изменения классов-сущностей
Тест дан для примера, т.е. реализация не должна зависеть от конкретных вопросов/ответов.
