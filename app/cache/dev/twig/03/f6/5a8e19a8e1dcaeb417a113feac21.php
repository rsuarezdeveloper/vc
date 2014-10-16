<?php

/* VCBaseBundle:Aerolinea:new.html.twig */
class __TwigTemplate_03f65a8e19a8e1dcaeb417a113feac21 extends Twig_Template
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
        echo "Aerol&iacute;neas- Crear Nueva";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("aerolinea_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo ">
        ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <p>
            <button type=\"submit\" class=\"btn btn-primary\">Crear</button>
            <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("aerolinea");
        echo "\" class=\"btn \">
                    Cancelar
            </a>
        </p>
    </form>
";
    }

    public function getTemplateName()
    {
        return "VCBaseBundle:Aerolinea:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 9,  46 => 6,  38 => 5,  35 => 3,  29 => 2,);
    }
}
