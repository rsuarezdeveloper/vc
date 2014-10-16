<?php

/* VCBaseBundle:Cliente:new.html.twig */
class __TwigTemplate_7d1af11fe6e124f88cf5b11b46f60e7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_page_header($context, array $blocks = array())
    {
        echo "Crear Nuevo Cliente";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("cliente_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo ">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <p>
            <button type=\"submit\" class=\"btn btn-primary\">Crear</button>
            <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("cliente");
        echo "\" class=\"btn\">
                Cancelar
            </a>
        </p>
    </form>
";
    }

    public function getTemplateName()
    {
        return "VCBaseBundle:Cliente:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 8,  46 => 5,  38 => 4,  35 => 3,  29 => 2,);
    }
}
