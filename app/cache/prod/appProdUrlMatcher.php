<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/aerolinea')) {
                // aerolinea_list
                if ($pathinfo === '/aerolinea/JSONList') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_aerolinea_list;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::jsonListAction',  '_route' => 'aerolinea_list',);
                }
                not_aerolinea_list:

                // aerolinea
                if (rtrim($pathinfo, '/') === '/aerolinea') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_aerolinea;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'aerolinea');
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::indexAction',  '_route' => 'aerolinea',);
                }
                not_aerolinea:

                // aerolinea_create
                if ($pathinfo === '/aerolinea/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_aerolinea_create;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::createAction',  '_route' => 'aerolinea_create',);
                }
                not_aerolinea_create:

                // aerolinea_new
                if ($pathinfo === '/aerolinea/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_aerolinea_new;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::newAction',  '_route' => 'aerolinea_new',);
                }
                not_aerolinea_new:

                // aerolinea_show
                if (preg_match('#^/aerolinea/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_aerolinea_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'aerolinea_show')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::showAction',));
                }
                not_aerolinea_show:

                // aerolinea_edit
                if (preg_match('#^/aerolinea/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_aerolinea_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'aerolinea_edit')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::editAction',));
                }
                not_aerolinea_edit:

                // aerolinea_update
                if (preg_match('#^/aerolinea/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_aerolinea_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'aerolinea_update')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::updateAction',));
                }
                not_aerolinea_update:

                // aerolinea_delete
                if (preg_match('#^/aerolinea/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_aerolinea_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'aerolinea_delete')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AerolineaController::deleteAction',));
                }
                not_aerolinea_delete:

            }

            if (0 === strpos($pathinfo, '/agencia')) {
                // agencia_list
                if ($pathinfo === '/agencia/JSONList') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_agencia_list;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::jsonListAction',  '_route' => 'agencia_list',);
                }
                not_agencia_list:

                // agencia
                if (rtrim($pathinfo, '/') === '/agencia') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_agencia;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'agencia');
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::indexAction',  '_route' => 'agencia',);
                }
                not_agencia:

                // agencia_create
                if ($pathinfo === '/agencia/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_agencia_create;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::createAction',  '_route' => 'agencia_create',);
                }
                not_agencia_create:

                // agencia_new
                if ($pathinfo === '/agencia/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_agencia_new;
                    }

                    return array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::newAction',  '_route' => 'agencia_new',);
                }
                not_agencia_new:

                // agencia_show
                if (preg_match('#^/agencia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_agencia_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'agencia_show')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::showAction',));
                }
                not_agencia_show:

                // agencia_edit
                if (preg_match('#^/agencia/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_agencia_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'agencia_edit')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::editAction',));
                }
                not_agencia_edit:

                // agencia_update
                if (preg_match('#^/agencia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_agencia_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'agencia_update')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::updateAction',));
                }
                not_agencia_update:

                // agencia_delete
                if (preg_match('#^/agencia/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_agencia_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'agencia_delete')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\AgenciaController::deleteAction',));
                }
                not_agencia_delete:

            }

        }

        if (0 === strpos($pathinfo, '/cliente')) {
            // cliente_list
            if ($pathinfo === '/cliente/JSONlist') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_list;
                }

                return array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::jsonListAction',  '_route' => 'cliente_list',);
            }
            not_cliente_list:

            // cliente
            if (rtrim($pathinfo, '/') === '/cliente') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'cliente');
                }

                return array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::indexAction',  '_route' => 'cliente',);
            }
            not_cliente:

            // cliente_create
            if ($pathinfo === '/cliente/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_cliente_create;
                }

                return array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::createAction',  '_route' => 'cliente_create',);
            }
            not_cliente_create:

            // cliente_new
            if ($pathinfo === '/cliente/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_new;
                }

                return array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::newAction',  '_route' => 'cliente_new',);
            }
            not_cliente_new:

            // cliente_show
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_show')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::showAction',));
            }
            not_cliente_show:

            // cliente_edit
            if (preg_match('#^/cliente/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_edit')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::editAction',));
            }
            not_cliente_edit:

            // cliente_update
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_cliente_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_update')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::updateAction',));
            }
            not_cliente_update:

            // cliente_delete
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_cliente_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_delete')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\ClienteController::deleteAction',));
            }
            not_cliente_delete:

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // vc_base_default_index
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vc_base_default_index')), array (  '_controller' => 'VC\\BaseBundle\\Controller\\DefaultController::indexAction',));
            }

            // vc_reservas_default_index
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vc_reservas_default_index')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/proceso')) {
            // vc_reservas_proceso_index
            if (rtrim($pathinfo, '/') === '/proceso') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_vc_reservas_proceso_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'vc_reservas_proceso_index');
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ProcesoController::indexAction',  '_route' => 'vc_reservas_proceso_index',);
            }
            not_vc_reservas_proceso_index:

            // proceso_create
            if (preg_match('#^/proceso/(?P<reserva>[^/]++)/new$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_proceso_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'proceso_create')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ProcesoController::createAction',));
            }
            not_proceso_create:

        }

        if (0 === strpos($pathinfo, '/reserva')) {
            // reserva_confirm
            if (preg_match('#^/reserva/(?P<id>[^/]++)/confirm$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reserva_confirm;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_confirm')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::confirmAction',));
            }
            not_reserva_confirm:

            // reserva
            if (rtrim($pathinfo, '/') === '/reserva') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reserva;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reserva');
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::indexAction',  '_route' => 'reserva',);
            }
            not_reserva:

            // reserva_grid
            if ($pathinfo === '/reserva/grid') {
                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::gridAction',  '_route' => 'reserva_grid',);
            }

            // reserva_create
            if ($pathinfo === '/reserva/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reserva_create;
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::createAction',  '_route' => 'reserva_create',);
            }
            not_reserva_create:

            // reserva_process
            if (preg_match('#^/reserva/(?P<id>[^/]++)/process$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reserva_process;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_process')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::processAction',));
            }
            not_reserva_process:

            // reserva_new
            if ($pathinfo === '/reserva/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reserva_new;
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::newAction',  '_route' => 'reserva_new',);
            }
            not_reserva_new:

            // reserva_show
            if (preg_match('#^/reserva/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reserva_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_show')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::showAction',));
            }
            not_reserva_show:

            // reserva_edit
            if (preg_match('#^/reserva/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reserva_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_edit')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::editAction',));
            }
            not_reserva_edit:

            // reserva_update
            if (preg_match('#^/reserva/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_reserva_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_update')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::updateAction',));
            }
            not_reserva_update:

            // reserva_delete
            if (preg_match('#^/reserva/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_reserva_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reserva_delete')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::deleteAction',));
            }
            not_reserva_delete:

            // print_pdf
            if (preg_match('#^/reserva/(?P<id>[^/]++)/printPDF$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_print_pdf;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'print_pdf')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\ReservaController::pdfAction',));
            }
            not_print_pdf:

        }

        if (0 === strpos($pathinfo, '/tipoCaja')) {
            // tipoCaja_grid
            if ($pathinfo === '/tipoCaja/grid') {
                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::gridAction',  '_route' => 'tipoCaja_grid',);
            }

            // tipoCaja
            if (rtrim($pathinfo, '/') === '/tipoCaja') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tipoCaja;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'tipoCaja');
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::indexAction',  '_route' => 'tipoCaja',);
            }
            not_tipoCaja:

            // tipoCaja_new
            if ($pathinfo === '/tipoCaja/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tipoCaja_new;
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::newAction',  '_route' => 'tipoCaja_new',);
            }
            not_tipoCaja_new:

            // tipoCaja_create
            if ($pathinfo === '/tipoCaja/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_tipoCaja_create;
                }

                return array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::createAction',  '_route' => 'tipoCaja_create',);
            }
            not_tipoCaja_create:

            // tipoCaja_edit
            if (preg_match('#^/tipoCaja/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tipoCaja_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoCaja_edit')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::editAction',));
            }
            not_tipoCaja_edit:

            // tipoCaja_update
            if (preg_match('#^/tipoCaja/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_tipoCaja_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoCaja_update')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::updateAction',));
            }
            not_tipoCaja_update:

            // tipoCaja_show
            if (preg_match('#^/tipoCaja/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tipoCaja_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoCaja_show')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::showAction',));
            }
            not_tipoCaja_show:

            // tipoCaja_delete
            if (preg_match('#^/tipoCaja/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_tipoCaja_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tipoCaja_delete')), array (  '_controller' => 'VC\\ReservasBundle\\Controller\\TipoCajaController::deleteAction',));
            }
            not_tipoCaja_delete:

        }

        // vc_default_default_index
        if ($pathinfo === '/default') {
            return array (  '_controller' => 'VC\\DefaultBundle\\Controller\\DefaultController::indexAction',  '_route' => 'vc_default_default_index',);
        }

        // vc_default_home_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'vc_default_home_index');
            }

            return array (  '_controller' => 'VC\\DefaultBundle\\Controller\\HomeController::indexAction',  '_route' => 'vc_default_home_index',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
