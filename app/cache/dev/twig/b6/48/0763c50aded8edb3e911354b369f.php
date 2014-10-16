<?php

/* VCReservasBundle:Reserva:edit.html.twig */
class __TwigTemplate_b6480763c50aded8edb3e911354b369f extends Twig_Template
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
        echo "Editar Reserva";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "     ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'stylesheet');
        echo "
";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserva_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'enctype');
;
        echo " novalidate=novalidate>
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
       <table class=\"table\">
            <tr>
                
                <td><label>Cliente</label>
                    ";
        // line 13
        if ($this->env->getExtension('security')->isGranted("ROLE_CUSTOMER")) {
            // line 14
            echo "                        <h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cliente"), "nombre"), "html", null, true);
            echo "</h3>
                        <div style=\"display: none\">";
            // line 15
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cliente"), 'widget');
            echo "</div>
                    ";
        } else {
            // line 17
            echo "                        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cliente"), 'widget');
            echo "
                    ";
        }
        // line 19
        echo "                </td>
                <td><label>Fecha de Servicio:</label>";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "fechaServicio"), 'widget');
        echo "</td>
                <td><label>Hora de Servicio:</label>";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "horaServicio"), 'widget');
        echo "</td>
            </tr>
            <tr>
                <td><label>Guia Master:</label>";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "guiaMaster"), 'widget');
        echo "</td>
                <td><label>Temperatura Requerida:</label>";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "temperaturaRequerida"), 'widget');
        echo "</td>
                <td><label>Contacto:</label>";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "contacto"), 'widget', array("attr" => array("placeholder" => "Nombre y numero de celular de la persona de la agencia en el aeropuerto")));
        echo "</td>
            </tr>
            <tr>
                <td><label>Agencia:</label>";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "agencia"), 'widget');
        echo "</td>
                <td><label>Aerolinea:</label>";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "aerolinea"), 'widget');
        echo "</td>
                <td><label>Notas:</label>";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "notas"), 'widget');
        echo "</td>
            </tr>
        </table>
        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'rest');
        echo "
        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'errors');
        echo "
        <hr />
        <h3>Productos</h3>
        <button class=\"btn btn-small\" id=\"btn-nuevo-producto\" type=\"button\"><i class='icon-plus'></i> Agregar Producto</button>
        <br  />
        <table id=\"tbl-productos\">
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Piezas</th>
                <th>FBE</th>
            </tr>
            ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "productos"));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 48
            echo "            <tr>
                <td></td>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["producto"]) ? $context["producto"] : $this->getContext($context, "producto")), "nombreProducto"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["producto"]) ? $context["producto"] : $this->getContext($context, "producto")), "piezas"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["producto"]) ? $context["producto"] : $this->getContext($context, "producto")), "fbe"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "        </table>
        
        
        <br clear=\"all\" />
        <p>
            <button type=\"submit\" class=\"btn btn-primary\"><i class='icon-ok-circle icon-white'></i> Editar</button>
            <a href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("reserva");
        echo "\" class=\"btn\">
                <i class=\"icon-list-ul\"></i> 
                Regresar al listado
            </a>
        </p>
    </form>
<!--
        <form action=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserva_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
            <button type=\"submit\">Delete</button>
        </form>
-->
";
    }

    // line 75
    public function block_javascripts($context, array $blocks = array())
    {
        // line 76
        echo "    ";
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")));
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
        return "VCReservasBundle:Reserva:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 76,  198 => 75,  189 => 70,  184 => 68,  174 => 61,  166 => 55,  157 => 52,  153 => 51,  149 => 50,  145 => 48,  141 => 47,  126 => 35,  122 => 34,  116 => 31,  112 => 30,  108 => 29,  102 => 26,  98 => 25,  94 => 24,  88 => 21,  84 => 20,  81 => 19,  75 => 17,  70 => 15,  65 => 14,  63 => 13,  50 => 7,  47 => 6,  40 => 4,  37 => 3,  31 => 2,);
    }
}
