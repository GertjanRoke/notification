# Notification
Flash notification that accepts a array and string.
You can use it from your controller and also in the views.

## Install
```bash
composer require snatertj/notification
```

## After install

#### ServiceProvider
Add the following line to `config/app.php`.

at `providers`:

```php
Snatertj\Notification\NotificationServiceProvider::class,
```

And at `aliases`:

```php
'Notification' => Snatertj\Notification\Facade\Notification::class,
```

#### Publish files
Run the following command:

```bash
php artisan vendor:publish
```

## Usage

#### Including the flash message in your view
To see the flash notification(s), you need to add the following `@include()`.

```html
@include('notification::message')
```

And if you want the basic styling that comes with the package, also inlcude the following lines:

```html
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/notification-style.css') }}">
```

And the javascript:

```html
<script src="{{ asset('assets/js/notification.js') }}"></script>
```
###### NOTE: You also need the jQuery library.

## Usage from the Controller

### available functions
Creating a notification can be done with the next commands:

```php
Notification::
    - success()
    - error()
    - warning()
    - info()
    - overlay() // Bootstrap modal
```

You can also add the class "Important" to the alert message, with the following command:

```php
Notification::error('message', 'title')->important();
```

#### Message variables
You can send a message as a string or as a array.

Syntax:
```php
Notification::success([
                    'First success',
                    'Second success title' => [
                        'First success',
                        'Second success'
                    ],
                    'Third success'
                ]);

Notification::success('First success');
```

#### Title
The last string is the title. You have two options: give a string or leave it blank.

With title:
```php
Notification::success('First success', 'Title success block');
```

Without title:
```php
Notification::success('First success');
```

#### Overlay function
When you want to use a [Modal from bootstrap](http://getbootstrap.com/javascript/#modals) you can do so with the following function and syntax:

```php
Notification::overlay( 'Message', 'Title' );
```
###### NOTE: All the given variables need to be a string.


## Usage from the view
You can also create a notification from the view file, this is usefull when your using a ajax form.

### available functions
Creating a notification can be done with the next commands:

```js
Notification.
    - success()
    - error()
    - warning()
    - info()
    - overlay() // Bootstrap modal
```

### Messages, Title and Important
You can send a message as a string or as a array.

###### NOTE: The overlay function only accepts strings.

#### Messages
The following syntax is used at all functions but NOT FOR: `.overlay()`:

Single message:
```js
Notification.success( 'First message' );
```

Multiple single messages:
```js
Notification.success( ['First message', 'Second message', 'Third message'] );
```

Grouping messages:
```js
Notification.success( {'Third message with array': ['First message', 'Second message']} );
```

Grouping messages inside a Array of messages:
```js
Notification.success( ['First message', 'Second message', {'Third message with array': ['First message', 'Second message']}] );
```

#### Title
Adding a title to a notification:

```js
Notification.success( 'message', 'The Title goes after the message' );
```

#### Important
Adding the class `important` to your notification is easly done with adding a boolean as last variable:

```js
Notification.success( 'message', 'Title', TRUE );
```

### Overlay function
When you want to use a [Modal from bootstrap](http://getbootstrap.com/javascript/#modals) you can do so with the following function and syntax:

```js
Notification.overlay( 'Message', 'Title', 'Button text' );
```
###### NOTE: All the given variables need to be a string.
