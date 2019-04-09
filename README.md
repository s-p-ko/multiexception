# MultiException

Сontains the class that implements the concept or pattern of multiexception

**Basic Usage**

Here is the simplest way to use this class

    <?php
    
    require __DIR__ . '/vendor/autoload.php';
    
    use Spko\MultiException;
    
    function checkPassword(string $password) {
        $errors = new MultiException();
        if (strlen($password) < 6) {
            $errors->add(new \Exception('Less than 6'));
        }
        if (false === strpos($password, '!')) {
            $errors->add(new \Exception('Without \'!\''));
        }
        if (!$errors->empty()) {
            throw $errors;
        }
        return true;
    }
    
    try {
        $result = checkPassword('123');
    } catch (MultiException $exceptions) {
        foreach ($exceptions->all() as $e) {
            echo $e->getMessage() . "\n";
        }
    }

Result:

    Less than 6
    
    Without '!'

