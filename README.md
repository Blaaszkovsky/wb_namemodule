# WBShop.pl - TPL HTML module
Module create HTML in exsiting or own hook. 


## Installation

Download the latest release of the module to your computer.
Please follow the steps below:

- Change the module name to your own, e.g. `wb_categorybanner` in folder name, global file, class and `$this->name` in global file.
- Change `$this->displayName` and `$this->description` to own. 
- Pack the folder in a .zip format, if you are not sure, use the tool https://validator.prestashop.com/
- Upload module on your shop and enjoy!
## Documentation

If you want to add the module display to a hook other than displayHome, you need to follow these steps:

- In `public function install()` change `$this->registerHook('displayHome')` to your hook. It can be an existing Hook or you can create your own.
- Then you need to rename `public function hookDisplayHome()` function to `public function hookNameHook()`. Remember the prefix `hook` must be added to this function, otherwise the function will not work!
- The last step is to rename template hook name - then you won't make a mistake when editing the module with more hooks.
Example:
```php
public function install()
    {
        return parent::install()
            && $this->registerHook('displayFullNav');
    }
```

```php
    public function hookDisplayFullNav() {
        return $this->display(__FILE__, 'displayFullNav.tpl');
    }
```

***
### Add more than one hook in module

```php
public function install()
    {
        return parent::install()
            && $this->registerHook('displayFullNav')
            && $this->registerHook('displayHome');
    }
```

```php
    public function hookDisplayFullNav() {
        return $this->display(__FILE__, 'displayFullNav.tpl');
    }

    public function hookDisplayHome() {
        return $this->display(__FILE__, 'displayHome.tpl');
    }
```

### Add smarty variables in your templates

For example show all categories in our shop.

```php
public function hookDisplayHome() {

        $categories = Category::getCategories((int)($this->context->cookie->id_lang), true, false);

        $this->smarty->assign(array(
            'categories' => $categories,
        ));

        return $this->display(__FILE__, 'displayHome.tpl');
    }
```

In file displayHome.tpl

```php
<h2>Show all category in shop:</h2>

{foreach from=$categories item=category}
    {$category['name']} (ID: {$category['id_category']})<br/>
{/foreach}
```

## License

This module is not free software and you can't resell and redistribute it!

