# currency-rates
Необходимо создать приложение для отображения курса валют. Валюты, с которыми работает приложение, ограничить 3-мя основными - USD, EUR, RUB, но предусмотреть возможность легкого добавления новых валют.
Приложение состоит из следующих страниц:
* Страница с текущим курсом базовой валюты по отношению к остальным и онлайн конвертером в рубли;
* История изменения курса базовой валюты за последние 5 дней к выбранной;

Базовая валюта - валюта по отношению к которой отображаются остальные, т.е., например, базовая валюта USD, тогда вывод следующий:
- 1 USD = 62.23 RUB
- 1 USD = 0.82 EUR

Текущий курс и историю изменения получать с помощью api http://fixer.io/. Предусмотреть в интерфейсе выбор и запоминание базовой валюты, по умолчанию базовая валюта USD.

Онлайн конвертация - форма, которая позволяет задать в поле сумму в базовой валюте и рассчитать сколько это будет в рублях. Опционально можно сделать обработку данной форма с помощью AJAX.

Верстка страниц лежит в репозитории. Всю работу вести в своей отдельной ветке текущего репозитория.


