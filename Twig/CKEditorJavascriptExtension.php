<?php

/*
 * This file is part of the Ivory CKEditor package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\CKEditorBundle\Twig;

use Symfony\Component\Form\FormRendererInterface;
use Symfony\Component\Form\FormView;

/**
 * Form Javascript Twig extension.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class CKEditorJavascriptExtension extends \Twig_Extension
{
    /** @var \Symfony\Component\Form\FormRendererInterface */
    private $renderer;

    /**
     * Creates a CKEditor Javascript Twig extension.
     *
     * @param \Symfony\Component\Form\FormRendererInterface $renderer The form renderer
     */
    public function __construct(FormRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'form_javascript',
                array($this, 'renderJavascript'),
                array('is_safe' => array('html'))
            ),
        );
    }

    /**
     * Renders a form javascript fragment.
     *
     * @param FormView $view      The form view.
     * @param bool     $prototype TRUE if the form view is a prototype else FALSE.
     *
     * @return string The rendered form javascript fragment.
     */
    public function renderJavascript(FormView $view, $prototype = false)
    {
        return $this->renderer->searchAndRenderBlock($view, $prototype ? 'javascript_prototype' : 'javascript');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ivory_ckeditor_javascript';
    }
}
