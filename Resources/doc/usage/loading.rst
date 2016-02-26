Manage CKEditor loading
=======================

By default, in order to prototype your form really fast, the bundle loads
the CKEditor library each time you declare a CKEditor form. Basically, it
means that if you have three CKEditor fields in your form, then, there will
be three CKEditor library loadings.

Load CKEditor manually
----------------------

If you want to control the CKEditor loading, you can configure the bundle to
not load the library at all and let you the control of it. To disable the
CKEditor library loading, you can do it globally in your configuration:

.. code-block:: yaml

    # app/config/config.yml
    ivory_ck_editor:
        autoload: false

Or you can disable it in your widget:

.. code-block:: php

    $builder->add('field', 'ckeditor', array('autoload' => false));

.. note::

    If you use this approach, be aware CKEditor must be loaded before any fields
    have been rendered, so we recommend you to register it in the ``<head>`` of
    your page.

Load CKEditor asynchronously
----------------------------

If you want to load CKEditor at the bottom of your page, the best way is to still
disable the CKEditor loading (in order to let you load CKEditor at the bottom of
the page only one time) but also to configure the bundle to render the javascript
latter with a dedicated function.

So, first you need configure the bundle. You can do it globally in your
configuration:

.. code-block:: yaml

    # app/config/config.yml
    ivory_ck_editor:
        autoload: false
        async: true

Or you can configure it in your widget:

.. code-block:: php

    $builder->add('field', 'ckeditor', array(
        'autoload' => false,
        'async'    => true,
    ));

Then, in your Twig template, you can render the form javascript with:

.. code-block:: twig

    {{ form_javascript(form) }}

Or if you use the PHP templating engine:

.. code-block:: php

    <?php echo $view['ivory_ckeditor_javascript']->renderJavascript($form) ?>

.. note::

    If you use this approach, be aware CKEditor must be loaded before you render the
    form javascript.
