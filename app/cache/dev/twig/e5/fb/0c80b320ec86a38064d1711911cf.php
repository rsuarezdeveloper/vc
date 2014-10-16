<?php

/* VCReservasBundle:Reserva:new.html.twig */
class __TwigTemplate_e5fb0c80b320ec86a38064d1711911cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "Nueva Reserva";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "     ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'stylesheet');
        echo "
";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("reserva_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " novalidate=novalidate>
        <table class=\"table\">
            <tr>
                
                <td><label>Cliente</label>
                    ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("ROLE_CUSTOMER")) {
            // line 13
            echo "                        <h4>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cliente"), "nombre"), "html", null, true);
            echo "</h4>
                        <div style=\"display: none\">";
            // line 14
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cliente"), 'widget');
            echo "</div>
                    ";
        } else {
            // line 16
            echo "                        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cliente"), 'widget');
            echo "
                    ";
        }
        // line 18
        echo "                </td>
                <td><label>Fecha de Servicio:</label>";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaServicio"), 'widget');
        echo "</td>
                <td><label>Hora de Servicio:</label>";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "horaServicio"), 'widget');
        echo "</td>
            </tr>
            <tr>
                <td><label>Guia Master:</label>";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "guiaMaster"), 'widget');
        echo "</td>
                <td><label>Temperatura Requerida:</label>";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "temperaturaRequerida"), 'widget');
        echo "</td>
                <td><label>Contacto:</label>";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contacto"), 'widget', array("attr" => array("placeholder" => "Nombre y numero de celular de la persona de la agencia en el aeropuerto")));
        echo "</td>
            </tr>
            <tr>
                <td><label>Agencia:</label>";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "agencia"), 'widget');
        echo "</td>
                <td><label>Aerolinea:</label>";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "aerolinea"), 'widget');
        echo "</td>
                <td><label>Notas:</label>";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "notas"), 'widget');
        echo "</td>
            </tr>
        </table>
        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        <h3>Productos</h3>
        <button class=\"btn btn-small\" id=\"btn-nuevo-producto\" type=\"button\"><i class='icon-plus'></i> Agregar Producto</button>
        <table id=\"tbl-productos\">
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Piezas</th>
                <th>FBE</th>
            </tr>
        </table>
        
        
        <br clear=\"all\" />
        <p>
            <button type=\"submit\" class=\"btn btn-primary\">Crear</button><a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("reserva");
        echo "\" class=\"btn\">
            Cancelar
        </a>
        </p>
    </form>
";
    }

    // line 55
    public function block_javascripts($context, array $blocks = array())
    {
        // line 56
        echo "    ";
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        echo "
    <script>
        \$(document).ready(function(){
                var tr_producto='<tr><td><a href=\"#\" class=\"delete\"><i class=\"icon-trash\"></i></a></td><td><input type=\"text\" name=\"producto_nombre[]\" id=\"producto_nombre[]\" placeholder=\"Nombre Producto\"/></td><td><input type=\"text\" name=\"producto_piezas[]\" id=\"producto_piezas[]\" placeholder=\"0\" dir=\"rtl\" class=\"input-small\"/></td><td><input type=\"text\" name=\"producto_fbe[]\" id=\"producto_fbe[]\" placeholder=\"0\" dir=\"rtl\" class=\"input-small\"/></td></tr>';
                \$(\"#tbl-productos\").append(tr_producto);
                \$(\"#btn-nuevo-producto\").click(function(){
                        \$(\"#tbl-productos\").append(tr_producto);
                });
                
                \$(\".delete\").live('click', function(event) {
                        \$(this).parent().parent().remove();
                });
                
                
            });
        
    </script>
";
    }

    public function getTemplateName()
    {
        return "VCReservasBundle:Reserva:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 56,  153 => 55,  143 => 49,  125 => 34,  121 => 33,  115 => 30,  111 => 29,  107 => 28,  101 => 25,  97 => 24,  93 => 23,  87 => 20,  83 => 19,  80 => 18,  74 => 16,  69 => 14,  64 => 13,  62 => 12,  50 => 7,  47 => 6,  40 => 4,  37 => 3,  31 => 2,);
    }
}
