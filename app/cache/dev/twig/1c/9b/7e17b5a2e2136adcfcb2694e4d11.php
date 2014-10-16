<?php

/* ::base.html.twig */
class __TwigTemplate_1c9b7e17b5a2e2136adcfcb2694e4d11 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
\t<head>
\t\t<meta charset=\"utf-8\" />
\t\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
\t\t<meta name=\"description\" content=\"\" />
\t\t<meta name=\"author\" content=\"Vacuum Cooling\" />

\t\t<!-- required styles -->
\t\t<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t\t<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
                <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/select2/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t\t";
        // line 15
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "\t\t<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
\t\t<!--[if lt IE 9]>
\t\t<script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
\t\t<![endif]-->
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /></head>
\t<body>
\t\t
\t\t<!-- header -->
\t\t<div id=\"header\" class=\"navbar\">
\t\t\t<div class=\"navbar-inner\">
\t\t\t\t<!-- company or app name -->
\t\t\t\t<a class=\"brand hidden-phone\" href=\"#\">Vacuum Cooling</a>
\t\t\t\t<ul class=\"nav pull-right\">
\t\t\t\t\t";
        // line 29
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 30
            echo "                                        <!-- dropdown user account -->
\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t<i class=\"icon-large icon-user\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-user-account\">
\t\t\t\t\t\t\t<li class=\"account-img-container\">
\t\t\t\t\t\t\t\t<img class=\"thumb account-img\" src=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/100/user.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"account-info\">
\t\t\t\t\t\t\t\t<h3>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "nombre"), "html", null, true);
            echo "</h3>
\t\t\t\t\t\t\t\t<p>Ultimo ingreso:";
            // line 41
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "lastlogin"), "Y-m-d H:i:s"), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("fos_user_profile_edit");
            echo "\">Editar</a> | <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
            echo "\">Cambiar Clave</a>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"account-footer\">
\t\t\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t\t\t<div class=\"span4 align-right\">
                                                                                
\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-small btn-danger btn-flat\" href=\"";
            // line 50
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\"><i class=\"icon-signout icon-white\"></i> Salir</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t\t<!-- ./ dropdown user account -->
                                        ";
        }
        // line 58
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<!-- end header -->
\t\t<div id=\"left_layout\">
\t\t\t<!-- main content -->
\t\t\t<div id=\"main_content\" class=\"container-fluid\">\t\t\t
\t\t\t\t";
        // line 65
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 66
            echo "                                <!-- page heading -->
\t\t\t\t<div class=\"page-heading\">
\t\t\t\t\t<h2 class=\"page-title muted\">
\t\t\t\t\t     ";
            // line 69
            $this->displayBlock('page_header', $context, $blocks);
            // line 70
            echo "\t\t\t\t\t</h2>
\t\t\t\t</div>
                                ";
        }
        // line 73
        echo "\t\t\t\t<!-- post wrapper -->\t\t\t\t
\t\t\t\t<div class=\"row-fluid\">
                                    ";
        // line 75
        $this->displayBlock('body', $context, $blocks);
        // line 76
        echo "                                </div>
\t\t\t\t\t
\t\t\t</div>
\t\t\t<!-- end main content -->
\t\t\t";
        // line 80
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 81
            echo "                        <!-- sidebar -->
\t\t\t<ul id=\"sidebar\" class=\"nav nav-pills nav-stacked\">
\t\t\t\t<!--<li class=\"active\">
\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t<i class=\"micon-screen\"></i>
\t\t\t\t\t\t<span class=\"hidden-phone\">Dashboard</span>
\t\t\t\t\t</a>
                                </li> -->
                                ";
            // line 89
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 90
                echo "                                <li class=\"dropdown\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t<i class=\"micon-database\"></i>
\t\t\t\t\t\t<span class=\"hidden-phone\">Configuraci&oacute;n</span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t<li id=\"li_cliente\">
\t\t\t\t\t\t\t<a href=\"";
                // line 97
                echo $this->env->getExtension('routing')->getPath("cliente");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon-large icon-cogs\"></i> Clientes
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
                                                <li id=\"li_agencia\">
\t\t\t\t\t\t\t<a href=\"";
                // line 102
                echo $this->env->getExtension('routing')->getPath("agencia");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon-large icon-cogs\"></i> Agencias
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
                                                <li id=\"li_aerolinea\">
\t\t\t\t\t\t\t<a href=\"";
                // line 107
                echo $this->env->getExtension('routing')->getPath("aerolinea");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon-large icon-cogs\"></i> Aerol&iacute;neas
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t
\t\t\t\t\t</ul>
                                </li>
                                ";
            }
            // line 115
            echo "                                <li>
                                    <a href=\"";
            // line 116
            echo $this->env->getExtension('routing')->getPath("reserva");
            echo "\">
                                        <i class=\"micon-calendar\"></i>
                                        <span class=\"hidden-phone\">Reservas</span>
                                    </a>
                                </li>
                        </ul>
\t\t\t<!-- end sidebar -->
                        ";
        }
        // line 124
        echo "\t\t</div>\t
\t\t<!-- base -->
\t\t<script src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/js/jquery.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t<!-- addons -->
                <script src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jquery-ui-1.9.2.custom.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/chart-plugins.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jquery-ui-slider.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/redactor/redactor.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jmapping/jquery.metadata.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jmapping/jquery.jmapping.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jquery.uniform.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/chosen.jquery.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/bootstrap-datepicker.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/date.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jquery.timePicker.min.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/jquery.ui.datepicker-es.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/select2/select2.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("plugins/select2/select2_locale_es.js"), "html", null, true);
        echo "\"></script>
                
\t\t";
        // line 144
        $this->displayBlock('javascripts', $context, $blocks);
        // line 145
        echo "\t\t<!-- plugins loader -->
\t\t<!--<script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/loader.js"), "html", null, true);
        echo "\"></script>-->
\t</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Vacuum Cooling";
    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 69
    public function block_page_header($context, array $blocks = array())
    {
    }

    // line 75
    public function block_body($context, array $blocks = array())
    {
    }

    // line 144
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 144,  318 => 75,  313 => 69,  308 => 15,  302 => 5,  295 => 146,  292 => 145,  290 => 144,  285 => 142,  281 => 141,  277 => 140,  273 => 139,  269 => 138,  265 => 137,  261 => 136,  257 => 135,  253 => 134,  249 => 133,  245 => 132,  241 => 131,  237 => 130,  233 => 129,  228 => 127,  224 => 126,  220 => 124,  209 => 116,  206 => 115,  195 => 107,  187 => 102,  179 => 97,  170 => 90,  168 => 89,  158 => 81,  156 => 80,  150 => 76,  148 => 75,  144 => 73,  139 => 70,  137 => 69,  132 => 66,  130 => 65,  121 => 58,  110 => 50,  98 => 43,  93 => 41,  89 => 40,  83 => 37,  74 => 30,  72 => 29,  57 => 16,  55 => 15,  51 => 14,  47 => 13,  43 => 12,  39 => 11,  30 => 5,  24 => 1,);
    }
}
