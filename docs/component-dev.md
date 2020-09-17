## Simple Component

Let's say we want create `example` component in Joomla, then you need these two files:

* on the front-end site: `components/com_example/example.php`
* on the back-end admin: `administrator/components/com_example/example.php`

The `example.php` is called the component entry file.

## Joomla Component using MVC model

See https://docs.joomla.org/Model-View-Controller

The `example.php` entry file will determine which controller to run based on `task` parameter.

* Finds a Controller, create instance and calls `method()`.
	- Finds a Model and create instance for it. (or it could be multiple Models)
	- Call Model methods to update DB if needed
	- Finds a View, create an instance, calls `setModel()` method and let it render response
	- View delegates to Layout to render HTML (`display()` method)

NOTE: The layout output is buffered, and then yet goes through Joomla Template framework to actually output to response.

* Joomla Form - the Model will setup the Form instance and get ready for Layout to render using `$form->renderField()`.

## How to use Joomla Logger

See https://docs.joomla.org/Using_JLog

```
JLog::add('my error message', JLog::ERROR, 'my-error-category');

// Or to use a Guard
if (JDEBUG) {
    JLog::add('my debug message', JLog::DEBUG, 'my-debug-category');
}
```

Category:  `JLog::EMERGENCY, JLog::ALERT, JLog::CRITICAL, JLog::ERROR, JLog::WARNING, JLog::NOTICE, JLog::INFO, JLog::DEBUG`
