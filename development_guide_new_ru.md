# Введение #

Проект yiiext - набор качественных независимых расширений, выполненных в едином стиле.

# Именование расширений #

Название расширения должно состоять из имени и суффикса, отражающего тип расширения (Behavior, Widget, etc). Например: TaggableBehavior.php, NestedSetBehavior.php

Примечание: предыдущая система именования была избыточной.

# Хранение расширений #

Каждое расширение должно иметь свою директорию. Название директории полностью состоит из маленьких букв. Группа расширений сходных по смыслу может храниться в одном каталоге.

Примеры одиночных расширений:
/extensions/taggable/TaggableBehavior.php
/extensions/markitup/MarkitupWidget.php

Пример группы расширений сходных по смыслу:
/extensions/trees/NestedSetBehavior.php
/extensions/trees/AdjacencyListBehavior.php

Примечание: предыдущая система хранения кроме головной боли ничего не приносила. При подключении расширений приходилось много ходить по каталогам и удалять те расширения, которые не используются в рамках конкретного проекта. Новая система хранения расширений полностью устраняет этот недостаток. Для использования тех или иных расширений из набора yiiext достаточно скопировать интересующие расширения в extensions и начать использовать. Копировать весь набор не имеет смысла.

Примечание 2: только создатели фреймворка могут гарантировать BC на свой продукт. Создатели расширений такой гарантии дать не могут, потому что зачастую логичнее выпустить оперативно новую версию расширения, использующую новые возможности фреймворка, а также измененить API. Поэтому гарантию безпроблемной работы может дать только копия конкретной версии конкретного расширения. При обновлении расширения к каждому из них нужно подходить персонально, чего нельзя сделать просто обновив набор.

# Документация к расширениям #
Пока ясно, что должна храниться в отдельном от расширений месте. Требуется проработка концепта.

# Тесты #
Пока ясно, что нужно переходить на SQLite (+подъем базы из sql файла), как это было сделано с тестами фреймворка и хорошо себя зарекомендовало.