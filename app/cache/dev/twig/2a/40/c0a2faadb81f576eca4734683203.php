<?php

/* VCReservasBundle:Reserva:index.html.twig */
class __TwigTemplate_2a40c0a2faadb81f576eca4734683203 extends Twig_Template
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
        echo "Reservas";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<a href=\"";
        echo $this->env->getExtension('routing')->getPath("reserva_new");
        echo "\" class=\"btn btn-primary\">
        <i class=\"icon-white icon-file\"></i>
                Crear Nueva Reserva
            </a>
    <table class=\"table table-striped table-hovered\">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Agencia</th>
                <th>Aerol&iacute;nea</th>
                <th>Creado Por</th>
                <th>Fecha S.</th>
                <th>Hora S.</th>
                <th>Guia Master</th>
                <th>Tempera</th>
                <th>Contacto</th>
                <th>Notas</th>
                <th>Piezas</th>
                <th>FBE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 28
            echo "            ";
            $context["piezas"] = 0;
            // line 29
            echo "            ";
            $context["fbe"] = 0;
            // line 30
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "productos"));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 31
                echo "                ";
                $context["piezas"] = ((isset($context["piezas"]) ? $context["piezas"] : $this->getContext($context, "piezas")) + $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "piezas"));
                // line 32
                echo "                ";
                $context["fbe"] = ((isset($context["fbe"]) ? $context["fbe"] : $this->getContext($context, "fbe")) + $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fbe"));
                // line 33
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "            <tr>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cliente"), "nombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "agencia"), "nombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "aerolinea"), "nombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "creadoPor"), "nombre"), "html", null, true);
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "creacion")) {
                echo "<small>[";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "creacion"), "Y-m-d H:i:s"), "html", null, true);
                echo "]</small>";
            }
            echo "</td>
                <td>";
            // line 39
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaServicio")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaServicio"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horaServicio"), "H:i"), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "guiaMaster"), "html", null, true);
            echo "</td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "temperaturaRequerida"), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacto"), "html", null, true);
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notas"), "html", null, true);
            echo "</td>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["piezas"]) ? $context["piezas"] : $this->getContext($context, "piezas")), "html", null, true);
            echo "</td>
                <td>";
            // line 46
            echo twig_escape_filter($this->env, (isset($context["fbe"]) ? $context["fbe"] : $this->getContext($context, "fbe")), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserva_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><i class=\"icon-pencil\"></i></a> ";
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                echo "<i class=\"icon-cogs\"></i> Confirmar";
            }
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "        </tbody>
    </table>
    ";
    }

    public function getTemplateName()
    {
        return "VCReservasBundle:Reserva:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 50,  150 => 47,  146 => 46,  142 => 45,  138 => 44,  134 => 43,  130 => 42,  126 => 41,  122 => 40,  116 => 39,  107 => 38,  103 => 37,  99 => 36,  95 => 35,  92 => 34,  86 => 33,  83 => 32,  80 => 31,  75 => 30,  72 => 29,  69 => 28,  65 => 27,  38 => 4,  35 => 3,  29 => 2,);
    }
}
