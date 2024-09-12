# Laravel 10 Accessors & Mutators Demo

This project demonstrates how to use Accessors and Mutators in Laravel 10 to manage and manipulate data in your models. Specifically, it showcases how to handle first name and last name fields using Laravel's `User` model, providing a `full_name` attribute through an Accessor and ensuring proper formatting of names using Mutators.

## Features
- **Accessors**: Create a virtual `full_name` attribute that combines `first_name` and `last_name`.
- **Mutators**: Automatically format the `first_name` and `last_name` to capitalize the first letter before saving them to the database.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP 8.1 or higher
- Composer
- MySQL or any other supported database
- Laravel 10

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/nikhilmusale7816/laravel-accessor-mutator-demo.git
    ```

2. Navigate to the project directory:
    ```bash
    cd laravel-accessor-mutator-demo
    ```

3. Install the dependencies:
    ```bash
    composer install
    ```

4. Set up the `.env` file:
    - Duplicate the `.env.example` file and rename it to `.env`.
    - Update the database credentials and other necessary environment variables.

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Run the migrations to create the necessary database tables:
    ```bash
    php artisan migrate
    ```

7. Start the local development server:
    ```bash
    php artisan serve
    ```

## Usage

1. **Creating a User**:
   You can create a new user via Laravel Tinker:

    ```bash
    php artisan tinker
    ```

    Inside Tinker, create a user:

    ```php
    $user = App\Models\User::create([
        'name' => 'John Doe',
        'first_name' => 'john',
        'last_name' => 'doe',
        'email' => 'john.doe@example.com',
        'password' => bcrypt('password'),
    ]);
    ```

2. **Access the Full Name**:
    You can retrieve the full name using the `full_name` attribute:

    ```php
    $user->full_name; // Output: John Doe
    ```

3. **Check the Database**:
    After creating the user, check your database to see that the `first_name` and `last_name` fields are automatically formatted (capitalized) when saved.

## Accessors & Mutators Implementation

The logic for Accessors and Mutators is implemented in the `User` model (`app/Models/User.php`):

### Accessor for Full Name

```php
public function getFullNameAttribute(): string
{
    $firstName = $this->first_name ?? '';
    $lastName = $this->last_name ?? '';

    return ucfirst($firstName) . ' ' . ucfirst($lastName);
}

public function setFirstNameAttribute($value): void
{
    $this->attributes['first_name'] = ucfirst(strtolower($value));
}

public function setLastNameAttribute($value): void
{
    $this->attributes['last_name'] = ucfirst(strtolower($value));
}


