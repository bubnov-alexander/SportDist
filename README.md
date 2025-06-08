# Fitness Tracker Backend (Laravel + Filament)

Проект — backend часть фитнес-приложения с использованием **Laravel** и **Filament Admin Panel**. Позволяет управлять тренировками, упражнениями, прогрессом и планами тренировок.

---

## 🚀 Быстрый старт

### 1. Клонирование репозитория

```bash
git clone https://github.com/your-username/fitness-tracker.git
cd fitness-tracker
```

### 2. Установка зависимостей

```bash
composer install
```

### 3. Конфигурация

Скопируйте `.env`:

```bash
cp .env.example .env
```

Настройте базу данных в `.env`:

```
DB_DATABASE=fitness_db
DB_USERNAME=root
DB_PASSWORD=secret
```

Сгенерируйте ключ:

```bash
php artisan key:generate
```

### 4. Миграции

```bash
php artisan migrate
```

### 5. Запуск сервера

```bash
php artisan serve
```

### 6. Установка Filament (опционально для админки)

```bash
composer require filament/filament
php artisan make:filament-user
```

---

## 🧩 Модели

### Workout

* `user_id` — владелец тренировки
* `title`, `description`, `duration`, `is_completed`
* Отношения:

    * `user()`
    * `workoutExercises()`

### Exercise

* Название упражнения, описание, группа мышц, инвентарь, длительность в минутах
* Отношения:

    * `workoutExercises()`

### WorkoutExercise (Pivot)

* `workout_id`, `exercise_id`
* Доп. поля: `sets`, `reps`, `order`

### Progress

* Привязка к пользователю и тренировке
* Отслеживание: `performed_at`, `duration`, `calories_burned`

### Routine

* План тренировок (`title`, `description`)

---

## 📦 Примеры Artisan-команд

Создание миграций и моделей:

```bash
php artisan make:model Exercise -m
php artisan make:model WorkoutExercise -m
```

---

## ✅ Планы

* Добавить модели Goal, Reminder, Category
* API для мобильного клиента

---
